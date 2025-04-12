import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

registerBlockType('rwd/contact-form', {
    title: __('Contact Form', 'rwd'),
    icon: 'email',
    category: 'widgets',
    attributes: {
        eyebrow: {
            type: 'string',
            default: 'Contact Me',
        },
        heading: {
            type: 'string',
            default: 'Book a free call',
        },
        content: {
            type: 'string',
            default: 'If you’re ready to get started or just want to ask a few questions to find out if I can help you, simply fill out a few details below and I’ll get back to you within 48 hours.',
        },
    },
    supports: {
        html: false,
        color: { background: true },
        spacing: {
            padding: true,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const blockProps = useBlockProps();
        return (
            <div {...blockProps}>
                <RichText
                    tagName="p"
                    className="font-heading txt-secondary mb-0 text-center"
                    value={attributes.eyebrow}
                    onChange={(eyebrow) => setAttributes({ eyebrow })}
                    placeholder={__('Enter eyebrow…', 'your-text-domain')}
                />
                <RichText
                    tagName="h2"
                    className="hdln-2 txt-dark text-center mb-4"
                    value={attributes.heading}
                    onChange={(heading) => setAttributes({ heading })}
                    placeholder={__('Enter heading…', 'your-text-domain')}
                />
                <RichText
                    tagName="p"
                    className="text-center mb-5"
                    value={attributes.content}
                    onChange={(content) => setAttributes({ content })}
                    placeholder={__('Enter intro content…', 'your-text-domain')}
                />
                <p><em>{__('Contact form will appear below on frontend', 'your-text-domain')}</em></p>
            </div>
        );
    },
    save: () => null, // Rendered in PHP
});
