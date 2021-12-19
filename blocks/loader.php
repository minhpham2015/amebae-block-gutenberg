<?php

/**
 * Register Blocks
 */

//1. Create a Category
add_filter('block_categories', function ($categories) {
	$categories = array_merge(
		$categories,
		array(
			array(
				'slug' => 'amebae',
				'title' => 'Amebae',
				'icon'  => null
			),
		)
	);
	return $categories;
});

//2. Load Blocks
add_action('init','ame_load_blocks',999);
function ame_load_blocks(){

  $blocks = [
  	 array(
  		 'slug' => 'test_block',
  		 'name' => 'Test Block',
  		 'icon' => 'button',
  		 'preview' => AMB_URI.'assets/images/shortcode-button.png',
       'description' => 'A custom test block.',
       'keywords' => array('amebae', 'test', 'test block'),
  	 ),
  ];

  ame_register_blocks($blocks);
}


function ame_register_blocks($blocks = [])
{
	// skip processing if the ACF plugin is not active.
	if (!function_exists('acf_register_block_type')) {
		return;
	}

	foreach ($blocks as $block) {
		// Load our block config file
		$filePath = AMB_DIR . "/blocks/options/{$block['slug']}.php";

		$config = array();
		if (file_exists($filePath)) {

			$slug_block = acf_slugify($block['slug']);
			$name_block = $block['name'];

			$block_type = [
				'name' => $slug_block,
				'title' => $name_block,
				'icon' => $block['icon'],
				'category' => 'amebae',
				'description' => $block['description'],
        'keywords' => $block['keywords'],
				'supports' => array(
					'align' => true,
					'mode' => true,
					'multiple' => true
				),
				//'mode' => 'edit',
				'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'image' => '<img src="' . $block['preview'] . '" style="display: block; margin: 0 auto;">',
                    'text' => 'Helo!!'
                ),
            ),
        ),
				'render_template' => AMB_DIR . "/blocks/views/{$block['slug']}.php",
			];

			if (file_exists(AMB_DIR . "/assets/js/{$block['slug']}.js")) {
				$block_type['enqueue_script'] = AMB_URI . "assets/js/{$block['slug']}.js";
			}

			if (file_exists(AMB_DIR . "/assets/css/{$block['slug']}.css")) {
			   $block_type['enqueue_style'] = AMB_URI . "assets/css/{$block['slug']}.css";
			}

			// Add block
			acf_register_block_type($block_type);


			//add config for block
			$config = include_once $filePath;
			$config['key'] = $slug_block . '_group';
			$config['title'] = $name_block . ' Group';
			$config['location'] = array(
					[
						[
							'param' => 'block',
							'operator' => '==',
							'value' => "acf/{$slug_block}",
						]
					]
			);

			// Add fields
			acf_add_local_field_group($config);
		}
	}
}
