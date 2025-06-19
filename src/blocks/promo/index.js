import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {
    useBlockProps,
    InspectorControls,
    RichText,
    PanelColorSettings,
    MediaUpload,
    InnerBlocks,
} from '@wordpress/block-editor';
import {
    PanelBody,
    SelectControl,
    TextControl,
    Button,
} from '@wordpress/components';

registerBlockType('rwd/promo', {
    title: __('Promo', 'rwd'),
    category: 'design',
    attributes: {
        position: {
            type: 'string',
            default: 'left',
        },
        headline: {
            type: 'string',
            selector: 'h2',
        },
        img: {
            type: 'string',
            default: '',
        },
        bgColor: {
            type: 'string',
            default: '#e0e0e0',
        },
        link: {
            type: 'string',
            default: '#contact-packages',
        },
        buttonText: {
            type: 'string',
            default: "Find Out More",
        },
    },
    supports: {
        color: {
            background: true,
            text: true,
        },
        spacing: {
            padding: true,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const {
            position,
            headline,
            img,
            bgColor,
            link,
            buttonText,
        } = attributes;

        const onChange = (prop) => (value) => setAttributes({ [prop]: value });

        const blockProps = useBlockProps({
            style: {
                backgroundColor: bgColor,
                backgroundImage: img ? `url(${img})` : undefined,
                backgroundRepeat: 'no-repeat',
                backgroundPosition: `center ${position === 'right' ? 'right' : 'left'}`,
            },
            className: `promo-2 ${position === 'right' ? 'promo-2--right' : ''}`,
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Settings', 'rwd')}>
                        <SelectControl
                            label={__('Image Position', 'rwd')}
                            value={position}
                            options={[
                                { label: 'Left', value: 'left' },
                                { label: 'Right', value: 'right' },
                            ]}
                            onChange={onChange('position')}
                        />
                        <TextControl
                            label={__('Link', 'rwd')}
                            value={link}
                            onChange={onChange('link')}
                        />
                    </PanelBody>

                    <PanelBody title={__('Background Image', 'rwd')} initialOpen={false}>
                        <MediaUpload
                            onSelect={(media) => setAttributes({ img: media.url })}
                            allowedTypes={['image']}
                            value={img}
                            render={({ open }) => (
                                <Button onClick={open} isSecondary>
                                    {img ? __('Change Image', 'rwd') : __('Select Image', 'rwd')}
                                </Button>
                            )}
                        />
                        {img && (
                            <div style={{ marginTop: '10px' }}>
                                <img src={img} alt="" style={{ maxWidth: '100%' }} />
                                <Button
                                    onClick={() => setAttributes({ img: '' })}
                                    isLink
                                    isDestructive
                                    style={{ marginTop: '5px', display: 'block' }}
                                >
                                    {__('Remove Image', 'rwd')}
                                </Button>
                            </div>
                        )}
                    </PanelBody>

                    <PanelColorSettings
                        title={__('Color Settings', 'rwd')}
                        colorSettings={[
                            {
                                label: __('Background Color', 'rwd'),
                                value: bgColor,
                                onChange: onChange('bgColor'),
                            },
                        ]}
                    />
                </InspectorControls>

                <div {...blockProps}>
                    <div className="container">
                        <div className={`promo-2__inner ${position === 'right' ? 'promo-2__inner__right' : ''}`}>
                            <div className="promo-2__txt" data-aos={position === 'right' ? 'fade-right' : 'fade-left'} style={{ backgroundColor: bgColor }}>
                                <RichText
                                    tagName="h2"
                                    className="heading-lg"
                                    value={headline}
                                    onChange={onChange('headline')}
                                    placeholder={__('Add headline…', 'rwd')}
                                />


                                <div className="promo-content">
                                    <InnerBlocks
                                        allowedBlocks={['core/paragraph', 'core/list', 'core/heading', 'core/image', 'core/buttons']}
                                        orientation="vertical"
                                    />
                                </div>

                                {link.startsWith('#') ? (
                                    <div className="cursor-pointer d-flex align-items-center" onClick={() => window.smoothScrollTo?.(link)}>
                                        <RichText
                                            tagName="p"
                                            className="m-0 txt-accent mr-2 txt-bold promo-button-text"
                                            value={buttonText}
                                            onChange={onChange('buttonText')}
                                            placeholder={__('Add button text…', 'rwd')}
                                        />
                                        <span className="arrow-placeholder">→</span>
                                    </div>
                                ) : (
                                    <span className="cursor-pointer d-flex align-items-center">     
                                        <RichText
                                            tagName="p"
                                            className="m-0 txt-accent mr-2 txt-bold promo-button-text"
                                            value={buttonText}
                                            onChange={onChange('buttonText')}
                                            placeholder={__('Add button text…', 'rwd')}
                                        />
                                        <span className="arrow-placeholder">→</span>
                                    </span>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save: () => <InnerBlocks.Content />
});
