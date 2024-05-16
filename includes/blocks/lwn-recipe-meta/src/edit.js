import { useEffect } from 'react';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelColorSettings } from '@wordpress/block-editor';
import { Panel, PanelBody } from '@wordpress/components';
import { RangeControl } from '@wordpress/components';
import { ToggleControl } from '@wordpress/components';
import { SelectControl } from '@wordpress/components';

import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();

	useEffect(() => {
		if (attributes.preparation_time && attributes.cooking_time) {
			setAttributes({
				...attributes,
				overall_time:
					parseInt(attributes.preparation_time) +
					parseInt(attributes.cooking_time),
			});
		}
	}, [attributes.preparation_time, attributes.cooking_time]);
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
							value={attributes.preparation_time}
							onChange={(value) => setAttributes({ preparation_time: value })}
							min={1}
							max={60 * 24}
						/>
						<RangeControl
							label={__('Cooking Time (Minutes)', 'lwn-recipe')}
							value={attributes.cooking_time}
							onChange={(value) => setAttributes({ cooking_time: value })}
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
							value={attributes.servings}
							onChange={(value) => setAttributes({ servings: value })}
							min={1}
							max={100}
						/>
						<ToggleControl
							label={__('Is Vegan?', 'lwn-recipe')}
							checked={attributes.isVegan}
							onChange={(value) => setAttributes({ isVegan: value })}
						/>
						<SelectControl
							label={__('Meal', 'lwn-recipe')}
							value={attributes.meal}
							options={[
								{
									value: 'breakfast',
									label: __('Breakfast', 'lwn-recipe'),
								},
								{ value: 'lunch', label: __('Lunch', 'lwn-recipe') },
								{ value: 'dinner', label: __('Dinner', 'lwn-recipe') },
							]}
							onChange={(value) => setAttributes({ meal: value })}
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
							{attributes.preparation_time}
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
							{attributes.cooking_time}
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
							{attributes.overall_time}
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
							{attributes.servings}
						</p>
					</div>
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Meal', 'lwn-recipe')}
						</p>

						<p style={{ color: attributes.boxValueColor }}>{attributes.meal}</p>
					</div>
					<div
						className="wp-block-lwn-recipe-lwn-recipe-meta__box"
						style={{ background: attributes.boxBackground }}
					>
						<p style={{ color: attributes.boxTitleColor }}>
							{__('Vegan?', 'lwn-recipe')}
						</p>
						<p style={{ color: attributes.boxValueColor }}>
							{attributes.isVegan
								? __('Yes', 'lwn-recipe')
								: __('No', 'lwn-recipe')}
						</p>
					</div>
				</div>
			</div>
		</>
	);
}
