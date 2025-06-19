import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/intro-section-centered', {
    title: __('Intro Section Centered'),
    icon: 'editor-aligncenter',
    category: 'design',
    supports: {
        color: { background: true, text: true },
        spacing: { padding: true },
    },
    edit: () => {
        const blockProps = useBlockProps({
            className: 'intro-section-centered',
        });

        return (
            <div {...blockProps}>
                <div className="container">
                    <div className="row d-flex justify-content-center">
                        <div className="col-sm-7 text-center">
                            <div data-aos="fade-up" data-aos-duration="1000">
                                <InnerBlocks
                                    allowedBlocks={['core/paragraph', 'core/heading', 'core/list', 'core/image', 'core/buttons', 'rwd/rwd-list']}
                                    template={[
                                        ['core/heading', { level: 2, placeholder: 'Add your intro...' }],
                                        ['core/paragraph', { placeholder: 'Add your intro...' }],
                                    ]}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    },
    save: () => <InnerBlocks.Content />
});
