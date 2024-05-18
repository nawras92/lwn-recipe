<?php

// Sanitize Boolean
function sanitize_boolean($value)
{
  return filter_var($value, FILTER_VALIDATE_BOOLEAN);
}

/*  Register Recipe  Meta */
add_action('init', 'lwn_recipe_register_recipe_meta');
function lwn_recipe_register_recipe_meta()
{
  $metafields = [
    [
      'name' => '_lwn_recipe_meta_prep_time',
      'type' => 'integer',
      'sanitize_callback' => 'absint',
    ],
    [
      'name' => '_lwn_recipe_meta_cook_time',
      'type' => 'integer',
      'sanitize_callback' => 'absint',
    ],
    [
      'name' => '_lwn_recipe_meta_overall_time',
      'type' => 'integer',
      'sanitize_callback' => 'absint',
    ],
    [
      'name' => '_lwn_recipe_meta_servings',
      'type' => 'integer',
      'sanitize_callback' => 'absint',
    ],
    [
      'name' => '_lwn_recipe_meta_is_vegan',
      'type' => 'boolean',
      'sanitize_callback' => 'sanitize_boolean',
    ],
    [
      'name' => '_lwn_recipe_meta_meal',
      'type' => 'string',
      'sanitize_callback' => 'sanitize_text_field',
    ],
  ];

  foreach ($metafields as $metafield) {
    // register post meta for lwn_recipe field
    register_post_meta('lwn_recipe', $metafield['name'], [
      'show_in_rest' => true,
      'type' => $metafield['type'],
      'single' => true,
      'sanitize_callback' => $metafield['sanitize_callback'],
      'auth_callback' => function () {
        return current_user_can('edit_posts');
      },
    ]);
  }
}
