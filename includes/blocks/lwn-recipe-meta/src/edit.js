import { useEffect } from 'react';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelColorSettings } from '@wordpress/block-editor';
import { Panel, PanelBody } from '@wordpress/components';
import { RangeControl } from '@wordpress/components';
import { ToggleControl } from '@wordpress/components';
import { SelectControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';

import './editor.scss';

export default function Edit({ attributes, setAttributes, context }) {
	// Get postId & postType from context
	const { postId } = context;
	const { postType } = context;

	// Only Display Meta Block On  the Lwn_recipe posts
	if (postType !== 'lwn_recipe') {
		return (
			<div style={{ background: 'orange', padding: '10px' }}>
				{__('This block is only available for the recipe post.', 'lwn-recipe')}
			</div>
		);
	}

	// Check if this is the archive page
	const isArchive = useSelect((select) => {
		const store = select('core/edit-site');
		const postId = store?.getEditedPostId();
		return Boolean(postId && postId.includes('//archive'));
	});

	const blockProps = useBlockProps({
		className: isArchive ? 'archive-page' : '',
	});

	// Meta Keys
	const metaKeysMap = {
		prep_time: '_lwn_recipe_meta_prep_time',
		cook_time: '_lwn_recipe_meta_cook_time',
		overall_time: '_lwn_recipe_meta_overall_time',
		servings: '_lwn_recipe_meta_servings',
		is_vegan: '_lwn_recipe_meta_is_vegan',
		meal: '_lwn_recipe_meta_meal',
	};

	// Get meta value from database
	const [meta, setMeta] = useEntityProp('postType', postType, 'meta', postId);

	useEffect(() => {
		// Save/set the postType Attribute
		if (postType) {
			setAttributes({ postType });
		}
	}, [postType]);

	// Set the overall time meta
	useEffect(() => {
		if (meta[metaKeysMap['prep_time']] && meta[metaKeysMap['cook_time']]) {
			setMeta({
				...meta,
				[metaKeysMap['overall_time']]:
					meta[metaKeysMap['prep_time']] + meta[metaKeysMap['cook_time']],
			});
		}
	}, [meta[metaKeysMap['prep_time']], meta[metaKeysMap['cook_time']]]);

	return (
		<>
			<InspectorControls>
				<Panel header={__('Recipe Settings', 'lwn-recipe')}>
					<PanelBody
						title={__('Recipe Time', 'lwn-recipe')}
						initialOpen={false}
					>
						<RangeControl
							label={__('Preparation Time (Minutes)', 'lwn-recipe')}
							value={meta[metaKeysMap['prep_time']]}
							onChange={(value) =>
								setMeta({ ...meta, [metaKeysMap['prep_time']]: value })
							}
							min={1}
							max={60 * 24}
						/>
						<RangeControl
							label={__('Cooking Time (Minutes)', 'lwn-recipe')}
							value={meta[metaKeysMap['cook_time']]}
							onChange={(value) =>
								setMeta({ ...meta, [metaKeysMap['cook_time']]: value })
							}
							min={1}
							max={60 * 24}
						/>
					</PanelBody>
					<PanelBody
						title={__('Other Recipe Meta', 'lwn-recipe')}
						initialOpen={false}
					>
						<RangeControl
							label={__('Servings (per person)', 'lwn-recipe')}
							value={meta[metaKeysMap['servings']]}
							onChange={(value) =>
								setMeta({ ...meta, [metaKeysMap['servings']]: value })
							}
							min={1}
							max={100}
						/>
						<ToggleControl
							label={__('Is Vegan?', 'lwn-recipe')}
							checked={meta[metaKeysMap['is_vegan']]}
							onChange={(value) =>
								setMeta({ ...meta, [metaKeysMap['is_vegan']]: value })
							}
						/>
						<SelectControl
							label={__('Meal', 'lwn-recipe')}
							value={meta[metaKeysMap['meal']]}
							options={[
								{
									value: 'breakfast',
									label: __('Breakfast', 'lwn-recipe'),
								},
								{ value: 'lunch', label: __('Lunch', 'lwn-recipe') },
								{ value: 'dinner', label: __('Dinner', 'lwn-recipe') },
							]}
							onChange={(value) =>
								setMeta({ ...meta, [metaKeysMap['meal']]: value })
							}
						/>
					</PanelBody>
					<PanelBody
						title={__('Color Settings', 'lwn-recipe')}
						initialOpen={false}
					>
						<PanelColorSettings
							title={__('Recipe Meta Box Color', 'lwn-recipe')}
							initialOpen={true}
							colorSettings={[
								{
									label: __('Box Background', 'lwn-recipe'),
									value: attributes.boxBackground,
									onChange: (newValue) =>
										setAttributes({ boxBackground: newValue }),
								},
								{
									label: __('Box Title Color', 'lwn-recipe'),
									value: attributes.boxTitleColor,
									onChange: (newValue) =>
										setAttributes({ boxTitleColor: newValue }),
								},
								{
									label: __('Box Value Color', 'lwn-recipe'),
									value: attributes.boxValueColor,
									onChange: (newValue) =>
										setAttributes({ boxValueColor: newValue }),
								},
							]}
						/>
					</PanelBody>
				</Panel>
			</InspectorControls>
			<div {...blockProps}>
				<div className="wp-block-lwn-recipe-lwn-recipe-meta__boxes">
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Preparation Time', 'lwn-recipe')}
						</p>
						<p style={{ color: attributes.boxValueColor }}>
							{meta[metaKeysMap['prep_time']]}
						</p>
					</div>
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Cooking Time', 'lwn-recipe')}
						</p>

						<p style={{ color: attributes.boxValueColor }}>
							{meta[metaKeysMap['cook_time']]}
						</p>
					</div>
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Overall Time', 'lwn-recipe')}
						</p>
						<p style={{ color: attributes.boxValueColor }}>
							{meta[metaKeysMap['overall_time']]}
						</p>
					</div>
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Servings', 'lwn-recipe')}
						</p>
						<p style={{ color: attributes.boxValueColor }}>
							{meta[metaKeysMap['servings']]}
						</p>
					</div>
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Meal', 'lwn-recipe')}
						</p>

						<p style={{ color: attributes.boxValueColor }}>
							{meta[metaKeysMap['meal']]}
						</p>
					</div>
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Vegan?', 'lwn-recipe')}
						</p>
						<p style={{ color: attributes.boxValueColor }}>
							{meta[metaKeysMap['is_vegan']]
								? __('Yes', 'lwn-recipe')
								: __('No', 'lwn-recipe')}
						</p>
					</div>
				</div>
			</div>
		</>
	);
}
