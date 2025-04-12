import { registerBlockType } from '@wordpress/blocks';
import {
    InspectorControls,
    useBlockProps,
} from '@wordpress/block-editor';
import {
    PanelBody,
    RangeControl,
    SelectControl,
    TextControl,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('rwd/portfolio-featured', {
    title: __('Portfolio Featured', 'textdomain'),
    icon: 'grid-view',
    category: 'widgets',
    attributes: {
        postsPerPage: { type: 'number', default: -1 },
        order: { type: 'string', default: 'DESC' },
        postIn: { type: 'string', default: '' }, // comma-separated IDs
    },
    edit: ({ attributes, setAttributes }) => {
        const { postsPerPage, order, postIn } = attributes;

        const blockProps = useBlockProps();

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Query Settings', 'textdomain')} initialOpen={true}>
                        <RangeControl
                            label={__('Posts Per Page')}
                            min={-1}
                            max={20}
                            step={1}
                            value={postsPerPage}
                            onChange={(value) => setAttributes({ postsPerPage: value })}
                            allowReset
                        />
                        <SelectControl
                            label={__('Order')}
                            value={order}
                            options={[
                                { label: 'Descending', value: 'DESC' },
                                { label: 'Ascending', value: 'ASC' },
                            ]}
                            onChange={(val) => setAttributes({ order: val })}
                        />
                        <TextControl
                            label={__('Post IDs (comma separated)')}
                            value={postIn}
                            onChange={(val) => setAttributes({ postIn: val })}
                            help={__('Leave blank to include all posts')}
                        />
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps}>
                    <p><strong>{__('Portfolio Items will render here.', 'textdomain')}</strong></p>
                </div>
            </>
        );
    },
    save() {
        return null; // SSR in PHP
    },
});
