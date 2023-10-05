<?php
$background = get_field('background');
$left_content = get_field('left_content');
$left_title = $left_content['title'];
$left_text = $left_content['content'];
$left_areas = $left_content['areas'];
$left_button = $left_content['button'];

$right_content = get_field('right_content');
$map_code = $right_content['map_code'];

$reviews = get_field('reviews_code');

if( !empty( $left_content ) || !empty( $right_content ) ):
    echo '<section class="py-8 areas" style="background-color:'.$background.';">';
        echo '<div class="container flex flex-col px-10 mx-auto gap-y-8 lg:flex-row lg:flex-wrap lg:items-start 2xl:px-0">';

            if( !empty( $left_content ) ):
                echo '<div class="left-content basis-full '.((!empty($right_content)) ? "lg:basis-2/4 lg:pr-8":"").'">';
                    if( $left_title ):
                        echo '<h2 class="px-0 mb-6 text-3xl font-semibold text-center text-white uppercase lg:text-left">'.$left_title.'</h2>';
                    endif;

                    if( $left_text ):
                        echo '<div class="mb-4 text-white content">'.$left_text.'</div>';
                    endif;

                    if( have_rows('left_content') ): while( have_rows('left_content') ): the_row();
                        if( have_rows('areas') ):
                            echo '<ul class="mt-6 mb-8 areas-list">';
                                while( have_rows('areas') ): the_row();
                                
                                    $area = get_sub_field('area');

                                    echo '<li class="flex flex-row items-center gap-4 mb-2 text-white uppercase"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" fill="#FFF" /></svg>'.$area.'</li>';
                                endwhile;
                            echo '</ul>';
                        endif;
                    endwhile; endif;

                    if( $left_button ):
                        $button_url = $left_button['url'];
                        $button_text = $left_button['title'];
                        $button_target = $left_button['target'] ? $left_button['target'] : '_self';
                        echo '<div class="flex mt-6">';
                        if( !empty( $button_url ) && !empty( $button_text ) ): 
                            echo '<a class="px-8 py-5 text-lg font-semibold text-white uppercase transition-all duration-200 ease-in-out bg-orange hover:bg-lblue" href="'.$button_url.'" target="'.$button_target.'">'.$button_text.'</a>';
                        endif;
                        echo '</div>';
                    endif;
                echo '</div>';
            endif;

            if( !empty( $right_content ) ):
                echo '<div class="right-content basis-full '.((!empty($left_content)) ? "lg:basis-2/4 lg:pl-8":"").'">';
                    if( !empty( $map_code ) ):
                        echo $map_code;
                    endif;
                echo '</div>';
            endif;

            if( !empty( $reviews ) ):
                echo '<div class="w-full reviews">';
                    echo $reviews;
                echo '</div>';
            endif;

        echo '</div>';
    echo '</section>';
endif;