import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {
    RichText,
    URLInputButton,
    InspectorControls,
    ColorPalette,
    useSetting,
} from '@wordpress/block-editor';
import {
    PanelBody,
    TextControl,
} from '@wordpress/components';

registerBlockType('rwd/hero', {
    title: __('Hero', 'textdomain'),
    icon: 'format-image',
    category: 'layout',
    attributes: {
        preTitle: { type: 'string', default: '' },
        headline: { type: 'string', default: '' },
        content: { type: 'string', default: '' },
        ctaBtn: { type: 'string', default: '' },
        ctaLink: { type: 'string', default: '' },
        slantColor: { type: 'string', default: '' },
    },
    supports: {
        color: { background: true, text: true },
        spacing: { padding: true }
    },
    edit: ({ attributes, setAttributes }) => {

        const { preTitle, headline, content, ctaBtn, ctaLink, slantColor } = attributes;
        const themeColors = useSetting('color.palette') || [];

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('CTA Settings', 'textdomain')} initialOpen={true}>
                        <TextControl
                            label={__('CTA Button Text', 'textdomain')}
                            value={ctaBtn}
                            onChange={(value) => setAttributes({ ctaBtn: value })}
                        />
                        <URLInputButton
                            label={__('CTA Link', 'textdomain')}
                            url={ctaLink}
                            onChange={(url) => setAttributes({ ctaLink: url })}
                        />
                    </PanelBody>
                    <PanelBody title={__('Slant Color', 'textdomain')} initialOpen={false}>
                        <p>{__('Choose the bottom slant color', 'textdomain')}</p>
                        <ColorPalette
                            colors={themeColors}
                            value={
                                themeColors.find((c) => c.slug === slantColor)?.color ||
                                ''
                            }
                            onChange={(newColor) => {
                                const match = themeColors.find(
                                    (c) => c.color === newColor
                                );
                                if (match) {
                                    setAttributes({ slantColor: match.slug });
                                }
                            }}
                        />
                    </PanelBody>
                </InspectorControls>
                <div className="top-padding rwd-hero">
                    <div className="container">
                        <div className="hero-2">
                            <div className="row">
                                <div className="col-sm-12 text-center">
                                    <RichText
                                        tagName="p"
                                        placeholder={__('Pre-title...', 'textdomain')}
                                        value={preTitle}
                                        onChange={(value) => setAttributes({ preTitle: value })}
                                    />
                                    <RichText
                                        tagName="h1"
                                        className="font-brand"
                                        placeholder={__('Headline...', 'textdomain')}
                                        value={headline}
                                        onChange={(value) => setAttributes({ headline: value })}
                                    />
                                    <RichText
                                        tagName="p"
                                        placeholder={__('Content...', 'textdomain')}
                                        value={content}
                                        onChange={(value) => setAttributes({ content: value })}
                                    />
                                    {ctaBtn && (
                                        ctaLink.startsWith('#') ? (
                                            <div className="rwd-btn mt-2">
                                                {ctaBtn}
                                            </div>
                                        ) : (
                                            <a href={ctaLink} className="rwd-btn mt-2">
                                                {ctaBtn}
                                            </a>
                                        )
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save() {
        return null; // Server-side rendering
    }
});
