import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    MediaUpload,
    MediaUploadCheck,
    InspectorControls,
    PanelColorSettings,
    useBlockProps,
    useSetting
} from '@wordpress/block-editor';
import {
    Button,
    PanelBody,
    ToggleControl,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/selling-point-bold', {
    title: __('Selling Point Bold', 'textdomain'),
    icon: 'format-image',
    category: 'layout',
    attributes: {
        subheading: { type: 'string', default: '' },
        heading: { type: 'string', default: '' },
        content: { type: 'string', default: '' },
        image: { type: 'string', default: '' },
        inverted: { type: 'boolean', default: false },
        // background: { type: 'string', default: '#fff9fa' },
    },
    supports: {
        html: false,
        spacing: { padding: true },
        color: {
            background: true,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const { subheading, heading, content, image, inverted, background } = attributes;

        const blockProps = useBlockProps({
            className: 'selling-point-bold-block position-relative',
            style: { background },
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Layout', 'textdomain')} initialOpen={true}>
                        <ToggleControl
                            label={__('Invert Layout', 'textdomain')}
                            checked={inverted}
                            onChange={(val) => setAttributes({ inverted: val })}
                        />
                    </PanelBody>

                    <PanelColorSettings
                        title={__('Background', 'textdomain')}
                        colorSettings={[
                            {
                                label: __('Background Color', 'textdomain'),
                                value: background,
                                onChange: (val) => setAttributes({ background: val }),
                            },
                        ]}
                    />
                </InspectorControls>

                <div {...blockProps}>
                    <div className="container">
                        <div className="row d-flex align-items-left justify-content-left">

                            {inverted && (
                                <img src={image} className="position-absolute top-0 left-0" alt="" />
                            )}

                            <div className={`col-md-6 ${inverted ? 'offset-md-6 order-1 order-md-2 text-end' : 'order-2 order-md-1'}`} data-aos="fade-up">
                                <RichText
                                    tagName="p"
                                    className="font-small-heading txt-accent mb-0"
                                    placeholder={__('Subheading')}
                                    value={subheading}
                                    onChange={(val) => setAttributes({ subheading: val })}
                                />
                                <RichText
                                    tagName="h2"
                                    className="txt-dark"
                                    placeholder={__('Heading')}
                                    value={heading}
                                    onChange={(val) => setAttributes({ heading: val })}
                                />
                                <RichText
                                    tagName="p"
                                    placeholder={__('Content')}
                                    value={content}
                                    onChange={(val) => setAttributes({ content: val })}
                                />
                            </div>

                            {!inverted && image && (
                                <img src={image} className="position-absolute right-0" alt="" />
                            )}
                        </div>
                    </div>
                </div>

                <InspectorControls>
                    <PanelBody title={__('Image', 'textdomain')} initialOpen={false}>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) => setAttributes({ image: media.url })}
                                allowedTypes={['image']}
                                value={image}
                                render={({ open }) => (
                                    <Button onClick={open} isSecondary>
                                        {image ? __('Replace Image') : __('Choose Image')}
                                    </Button>
                                )}
                            />
                        </MediaUploadCheck>
                    </PanelBody>
                </InspectorControls>
            </>
        );
    },
    save() {
        return null; // PHP render
    },
});
