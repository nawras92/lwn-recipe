<?php

/* Register Block Styles */
add_action('init', 'lwn_recipe_register_block_styles_callback');
function lwn_recipe_register_block_styles_callback()
{
  /* Unordered list with checkmark */
  register_block_style('core/list', [
    'name' => 'lwn-recipe-list-checkmark',
    'label' => __('With Check Mark', 'lwn-recipe"'),
    'inline_style' => '.is-style-lwn-recipe-list-checkmark{
       list-style-type: "\2713";
       display: flex;
       flex-direction: column;
       gap: 16px;
   
		}
    .is-style-lwn-recipe-list-checkmark li{
     padding-inline-start: 8px;
     padding-bottom: 8px;
     border-bottom: 1px dotted #22261E45;
		}
    .is-style-lwn-recipe-list-checkmark li:last-child{
     border-bottom: none;
		}
    .is-style-lwn-recipe-list-checkmark li::marker{
        color: #3e7a47;
		}
',
  ]);

  /* Ordered List */
  register_block_style('core/list', [
    'name' => 'lwn-recipe-ordered-list',
    'label' => __('Recipe Style', 'lwn-recipe"'),
    'inline_style' => '.is-style-lwn-recipe-ordered-list{
       display: flex;
       flex-direction: column;
       gap: 16px;
		}
    .is-style-lwn-recipe-ordered-list li{
     padding-inline-start: 8px;
     padding-bottom: 8px;
     border-bottom: 1px dotted #22261E45;
		}
    .is-style-lwn-recipe-ordered-list li:last-child{
     border-bottom: none;
		}
    .is-style-lwn-recipe-list-checkmark li::marker{
        color: #3e7a47;
		}
',
  ]);
}
