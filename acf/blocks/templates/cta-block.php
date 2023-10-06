<?php
$layout = get_field('layout');
$background = get_field('background');
$title = get_field('title');
$button = get_field('button');
if( $button ):
    $button_url = $button['url'];
    $button_text = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
endif;

if( !empty( $title ) ):
    echo '<section class="py-12 cta-block" style="background-color: '.$background.';">';
        echo '<div class="container flex flex-col gap-y-8 justify-center max-w-[1280px] mx-auto px-10 '.(($layout == 'row') ? "lg:flex-row lg:flex-wrap lg:items-start lg:justify-between":"").' 2xl:px-0">';
            
            if( !empty( $title ) ):
                echo '<h2 class="text-2xl font-semibold text-center text-white uppercase lg:text-5xl '.(($layout == 'row') ? "text-left":"").'">'.$title.'</h2>';
            endif;

            if( !empty( $button ) ):
                echo '<a class="block py-4 mx-auto text-lg font-semibold text-center text-white uppercase transition-all duration-200 ease-in-out px-14 w-fit bg-buttonblue hover:bg-lblue lg:inline-block" href="'.$button_url.'" target="'.$button_target.'">'.$button_text.'</a>';
            endif;

        echo '</div>';
    echo '</section>';
endif;