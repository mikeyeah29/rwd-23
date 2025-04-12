import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    InnerBlocks,
    InspectorControls,
    PanelColorSettings,
    useBlockProps,
    useSetting,
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/icon-card', {
    title: __('Icon Card', 'textdomain'),
    icon: 'format-aside',
    category: 'layout',
    parent: ['rwd/icon-card-grid'],
    attributes: {
        title: { type: 'string', default: '' },
        text: { type: 'string', default: '' },
    },
    supports: {
        reusable: false,
    },
    edit: ({ attributes, setAttributes }) => {
        const { title, text } = attributes;

        return (
            <div className="col-md-4">
                <div className="card" data-aos="fade-up">
                    <div className="card-body">
                        <InnerBlocks
                            allowedBlocks={['core/html']}
                            template={[['core/html', { content: '<!-- Your SVG icon here -->' }]]}
                            templateLock={false}
                        />
                        <RichText
                            tagName="h4"
                            className="card-title font-heading"
                            placeholder={__('Card title…')}
                            value={title}
                            onChange={(val) => setAttributes({ title: val })}
                        />
                        <RichText
                            tagName="p"
                            className="card-text"
                            placeholder={__('Card description…')}
                            value={text}
                            onChange={(val) => setAttributes({ text: val })}
                        />
                    </div>
                </div>
            </div>
        );
    },
    save() {
        return null;
    },
});
