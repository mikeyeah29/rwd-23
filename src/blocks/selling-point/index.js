import { registerBlockType } from '@wordpress/blocks';
import {
    useBlockProps,
    InspectorControls,
    MediaUpload,
    RichText
} from '@wordpress/block-editor';
import {
    PanelBody,
    ToggleControl,
    Button
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/selling-point', {
    title: __('Selling Point'),
    category: 'design',
    icon: 'format-image',
    attributes: {
        subheading: { type: 'string', default: '' },
        heading: { type: 'string', default: '' },
        content: { type: 'string', default: '' },
        image: { type: 'string', default: '' },
        inverted: { type: 'boolean', default: false },
    },
    supports: {
        color: { background: true, text: true },
        spacing: { padding: true },
    },

    edit: ({ attributes, setAttributes }) => {
        const { subheading, heading, content, image, inverted } = attributes;
        const blockProps = useBlockProps({
            className: 'selling-point',
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Block Settings">
                        <ToggleControl
                            label="Invert Layout"
                            checked={inverted}
                            onChange={(val) => setAttributes({ inverted: val })}
                        />
                        <MediaUpload
                            onSelect={(media) => setAttributes({ image: media.url })}
                            allowedTypes={['image']}
                            value={image}
                            render={({ open }) => (
                                <Button onClick={open} isPrimary>
                                    {image ? 'Replace Image' : 'Select Image'}
                                </Button>
                            )}
                        />
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps}>
                    <div className="container">
                        <div className="row d-flex align-items-center justify-content-center">
                            {inverted ? (
                                <>
                                    <div className="col-md-4 order-2 order-md-1" data-aos="fade-left">
                                        {image && <img src={image} alt="" />}
                                    </div>
                                    <div className="col-md-6 order-1 order-md-2" data-aos="fade-up">
                                        <RichText
                                            tagName="p"
                                            className="font-heading mb-0"
                                            value={subheading}
                                            onChange={(val) => setAttributes({ subheading: val })}
                                            placeholder="Subheading"
                                        />
                                        <RichText
                                            tagName="h2"
                                            className="txt-dark"
                                            value={heading}
                                            onChange={(val) => setAttributes({ heading: val })}
                                            placeholder="Heading"
                                        />
                                        <RichText
                                            tagName="p"
                                            value={content}
                                            onChange={(val) => setAttributes({ content: val })}
                                            placeholder="Content"
                                        />
                                    </div>
                                </>
                            ) : (
                                <>
                                    <div className="col-md-6 order-2 order-md-1" data-aos="fade-up">
                                        <RichText
                                            tagName="p"
                                            className="font-heading mb-0"
                                            value={subheading}
                                            onChange={(val) => setAttributes({ subheading: val })}
                                            placeholder="Subheading"
                                        />
                                        <RichText
                                            tagName="h2"
                                            className="txt-dark"
                                            value={heading}
                                            onChange={(val) => setAttributes({ heading: val })}
                                            placeholder="Heading"
                                        />
                                        <RichText
                                            tagName="p"
                                            value={content}
                                            onChange={(val) => setAttributes({ content: val })}
                                            placeholder="Content"
                                        />
                                    </div>
                                    <div className="col-md-4 order-1 order-md-2" data-aos="fade-left">
                                        {image && <img src={image} alt="" />}
                                    </div>
                                </>
                            )}
                        </div>
                    </div>
                </div>
            </>
        );
    },

    save: () => null, // server-rendered
});
