<?php

/* Includes Blocks */

function lwn_recipe_lwn_recipe_meta_block_init()
{
  register_block_type(__DIR__ . '/blocks/lwn-recipe-meta/build', [
    'render_callback' => 'lwn_recipe_lwn_recipe_meta_render_callback',
  ]);
  register_block_type(__DIR__ . '/blocks/lwn-recipe-notes/build');
}
add_action('init', 'lwn_recipe_lwn_recipe_meta_block_init');

// Lwn Recipe Render Callback
function lwn_recipe_lwn_recipe_meta_render_callback(
  $block_attributes,
  $content,
  $block
) {
  // Get the post type from context
  $post_type = isset($block->context['postType'])
    ? $block->context['postType']
    : null;
  // get the post id
  $post_id = isset($block->context['postId'])
    ? $block->context['postId']
    : null;

  // Only display the content on the lwn_recipe posts
  if ($post_type !== 'lwn_recipe') {
    return;
  }

  // If post id not defined, return nothing
  if (!$post_id) {
    return;
  }

  // Get Color attributes
  $box_title_color = isset($block_attributes['boxTitleColor'])
    ? esc_attr($block_attributes['boxTitleColor'])
    : '#2d2c39';
  $box_value_color = isset($block_attributes['boxValueColor'])
    ? esc_attr($block_attributes['boxValueColor'])
    : '#8fb257';
  $box_background = isset($block_attributes['boxBackground'])
    ? esc_attr($block_attributes['boxBackground'])
    : '#8fb257';

  $metafieldMap = [
    'prep_time' => '_lwn_recipe_meta_prep_time',
    'cook_time' => '_lwn_recipe_meta_cook_time',
    'overall_time' => '_lwn_recipe_meta_overall_time',
    'servings' => '_lwn_recipe_meta_servings',
    'is_vegan' => '_lwn_recipe_meta_is_vegan',
    'meal' => '_lwn_recipe_meta_meal',
  ];

  ob_start();
  ?>
		<div class="wp-block-lwn-recipe-lwn-recipe-meta <?php echo is_post_type_archive(
    $post_type
  )
    ? 'archive-page'
    : ''; ?> " >
			<div class="wp-block-lwn-recipe-lwn-recipe-meta__boxes">
				<div
					class="wp-block-lwn-recipe-lwn-recipe-meta__box"
					 style="background: <?php echo esc_attr($box_background); ?>"
				>
					<p style="color: <?php echo esc_attr($box_title_color); ?>">
						<?php echo __('Preparation Time', 'lwn-recipe'); ?>
					</p>
					<p style="color: <?php echo esc_attr($box_value_color); ?>">
							<?php echo esc_html(
         get_post_meta($post_id, $metafieldMap['prep_time'], true)
       ); ?>
					</p>
				</div>
				<div
					class="wp-block-lwn-recipe-lwn-recipe-meta__box"
					 style="background: <?php echo esc_attr($box_background); ?>"
				>
					<p style="color: <?php echo esc_attr($box_title_color); ?>">
						<?php echo __('Cooking Time', 'lwn-recipe'); ?>
					</p>

					<p style="color: <?php echo esc_attr($box_value_color); ?>">
							<?php echo esc_html(
         get_post_meta($post_id, $metafieldMap['cook_time'], true)
       ); ?>
					</p>
				</div>
				<div
					class="wp-block-lwn-recipe-lwn-recipe-meta__box"
					 style="background: <?php echo esc_attr($box_background); ?>"
				>
					<p style="color: <?php echo esc_attr($box_title_color); ?>">
						<?php echo __('Overall Time', 'lwn-recipe'); ?>
					</p>
					<p style="color: <?php echo esc_attr($box_value_color); ?>">
							<?php echo esc_html(
         get_post_meta($post_id, $metafieldMap['overall_time'], true)
       ); ?>
					</p>
				</div>
				<div
					class="wp-block-lwn-recipe-lwn-recipe-meta__box"
					 style="background: <?php echo esc_attr($box_background); ?>"
				>
					<p style="color: <?php echo esc_attr($box_title_color); ?>">
						<?php echo __('Servings', 'lwn-recipe'); ?>
					</p>
					<p style="color: <?php echo esc_attr($box_value_color); ?>">
							<?php echo esc_html(
         get_post_meta($post_id, $metafieldMap['servings'], true)
       ); ?>
					</p>
				</div>
				<div
					class="wp-block-lwn-recipe-lwn-recipe-meta__box"
					 style="background: <?php echo esc_attr($box_background); ?>"
				>
					<p style="color: <?php echo esc_attr($box_title_color); ?>">
						<?php echo __('Meal', 'lwn-recipe'); ?>
					</p>

					<p style="color: <?php echo esc_attr($box_value_color); ?>">
							<?php echo esc_html(get_post_meta($post_id, $metafieldMap['meal'], true)); ?>
					</p>

				</div>
				<div
					class="wp-block-lwn-recipe-lwn-recipe-meta__box"
					 style="background: <?php echo esc_attr($box_background); ?>"
				>
					<p style="color: <?php echo esc_attr($box_title_color); ?>">
						<?php echo __('Vegan?', 'lwn-recipe'); ?>
					</p>
					<p style="color: <?php echo esc_attr($box_value_color); ?>">
							<?php echo esc_html(get_post_meta($post_id, $metafieldMap['is_vegan'], true))
         ? __('Yes', 'lwn-recipe')
         : __('No', 'lwn-recipe'); ?>
								</p>
					</div>
				</div>
			</div>
<?php return ob_get_clean();
}
