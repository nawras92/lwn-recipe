<?php

add_action('admin_menu', 'lwn_recipe_add_admin_menus');
function lwn_recipe_add_admin_menus()
{
  $options_page = add_options_page(
    esc_html__('LWN Recipe Plugin', 'lwn-recipe'),
    esc_html__('LWN Recipes', 'lwn-recipe'),
    'manage_options',
    'lwn-recipe-plugin',
    'lwn_recipe_config_page'
  );
}
function lwn_recipe_config_page()
{
  ?>
  <div class="lwn-recipe-admin-container">
    <!-- Plugin Heading -->
    <div class="lwn-recipe-admin-header">
      <h1 class="lwn-recipe-admin-heading">
        <?php esc_html_e('Lwn Recipe Plugin', 'lwn-recipe'); ?>
      </h1>
      <p class="lwn-recipe-admin-text">
        <?php esc_html_e('Manage your recipes smoothly!', 'lwn-recipe'); ?>
      </p>
    </div>
    <hr>
    <hr>
    <!-- How use Section -->
    <section class="lwn-recipe-admin-section">
      <h3 class="lwn-recipe-admin-heading">
        <?php esc_html_e('How to use?', 'lwn-recipe'); ?>
      </h3>
      <p class="lwn-recipe-admin-text">
        <?php esc_html_e(
          'Go to the bottom of admin sidebar, choose "Lwn Recipe", and enjoy adding your recipes!',
          'lwn-recipe'
        ); ?>
      </p>
    </section>
    <hr>
    <!-- All Recipes Link -->
    <section class="lwn-recipe-admin-section">
      <h3 class="lwn-recipe-admin-heading">
        <?php esc_html_e(
          'How to check all recipes in the frontend?',
          'lwn-recipe'
        ); ?>
      </h3>
      <p class="lwn-recipe-admin-text">
        <?php esc_html_e('Go to:', 'lwn-recipe'); ?>
        <a class="lwn-recipe-admin-link" href="<?php echo esc_url(
          get_post_type_archive_link('lwn_recipe')
        ); ?>" target="_blank"
               rel="noreferrer noopener"
               >

               <?php esc_html_e('All Recipes URL', 'lwn-recipe'); ?>

        </a>

      </p>
    </section>
    <hr>
    <!-- Customized Blocks  -->
    <section class="lwn-recipe-admin-section">
      <h3 class="lwn-recipe-admin-heading">
        <?php esc_html_e('Recipe Blocks', 'lwn-recipe'); ?>
      </h3>
      <p class="lwn-recipe-admin-text">
        <?php esc_html_e(
          'You can add customized Gutenberg Recipe Meta Block to the Recipe Post Page!',
          'lwn-recipe'
        ); ?>
      </p>
      <p class="lwn-recipe-admin-text">
        <?php esc_html_e(
          'You can add customized Gutenberg Recipe Note Block to the Recipe Post Page!',
          'lwn-recipe'
        ); ?>
      </p>
    </section>
    <hr>
    <!-- Customized Patterns  -->
    <section class="lwn-recipe-admin-section">
      <h3 class="lwn-recipe-admin-heading">
        <?php esc_html_e('Recipe Patterns', 'lwn-recipe'); ?>
      </h3>
      <p class="lwn-recipe-admin-text">
        <?php esc_html_e(
          'You can customized Recipe Patterns; The Recipe steps, The Recipe Ingredients, and The Recipe Short Description ',
          'lwn-recipe'
        ); ?>
      </p>
    </section>
    <hr>
    <!-- Useful Links  -->
    <section class="lwn-recipe-admin-section">
      <h3 class="lwn-recipe-admin-heading">
        <?php esc_html_e('Useful Links', 'lwn-recipe'); ?>
      </h3>
      <p class="lwn-recipe-admin-text">
        <?php esc_html_e(
          'If interested, you can learn more about plugin development, and how to make similar plugins here.',
          'lwn-recipe'
        ); ?>
      </p>
        <a class="lwn-recipe-admin-link" href="<?php echo esc_url(
          LWN_RECIPE_YOUTUBE_LINK
        ); ?>"
                                       target="_blank"
                                       rel="noreferrer noopener"
                                       >
                                       <?php esc_html_e(
                                         'Check Youtube Videos',
                                         'lwn-recipe'
                                       ); ?>
      </a>
        <a class="lwn-recipe-admin-link" href="<?php echo esc_url(
          LWN_RECIPE_GIT_CODE
        ); ?>"
                                       target="_blank"
                                       rel="noreferrer noopener"
                                       >
                                       <?php esc_html_e(
                                         'Code Repo.',
                                         'lwn-recipe'
                                       ); ?>
      </a>
    </section>
    <hr>
  </div>

<?php
}
