<?php

add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/slider-block.json');
    register_block_type( __DIR__ . '/blocks/hero-block.json');
    register_block_type( __DIR__ . '/blocks/contact-bar-block.json');
    register_block_type( __DIR__ . '/blocks/image-row-block.json');
    register_block_type( __DIR__ . '/blocks/column-content-block.json');
    register_block_type( __DIR__ . '/blocks/title-content-image-block.json');
    register_block_type( __DIR__ . '/blocks/cta-block.json');
    register_block_type( __DIR__ . '/blocks/process-icons-block.json');
    register_block_type( __DIR__ . '/blocks/image-row-links-block.json');
}