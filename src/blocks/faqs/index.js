// blocks/faq-section/index.js
import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

registerBlockType('rwd/faq-section', {
    title: 'FAQ Section',
    icon: 'format-chat',
    category: 'layout',
    supports: {
        color: { background: true, text: true },
        spacing: { padding: true }
    },
    edit: () => (
        <section className="faq-section py-5 bg-light">
            <div className="container">
                <div className="faq-container">
                    <InnerBlocks
                        allowedBlocks={['rwd/faq-item']}
                        template={[['rwd/faq-item']]}
                        orientation="vertical"
                    />
                </div>
            </div>
        </section>
    ),
    save: () => <InnerBlocks.Content />
});