<?php

/**
 * Button
 *
 * This block shows most common ACF block features and provides a simple template for usage.
 */

return [
	'fields' => [
		[
			'key' => 'mlp_text',
			'name' => 'mlp_text',
			'label' => 'Text Button',
			'type' => 'text',
			'default_value' => 'Text Button',
			'wrapper' => array(
				'width' => 50
			)
		],
		[
			'key' => 'mlp_url',
			'name' => 'mlp_url',
			'label' => 'URl',
			'type' => 'text',
			'placeholder' => 'https://example.com',
			'wrapper' => array(
				'width' => 50
			)
		],
		[
			 'key' => 'mlp_width',
			 'name' => 'mlp_width',
			 'label' => 'Width',
			 'type' => 'select',
			 'choices' => array(
				 'compact' => __('Compact','amebae-block-gutenberg'),
				 'full' => __('Full Width','amebae-block-gutenberg')
			 ),
			 'default_value' => 'compact',
			 'wrapper' => array(
	 				'width' => 50
	 			)
	  ],
		[
			 'key' => 'mlp_align',
			 'name' => 'mlp_align',
			 'label' => 'Align',
			 'type' => 'select',
			 'choices' => array(
				 'left' => __('Left','amebae-block-gutenberg'),
				 'right' => __('Right','amebae-block-gutenberg'),
				 'center' => __('Center','amebae-block-gutenberg')
			 ),
			 'default_value' => 'center',
			 'wrapper' => array(
					'width' => 50
				)
	  ]
	],
];
