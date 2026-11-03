<?php

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	register_nav_menu( 'primary', 'Menu principal' );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'minimal-fonts', 'https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..700;1,6..96,400..700&family=Hanken+Grotesk:ital,wght@0,400..700;1,400..700&display=swap', array(), null );
	wp_enqueue_style( 'minimal', get_stylesheet_uri(), array( 'minimal-fonts' ), wp_get_theme()->get( 'Version' ) );
} );
