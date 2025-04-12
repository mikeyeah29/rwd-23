import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    URLInputButton,
    InspectorControls,
    useBlockProps,
} from '@wordpress/block-editor';
import {
    PanelBody,
    ToggleControl,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/cta-inline', {
    title: __('Inline CTA', 'textdomain'),
    icon: 'megaphone',
    category: 'layout',
    attributes: {
        text: { type: 'string', default: 'Ready to Get Started?' },
        buttonText: { type: 'string', default: 'Book a FREE Call' },
        buttonUrl: { type: 'string', default: '' },
        addTopPadding: { type: 'boolean', default: true },
    },
    supports: {
        html: false,
        color: { background: true },
        spacing: {
            padding: true,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const { text, buttonText, buttonUrl, addTopPadding } = attributes;

        const blockProps = useBlockProps();

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Options', 'textdomain')} initialOpen={true}>
                        <ToggleControl
                            label={__('Add Small Top Padding', 'textdomain')}
                            checked={addTopPadding}
                            onChange={(val) => setAttributes({ addTopPadding: val })}
                        />
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps}>
                    <RichText
                        tagName="p"
                        className={`txt-large font-default-display ${addTopPadding ? 'pt-small' : ''}`}
                        placeholder={__('Enter your prompt text…')}
                        value={text}
                        onChange={(val) => setAttributes({ text: val })}
                    />
                    {buttonUrl ? (
                        <a href={buttonUrl} className="rwd-btn book-a-call cursor-pointer">
                            {buttonText}
                        </a>
                    ) : (
                        <div className="rwd-btn book-a-call cursor-pointer">
                            {buttonText}
                        </div>
                    )}
                    <div className="mt-2">
                        <URLInputButton
                            label={__('CTA Button Link')}
                            url={buttonUrl}
                            onChange={(val) => setAttributes({ buttonUrl: val })}
                        />
                    </div>
                </div>
            </>
        );
    },
    save() {
        return null; // PHP-rendered
    },
});
