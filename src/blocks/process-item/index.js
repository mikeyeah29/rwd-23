import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    useBlockProps,
    InspectorControls,
    ColorPalette,
    useSetting,
} from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';

registerBlockType('rwd/process-item', {
    title: 'Process Item',
    icon: 'editor-ol',
    category: 'layout',
    parent: ['rwd/process-steps'],
    attributes: {
        number: { type: 'string', default: '' },
        title: { type: 'string', default: '' },
        description: { type: 'string', default: '' },
        numberBgColor: { type: 'string', default: 'secondary' }, // color slug
    },
    supports: {
        color: { background: true, text: true },
        spacing: { padding: true },
    },
    edit: ({ attributes, setAttributes }) => {
        const { number, title, description, numberBgColor } = attributes;
        const blockProps = useBlockProps({ className: 'col-md-4' });
        const themeColors = useSetting('color.palette') || [];

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Number Badge Color">
                        <ColorPalette
                            colors={themeColors}
                            value={
                                themeColors.find((c) => c.slug === numberBgColor)?.color || ''
                            }
                            onChange={(color) => {
                                const match = themeColors.find((c) => c.color === color);
                                if (match) {
                                    setAttributes({ numberBgColor: match.slug });
                                }
                            }}
                        />
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps}>
                    <div className="process-item" data-aos="fade-up">
                        <div className="process-item-body">
                            <RichText
                                tagName="div"
                                className={`font-brand number has-${numberBgColor}-background-color`}
                                value={number}
                                onChange={(val) => setAttributes({ number: val })}
                                placeholder="1"
                            />
                            <RichText
                                tagName="h5"
                                className="card-title font-heading"
                                value={title}
                                onChange={(val) => setAttributes({ title: val })}
                                placeholder="Step Title"
                            />
                            <RichText
                                tagName="p"
                                className="card-text"
                                value={description}
                                onChange={(val) => setAttributes({ description: val })}
                                placeholder="Step Description"
                            />
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save: () => null, // Server rendered
});