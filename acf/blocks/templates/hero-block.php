<?php
$hero_bg = get_field('hero_background');
if( !empty( $hero_bg ) ):
    $hero_bg_classes = 'bg-cover bg-no-repeat';
    $hero_bg_style = 'style="background-image: url('.$hero_bg.')"';
else:
    $hero_bg_classes = 'bg-[#444]';
    $hero_bg_style = '';
endif;

$hero_overlay = get_field('include_overlay');
$hero_heading = get_field('hero_heading');

echo '<section class="hero-block relative'.$hero_bg_classes.'" '.$hero_bg_style.'>';
echo $hero_overlay;
    if( $hero_overlay == '1' ):
        echo '<div class="overlay absolute bg-black/5 h-full w-full"></div>';
    endif;

    echo '<div class="container max-w-[1000px] mx-auto pb-16 md:pt-[400px] px-10 xl:px-0">';
        if( !empty( $hero_heading ) ):
            echo '<h1 class="font-medium text-center text-white text-xl uppercase lg:text-4xl">'.$hero_heading.'</h1>';
        endif;
    echo '</div>';
echo '</section>';