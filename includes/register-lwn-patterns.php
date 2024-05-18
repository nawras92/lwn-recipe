<?php

/* Register Short Description  Pattern */
register_block_pattern('lwn-recipe-/lwn-recipe-short-description', [
  'title' => __('LWN Recipe Short Description', 'lwn-recipe'),
  'description' => _x('Display LWN Recipe Short Description', 'lwn-recipe'),
  'content' =>
    '<!-- wp:group {"metadata":{"name":"' .
    __('Short description about the recipe', 'lwn-recipe') .
    '"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":"8px"}},"backgroundColor":"accent-4","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-accent-4-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"color":{"text":"#22261ec7"},"elements":{"link":{"color":{"text":"#22261ec7"}}}}} -->
<p class="has-text-color has-link-color" style="color:#22261ec7">' .
    __('Short Recipe Description....', 'lwn-recipe') .
    '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->',
]);

/* Register Ingredients Pattern */
register_block_pattern('lwn-recipe-/lwn-recipe-ingredients-section', [
  'title' => __('LWN Recipe Ingredients', 'lwn-recipe'),
  'description' => _x('Display LWN Recipe Ingredient List', 'lwn-recipe'),
  'content' =>
    '<!-- wp:group {"metadata":{"name":"' .
    __('Recipe Ingredients', 'lwn-recipe') .
    '"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"#22261ec7"}}},"color":{"text":"#22261ec7"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-color has-link-color has-x-large-font-size" style="color:#22261ec7;font-style:normal;font-weight:500">' .
    __('Recipe Ingredients', 'lwn-recipe') .
    '</h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-lwn-recipe-list-checkmark"} -->
<ul class="is-style-lwn-recipe-list-checkmark"><!-- wp:list-item -->
<li>' .
    __('Sugar', 'lwn-recipe') .
    '<mark style="background-color:rgba(0, 0, 0, 0);color:#3e7a47" class="has-inline-color"> (' .
    __('1 tablespoon', 'lwn-recipe') .
    ')</mark></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>' .
    __('Flour', 'lwn-recipe') .
    '<mark style="background-color:rgba(0, 0, 0, 0);color:#3e7a47" class="has-inline-color"> (' .
    __('2 cups', 'lwn-recipe') .
    ')</mark></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>' .
    __('Hot water', 'lwn-recipe') .
    '<mark style="background-color:rgba(0, 0, 0, 0);color:#3e7a47" class="has-inline-color"> (' .
    __('2 teaspoons', 'lwn-recipe') .
    ')</mark></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>' .
    __('Semolina', 'lwn-recipe') .
    '<mark style="background-color:rgba(0, 0, 0, 0);color:#3e7a47" class="has-inline-color"> (' .
    __('3 cups', 'lwn-recipe') .
    ')</mark></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->',
]);

/* Register Steps Pattern */
register_block_pattern('lwn-recipe-/lwn-recipe-steps-section', [
  'title' => __('LWN Recipe Steps', 'lwn-recipe'),
  'description' => _x('Display LWN Recipe Steps List', 'lwn-recipe'),
  'content' =>
    '<!-- wp:group {"metadata":{"name":"' .
    __('Recipe Steps', 'lwn-recipe') .
    '"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"#22261ec7"}}},"color":{"text":"#22261ec7"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-color has-link-color has-x-large-font-size" style="color:#22261ec7;font-style:normal;font-weight:500">' .
    __('Recipe Steps', 'lwn-recipe') .
    '</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"type":"decimal","className":"is-style-lwn-recipe-ordered-list"} -->
<ol class="is-style-lwn-recipe-ordered-list"><!-- wp:list-item -->
<li>' .
    __('Place water in the container.', 'lwn-recipe') .
    '</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>' .
    __('Add sugar and semolina.', 'lwn-recipe') .
    '</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>' .
    __('Add flour.', 'lwn-recipe') .
    '</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>' .
    __('Mix the ingredients together.', 'lwn-recipe') .
    '</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --></div>
<!-- /wp:group -->',
]);
