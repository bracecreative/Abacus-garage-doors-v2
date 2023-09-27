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
    echo '<section class="cta-block py-12" style="background-color: '.$background.';">';
        echo '<div class="container flex flex-col gap-y-8 justify-center max-w-[1280px] mx-auto px-10 '.(($layout == 'row') ? "lg:flex-row lg:flex-wrap lg:items-start lg:justify-between":"").' 2xl:px-0">';
            
            if( !empty( $title ) ):
                echo '<h2 class="text-center text-xl text-white uppercase lg:text-5xl '.(($layout == 'row') ? "text-left":"").'">'.$title.'</h2>';
            endif;

            if( !empty( $button ) ):
                echo '<a class="bg-buttonblue block py-4 text-center text-white uppercase lg:inline-block lg:px-14" href="'.$button_url.'" target="'.$button_target.'">'.$button_text.'</a>';
            endif;

        echo '</div>';
    echo '</section>';
endif;