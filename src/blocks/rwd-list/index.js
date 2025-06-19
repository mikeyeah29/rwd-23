import { __ } from '@wordpress/i18n';
import {
    useBlockProps,
    RichText,
    InspectorControls,
} from '@wordpress/block-editor';
import {
    PanelBody,
    Button,
} from '@wordpress/components';
import { Fragment } from '@wordpress/element';
import { registerBlockType } from '@wordpress/blocks';

registerBlockType('rwd/rwd-list', {
    title: __('RWD List'),
    icon: 'editor-ul',
    category: 'design',
    attributes: {
        items: {
            type: 'array',
            default: [{ text: 'Technical SEO issues' }],
        },
    },
    supports: {
        html: false,
        color: {
            background: true,
            text: true,
        },
        spacing: {
            padding: true,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const { items } = attributes;

        const blockProps = useBlockProps({
            className: 'rwd-list',
        });

        const updateItem = (text, index) => {
            const newItems = [...items];
            newItems[index] = { text };
            setAttributes({ items: newItems });
        };

        const addItem = () => {
            setAttributes({ items: [...items, { text: '' }] });
        };

        const removeItem = (index) => {
            const newItems = items.filter((_, i) => i !== index);
            setAttributes({ items: newItems });
        };

        return (
            <Fragment>
                <InspectorControls>
                    <PanelBody title={__('List Items')}>
                        <Button isPrimary onClick={addItem}>
                            {__('Add Item')}
                        </Button>
                    </PanelBody>
                </InspectorControls>
                <div {...blockProps}>
                    {items.map((item, index) => (
                        <div className="rwd-list__item" key={index}>
                            <svg
                                width="32"
                                height="32"
                                viewBox="0 0 202 202"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M183.946 86.717C184.67 91.3798 185.167 96.1268 185.167 101C185.167 152.131 143.715 193.583 92.5833 193.583C41.4521 193.583 0 152.131 0 101C0 49.8688 41.4521 8.41675 92.5833 8.41675C112.346 8.41675 130.61 14.6535 145.642 25.1912L133.682 37.4542C121.831 29.7698 107.733 25.2501 92.5833 25.2501C50.8114 25.2501 16.8333 59.2366 16.8333 101C16.8333 142.764 50.8114 176.75 92.5833 176.75C133.775 176.75 167.315 143.689 168.249 102.726L183.946 86.717ZM175.942 18.239L96.7917 99.3672L64.4464 68.9494L38.3968 95.0243L96.7917 151.5L202 44.297L175.942 18.239Z"
                                    fill="url(#paint0_linear_50_123)"
                                />
                                <defs>
                                    <linearGradient
                                        id="paint0_linear_50_123"
                                        x1="101"
                                        y1="8.41675"
                                        x2="101"
                                        y2="193.583"
                                        gradientUnits="userSpaceOnUse"
                                    >
                                        <stop stopColor="#C30062" />
                                        <stop offset="1" stopColor="#002877" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            <div className="rwd-list__item-title">
                                <RichText
                                    tagName="p"
                                    value={item.text}
                                    onChange={(text) => updateItem(text, index)}
                                    placeholder={__('List item text…')}
                                />
                                <Button
                                    isDestructive
                                    variant="link"
                                    onClick={() => removeItem(index)}
                                >
                                    {__('Remove')}
                                </Button>
                            </div>
                        </div>
                    ))}
                </div>
            </Fragment>
        );
    },
    save: () => null, // Server-side rendered
});
