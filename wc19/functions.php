<?php

function wc19_scripts()
{
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'blocks', get_stylesheet_directory_uri() . '/blocks-style.css' );
}
add_action( 'wp_enqueue_scripts', 'wc19_scripts' );


function wc19_after_setup_theme()
{
	add_theme_support( 'wp-block-styles' );
}
add_action('after_setup_theme', 'wc19_after_setup_theme');


function wc19_block_editor_styles()
{
	wp_enqueue_style( 'wc19-blocks', get_theme_file_uri( '/blocks-style.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'wc19_block_editor_styles' );


function wc19_acf_blocks()
{
	if ( function_exists('acf_register_block_type') ) {
		acf_register_block_type( array(
			'name'              => 'wordcamp',
			'title'             => __('Wordcamp'),
			'description'       => __('Demo block for Wordcamp 2019'),
			'render_template'   => 'partials/blocks/wordcamp.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'common', 'content' ),
		) );
	}
}
add_action('acf/init', 'wc19_acf_blocks');