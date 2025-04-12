import { registerBlockType } from '@wordpress/blocks';
import {
    useBlockProps,
    InspectorControls,
    PanelColorSettings,
    useSetting
} from '@wordpress/block-editor';
import {
    PanelBody,
    SelectControl,
    ToggleControl,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/svg-divider', {
    title: __('SVG Divider', 'textdomain'),
    icon: 'image-flip-vertical',
    category: 'design',
    attributes: {
        topColor: { type: 'string', default: 'transparent' },
        bottomColor: { type: 'string', default: 'white' },
        fill: { type: 'string', default: '#ffffff' },
        inverted: { type: 'boolean', default: false },
        position: { type: 'string', default: 'bottom' },
    },
    supports: {
        html: false,
    },
    edit: ({ attributes, setAttributes }) => {
        const {
            topColor,
            bottomColor,
            fill,
            inverted,
            position,
        } = attributes;

        const themeColors = useSetting('color.palette') || [];

        const blockProps = useBlockProps({
            className: `svg-divider-slant ${position !== 'none' ? 'position-absolute' : ''} has-${topColor}-background-color is-${position} left-0 w-100 ${inverted ? 'inverted' : ''}`,
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Divider Settings', 'textdomain')} initialOpen={true}>
                        <SelectControl
                            label={__('Position', 'textdomain')}
                            value={position}
                            options={[
                                { label: 'Bottom', value: 'bottom' },
                                { label: 'Top', value: 'top' },
                                { label: 'None', value: 'none' },
                            ]}
                            onChange={(val) => setAttributes({ position: val })}
                        />
                        <ToggleControl
                            label={__('Inverted Slant', 'textdomain')}
                            checked={inverted}
                            onChange={(val) => setAttributes({ inverted: val })}
                        />
                    </PanelBody>
                    <PanelColorSettings
                        title={__('Colors', 'textdomain')}
                        colorSettings={[
                            {
                                label: __('Top Background Color', 'textdomain'),
                                value: themeColors.find(c => c.slug === topColor)?.color || '',
                                onChange: (hex) => {
                                    const match = themeColors.find(c => c.color === hex);
                                    if (match) {
                                        setAttributes({ topColor: match.slug });
                                    }
                                },
                            },
                            {
                                label: __('Bottom Fill Color', 'textdomain'),
                                value: themeColors.find(c => c.slug === bottomColor)?.color || '',
                                onChange: (hex) => {
                                    const match = themeColors.find(c => c.color === hex);
                                    if (match) {
                                        setAttributes({ bottomColor: match.slug });
                                    }
                                },
                            },
                        ]}
                    />
                </InspectorControls>

                <div {...blockProps}>
                    <svg
                        data-name="Layer 1"
                        className={`has-${bottomColor}-fill-color`}
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1200 120"
                        preserveAspectRatio="none"
                    >
                        <path
                            d="M1200 120L0 16.48 0 0 1200 0 1200 120z"
                            className="shape-fill"
                            fill={fill}
                        ></path>
                    </svg>
                </div>
            </>
        );
    },
    save() {
        return null; // Server-side rendered
    },
});
