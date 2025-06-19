import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    InspectorControls,
    useBlockProps,
    InnerBlocks
} from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/process-steps', {
    title: __('Process Steps', 'rwd'),
    icon: 'admin-generic',
    category: 'layout',
    attributes: {
        
    },
    supports: {
        color: { background: true, text: true },
        spacing: { padding: true }
    },
    edit: ({ attributes, setAttributes }) => {
        const { subheading, heading } = attributes;
        const blockProps = useBlockProps({ className: 'industry-process text-center bg-primary' });

        return (
            <>
                <div {...blockProps}>
                    <div className="container">
                        <p className="font-heading txt-secondary mb-0 text-center">{subheading}</p>
                        <h2 className="text-center mb-4 hdln-2 txt-dark">{heading}</h2>
                        <div className="row mt-4 d-flex justify-content-center">
                            <InnerBlocks
                                allowedBlocks={['rwd/process-item']}
                                template={[['rwd/process-item'], ['rwd/process-item'], ['rwd/process-item']]}
                                templateLock={false}
                            />
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save: () => <InnerBlocks.Content />
});
