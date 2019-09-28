<?php

/**
 * Подключаем стили
 */
function wc19_scripts()
{
	// Родительская тема
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	// Стили для блоков
	wp_enqueue_style( 'blocks', get_stylesheet_directory_uri() . '/blocks-style.css' );
}
add_action( 'wp_enqueue_scripts', 'wc19_scripts' );

/**
 * Подключаем стили базовых стилей на фронтенд
 */
function wc19_after_setup_theme()
{
	// Необязательно, если ваша родительская тема уже поддерживает это
	add_theme_support( 'wp-block-styles' );
}
add_action('after_setup_theme', 'wc19_after_setup_theme');

/**
 * Подключаем стили для кастомных блоков в админку
 */
function wc19_block_editor_styles()
{
	wp_enqueue_style( 'wc19-blocks', get_theme_file_uri( '/blocks-style.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'wc19_block_editor_styles' );

/**
 * Регистрируем новый блок
 */
function wc19_acf_blocks()
{
	if ( function_exists('acf_register_block_type') ) {
		acf_register_block_type( array(
			'name'              => 'wordcamp', // уникальный идентификатор блока
			'title'             => __('Wordcamp'),
			'description'       => __('Demo block for Wordcamp 2019'),
			'render_template'   => 'partials/blocks/wordcamp.php', // путь к файлу с шаблоном
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'common', 'content' ),
		) );
	}
}
add_action('acf/init', 'wc19_acf_blocks');