<?php
/**
 * Plugin Name:       LWN Recipe
 * Plugin URI:        https://learnwithnaw.com/learning-path/3
 * Description:       Manage your recipes easily
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nawras Ali
 * Author URI:        https://learnwithnaw.com
 * Text Domain:       lwn-recipe
 * Domain Path:       /languages/
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Define Plugin PATH
define('LWN_RECIPE_PLUGIN_PATH', plugin_dir_path(__FILE__));
// Define Plugin URL
define('LWN_RECIPE_PLUGIN_URL', plugin_dir_url(__FILE__));

// Help Tabs Constants
define(
  'LWN_RECIPE_YOUTUBE_LINK',
  'https://www.youtube.com/playlist?list=PLt0HRIA9i35sTfR5hwaHkHdnAtK441aU2'
);
define(
  'LWN_RECIPE_GIT_CODE',
  'https://github.com/nawras92/wordpress-plugin-development'
);
define('LWN_RECIPE_WORDPRESS_LP', 'https://learnwithnaw.com/learning-path/3');
define('LWN_RECIPE_HELP_EMAIL', 'help@learnwithnaw.net');

// Load translations
add_action('init', 'lwn_recipe_load_translations');
function lwn_recipe_load_translations()
{
  load_plugin_textdomain(
    'lwn-recipe',
    false,
    dirname(plugin_basename(__FILE__)) . '/languages'
  );
}

// Include Files
require_once LWN_RECIPE_PLUGIN_PATH . 'admin/admin-config.php';
require_once LWN_RECIPE_PLUGIN_PATH . 'admin/admin-ui.php';
require_once LWN_RECIPE_PLUGIN_PATH . 'includes/register-lwn-styles.php';
require_once LWN_RECIPE_PLUGIN_PATH . 'includes/register-recipe-type.php';
require_once LWN_RECIPE_PLUGIN_PATH . 'includes/register-recipe-taxonomy.php';
require_once LWN_RECIPE_PLUGIN_PATH . 'includes/blocks.php';
require_once LWN_RECIPE_PLUGIN_PATH . 'includes/register-lwn-patterns.php';

// Load Translation of blocks after registering the blocks
add_action('init', 'lwn_recipe_load_block_translations');
function lwn_recipe_load_block_translations()
{
  $meta_script_handle = generate_block_asset_handle(
    'lwn-recipe/lwn-recipe-meta',
    'editorScript'
  );
  wp_set_script_translations(
    $meta_script_handle,
    'lwn-recipe',
    plugin_dir_path(__FILE__) . 'languages'
  );
  $notes_script_handle = generate_block_asset_handle(
    'lwn-recipe/lwn-recipe-notes',
    'editorScript'
  );
  wp_set_script_translations(
    $notes_script_handle,
    'lwn-recipe',
    plugin_dir_path(__FILE__) . 'languages'
  );
}
