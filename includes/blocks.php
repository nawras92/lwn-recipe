<?php

/* Includes Blocks */

function lwn_recipe_lwn_recipe_meta_block_init()
{
  register_block_type(__DIR__ . '/blocks/lwn-recipe-meta/build');
  register_block_type(__DIR__ . '/blocks/lwn-recipe-notes/build');
}
add_action('init', 'lwn_recipe_lwn_recipe_meta_block_init');
