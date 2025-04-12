import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    InspectorControls,
    PanelColorSettings,
    useBlockProps,
    useSetting,
} from '@wordpress/block-editor';
import {
    PanelBody,
    SelectControl,
    ToggleControl,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/section-heading', {
    title: __('Section Heading', 'textdomain'),
    icon: 'heading',
    category: 'layout',
    attributes: {
        eyebrow: { type: 'string', default: '' },
        heading: { type: 'string', default: '' },
        textAlign: { type: 'string', default: 'center' },
        backgroundColor: { type: 'string', default: 'white' },
        largeHeading: { type: 'boolean', default: true }, // new toggle
    },
    supports: {
        html: false,
        spacing: {
            padding: true,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const { eyebrow, heading, textAlign, backgroundColor, largeHeading } = attributes;
        const themeColors = useSetting('color.palette') || [];

        const headingSizeClass = largeHeading ? 'txt-xxlarge' : 'txt-xlarge';

        const blockProps = useBlockProps({
            className: `position-relative has-${backgroundColor}-background-color`,
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Layout Settings', 'textdomain')} initialOpen={true}>
                        <SelectControl
                            label={__('Text Alignment', 'textdomain')}
                            value={textAlign}
                            options={[
                                { label: __('Center', 'textdomain'), value: 'center' },
                                { label: __('Left', 'textdomain'), value: 'start' },
                            ]}
                            onChange={(val) => setAttributes({ textAlign: val })}
                        />
                        <ToggleControl
                            label={__('Use Extra Large Heading', 'textdomain')}
                            checked={largeHeading}
                            onChange={(val) => setAttributes({ largeHeading: val })}
                        />
                    </PanelBody>
                    <PanelColorSettings
                        title={__('Background Color', 'textdomain')}
                        colorSettings={[
                            {
                                label: __('Background Color', 'textdomain'),
                                value: themeColors.find(c => c.slug === backgroundColor)?.color || '',
                                onChange: (hex) => {
                                    const match = themeColors.find(c => c.color === hex);
                                    if (match) {
                                        setAttributes({ backgroundColor: match.slug });
                                    }
                                },
                            },
                        ]}
                    />
                </InspectorControls>

                <div {...blockProps}>
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-md-6">
                                <RichText
                                    tagName="p"
                                    className={`font-small-heading mb-0 text-${textAlign} txt-accent`}
                                    placeholder={__('Eyebrow text…')}
                                    value={eyebrow}
                                    onChange={(value) => setAttributes({ eyebrow: value })}
                                />
                                <RichText
                                    tagName="h2"
                                    className={`hdln-2 txt-dark ${headingSizeClass} txt-primary text-${textAlign}`}
                                    placeholder={__('Heading text…')}
                                    value={heading}
                                    onChange={(value) => setAttributes({ heading: value })}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save() {
        return null; // Server-rendered
    },
});
