<?php

add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/accordion-block.json');
    register_block_type( __DIR__ . '/blocks/areas-block.json');
    register_block_type( __DIR__ . '/blocks/column-content-block.json');
    register_block_type( __DIR__ . '/blocks/contact-bar-block.json');
    register_block_type( __DIR__ . '/blocks/contact-block.json');
    register_block_type( __DIR__ . '/blocks/cta-block.json');
    register_block_type( __DIR__ . '/blocks/gallery-block.json');
    register_block_type( __DIR__ . '/blocks/hero-block.json');
    register_block_type( __DIR__ . '/blocks/image-row-block.json');
    register_block_type( __DIR__ . '/blocks/image-row-links-block.json');
    register_block_type( __DIR__ . '/blocks/process-icons-block.json');
    register_block_type( __DIR__ . '/blocks/slider-block.json');
    register_block_type( __DIR__ . '/blocks/title-content-image-block.json');
    register_block_type( __DIR__ . '/blocks/title-content-map-block.json');
    register_block_type( __DIR__ . '/blocks/title-textarea-block.json');
}

add_filter( 'block_categories', 'register_brace_block_category', 10, 2 );
function register_brace_block_category( $categories ) {
    $custom_block = array(
        'slug'  => 'brace-blocks',
        'title' => 'Brace Blocks',
    );

    $categories_sorted = array();
    $categories_sorted[0] = $custom_block;

    foreach ($categories as $category) {
        $categories_sorted[] = $category;
    }

    return $categories_sorted;
}