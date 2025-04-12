import { registerBlockType } from '@wordpress/blocks';
import {
    RichText,
    MediaUpload,
    MediaUploadCheck,
    InspectorControls,
    PanelColorSettings,
    useBlockProps,
    useSetting
} from '@wordpress/block-editor';
import {
    Button,
    PanelBody,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/icon-card-grid', {
    title: __('Icon Card Grid', 'textdomain'),
    icon: 'grid-view',
    category: 'layout',
    attributes: {
        backgroundColor: { type: 'string', default: 'white' },
        textColor: { type: 'string', default: 'black' },
        cards: {
            type: 'array',
            default: [
                { image: '', title: '', text: '' },
                { image: '', title: '', text: '' },
                { image: '', title: '', text: '' },
            ],
        },
    },
    supports: {
        html: false,
    },
    edit: ({ attributes, setAttributes }) => {
        const { backgroundColor, textColor, cards } = attributes;
        const themeColors = useSetting('color.palette') || [];

        const blockProps = useBlockProps({
            className: `row mt-4 has-${backgroundColor}-background-color has-${textColor}-color`,
        });

        const updateCard = (index, field, value) => {
            const newCards = [...cards];
            newCards[index] = { ...newCards[index], [field]: value };
            setAttributes({ cards: newCards });
        };

        return (
            <>
                <InspectorControls>
                    <PanelColorSettings
                        title={__('Colors', 'textdomain')}
                        colorSettings={[
                            {
                                label: __('Background Color'),
                                value: themeColors.find(c => c.slug === backgroundColor)?.color || '',
                                onChange: (hex) => {
                                    const match = themeColors.find(c => c.color === hex);
                                    if (match) setAttributes({ backgroundColor: match.slug });
                                },
                            },
                            {
                                label: __('Text Color'),
                                value: themeColors.find(c => c.slug === textColor)?.color || '',
                                onChange: (hex) => {
                                    const match = themeColors.find(c => c.color === hex);
                                    if (match) setAttributes({ textColor: match.slug });
                                },
                            },
                        ]}
                    />
                </InspectorControls>

                <div {...blockProps}>
                    {cards.map((card, index) => (
                        <div key={index} className="col-md-4">
                            <div className="card" data-aos="fade-up">
                                <div className="card-body">
                                    <MediaUploadCheck>
                                        <MediaUpload
                                            onSelect={(media) => updateCard(index, 'image', media.url)}
                                            allowedTypes={['image/svg+xml', 'image/png', 'image/jpeg']}
                                            value={card.image}
                                            render={({ open }) => (
                                                <Button onClick={open} isSecondary className="mb-3">
                                                    {card.image ? __('Change Icon') : __('Upload Icon')}
                                                </Button>
                                            )}
                                        />
                                    </MediaUploadCheck>
                                    {card.image && (
                                        <img src={card.image} alt="" className="mb-3" style={{ maxHeight: '60px' }} />
                                    )}
                                    <RichText
                                        tagName="h4"
                                        className="card-title font-small-heading"
                                        placeholder={__('Card title…')}
                                        value={card.title}
                                        onChange={(val) => updateCard(index, 'title', val)}
                                    />
                                    <RichText
                                        tagName="p"
                                        className="card-text"
                                        placeholder={__('Card description…')}
                                        value={card.text}
                                        onChange={(val) => updateCard(index, 'text', val)}
                                    />
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </>
        );
    },
    save() {
        return null; // Server-rendered
    },
});
