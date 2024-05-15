import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const blockProps = useBlockProps.save();
	return (
		<div {...blockProps}>
			<div className="wp-block-lwn-recipe-lwn-recipe-meta__boxes">
				<div
					className="wp-block-lwn-recipe-lwn-recipe-meta__box"
					style={{ background: attributes.boxBackground }}
				>
					<p style={{ color: attributes.boxTitleColor }}>
						{__('Preparation Time', 'lwn-recipe-meta')}
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
						{__('Cooking Time', 'lwn-recipe-meta')}
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
						{__('Overall Time', 'lwn-recipe-meta')}
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
						{__('Servings', 'lwn-recipe-meta')}
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
						{__('Meal', 'lwn-recipe-meta')}
					</p>

					<p style={{ color: attributes.boxValueColor }}>{attributes.meal}</p>
				</div>
				<div
					className="wp-block-lwn-recipe-lwn-recipe-meta__box"
					style={{ background: attributes.boxBackground }}
				>
					<p style={{ color: attributes.boxTitleColor }}>
						{__('Vegan?', 'lwn-recipe-meta')}
					</p>
					<p style={{ color: attributes.boxValueColor }}>
						{attributes.isVegan
							? __('Yes', 'lwn-recipe-meta')
							: __('No', 'lwn-recipe-meta')}
					</p>
				</div>
			</div>
		</div>
	);
}
