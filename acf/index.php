<?php

add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
    register_block_type( dirname(__FILE__) . './blocks/column-content-block.json' );
    register_block_type( dirname(__FILE__) . './blocks/title-content-image-block.json' );
    register_block_type( dirname(__FILE__) . './blocks/slider-block.json');
    register_block_type( dirname(__FILE__) . './blocks/hero-block.json');
}