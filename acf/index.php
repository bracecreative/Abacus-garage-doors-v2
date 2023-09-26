<?php

add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
    register_block_type( __DIR__ . './blocks/column-content-block.json' );
}