// icon-list-item/index.js
import { registerBlockType } from '@wordpress/blocks';
import {
    useBlockProps,
    RichText,
    MediaUpload
} from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/icon-list-item', {
    title: __('Icon List Item'),
    parent: ['rwd/icon-list-section'],
    icon: 'admin-customizer',
    category: 'layout',
    attributes: {
        iconUrl: { type: 'string', default: '' },
        text: { type: 'string', default: '' },
    },
    edit: ({ attributes, setAttributes }) => {
        const blockProps = useBlockProps({ className: 'col-12 col-sm-6 col-md-4 text-center icon-list-item mb-4' });

        return (
            <div {...blockProps}>
                {attributes.iconUrl ? (
                    <img src={attributes.iconUrl} alt="Icon" className="mb-3" style={{ height: '40px' }} />
                ) : (
                    <MediaUpload
                        onSelect={(media) => setAttributes({ iconUrl: media.url })}
                        allowedTypes={['image/svg+xml', 'image/png']}
                        render={({ open }) => (
                            <Button onClick={open} variant="secondary" className="mb-3">
                                {__('Choose Icon')}
                            </Button>
                        )}
                    />
                )}
                <RichText
                    tagName="p"
                    value={attributes.text}
                    onChange={(val) => setAttributes({ text: val })}
                    placeholder="Enter item text"
                />
            </div>
        );
    },
    save: () => null // Server-side rendered
});
