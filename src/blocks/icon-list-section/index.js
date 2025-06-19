// icon-list-section/index.js
import { registerBlockType } from '@wordpress/blocks';
import {
    useBlockProps,
    InnerBlocks,
    InspectorControls,
    RichText
} from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/icon-list-section', {
    title: __('Icon List Section'),
    category: 'layout',
    icon: 'screenoptions',
    supports: {
        color: { background: true, text: true },
        spacing: { padding: true },
    },
    attributes: {
        heading: { type: 'string', default: '' },
        subheading: { type: 'string', default: '' },
    },
    edit: ({ attributes, setAttributes }) => {
        const blockProps = useBlockProps({ className: 'icon-list-section' });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Section Settings')}>
                        {/* You can add options here later if needed */}
                    </PanelBody>
                </InspectorControls>
                <div {...blockProps}>
                    <div className="container text-center">
                        <RichText
                            tagName="p"
                            className="section-subheading"
                            value={attributes.subheading}
                            onChange={(val) => setAttributes({ subheading: val })}
                            placeholder="Enter subheading"
                        />
                        <RichText
                            tagName="h2"
                            className="section-heading"
                            value={attributes.heading}
                            onChange={(val) => setAttributes({ heading: val })}
                            placeholder="Enter heading"
                        />
                        <div className="row justify-content-center pt-4">
                            <InnerBlocks
                                allowedBlocks={['rwd/icon-list-item']}
                                template={[
                                    ['rwd/icon-list-item'],
                                    ['rwd/icon-list-item'],
                                    ['rwd/icon-list-item'],
                                ]}
                                orientation="horizontal"
                            />
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save: () => <InnerBlocks.Content />
});
