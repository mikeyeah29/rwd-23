// blocks/faq-item/index.js
import { registerBlockType } from '@wordpress/blocks';
import { RichText, useBlockProps } from '@wordpress/block-editor';

registerBlockType('rwd/faq-item', {
    title: 'FAQ Item',
    icon: 'editor-help',
    category: 'layout',
    parent: ['rwd/faq-section'],
    attributes: {
        question: { type: 'string', default: '' },
        answer: { type: 'string', default: '' }
    },
    edit: ({ attributes, setAttributes }) => {
        const { question, answer } = attributes;
        const props = useBlockProps({ className: 'faq-item' });

        return (
            <div {...props}>
                <RichText
                    tagName="div"
                    className="faq-question"
                    placeholder="Enter question..."
                    value={question}
                    onChange={(val) => setAttributes({ question: val })}
                />
                <RichText
                    tagName="p"
                    className="faq-answer"
                    placeholder="Enter answer..."
                    value={answer}
                    onChange={(val) => setAttributes({ answer: val })}
                />
            </div>
        );
    },
    save: () => null
});
