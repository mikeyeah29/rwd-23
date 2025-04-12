import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    InnerBlocks,
    InspectorControls,
    useBlockProps,
    PanelColorSettings,
} from '@wordpress/block-editor';
import {
    PanelBody,
    SelectControl,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/intro-section', {
    title: __('Intro Section', 'textdomain'),
    icon: 'welcome-widgets-menus',
    category: 'layout',
    attributes: {
        backgroundColor: { type: 'string', default: '' },
        verticalAlign: { type: 'string', default: 'align-items-center' },
        heading: { type: 'string', default: '' },
    },
    supports: {
        color: { background: true },
        spacing: { padding: true },
    },
    edit: ({ attributes, setAttributes }) => {
        const { backgroundColor, verticalAlign, heading } = attributes;

        const blockProps = useBlockProps({
            className: `position-relative bg-${backgroundColor || 'primary'}`,
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Layout Settings', 'textdomain')} initialOpen={true}>
                        <SelectControl
                            label={__('Vertical Alignment', 'textdomain')}
                            value={verticalAlign}
                            options={[
                                { label: __('Top', 'textdomain'), value: 'align-items-start' },
                                { label: __('Center', 'textdomain'), value: 'align-items-center' },
                                { label: __('Bottom', 'textdomain'), value: 'align-items-end' },
                            ]}
                        onChange={(val) => setAttributes({ verticalAlign: val })}
                        />
                    </PanelBody>
                    <PanelColorSettings
                        title={__('Background Color', 'textdomain')}
                        colorSettings={[
                            {
                                value: backgroundColor,
                                onChange: (val) => setAttributes({ backgroundColor: val }),
                                label: __('Background color'),
                            },
                        ]}
                    />
                </InspectorControls>

                <div {...blockProps}>
                    <div className="container py-5">
                        <div className={`row ${verticalAlign}`}>
                            <div className="col-md-6">
                                <RichText
                                    tagName="h2"
                                    className="intro-heading txt-dark"
                                    placeholder={__('Add headline…')}
                                    value={heading}
                                    onChange={(val) => setAttributes({ heading: val })}
                                />
                            </div>
                            <div className="col-md-6">
                                <InnerBlocks
                                    allowedBlocks={['core/paragraph', 'core/list']}
                                    template={[
                                        ['core/paragraph', { placeholder: 'Add text…' }],
                                        ['core/paragraph', { placeholder: 'Add more…' }],
                                    ]}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save: () => <InnerBlocks.Content />
});
