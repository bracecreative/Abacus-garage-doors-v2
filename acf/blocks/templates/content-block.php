<?php
$background_type = get_field('background_type');
$background_img = get_field('background_image');
$background_colour = get_field('background_colour');

if( $background_type == 'colour'):
    $background_classes = '';
    $background_style = 'style="background-color:'.$background_colour.'"';
elseif( $background_type == 'image' ):
    $background_classes = 'bg-cover';
    $background_style = 'style="background-image: url('.$background_img.');"';
endif;

$columns = get_field('columns');
if( $columns == '1' ):
    $column_1_classes = 'lg:w-full';
    $column_2_classes = '';
    $column_3_classes = '';
elseif( $columns == '2' ):
    $column_1_classes = 'lg:px-4 lg:w-4/6';
    $column_2_classes = 'lg:px-4 lg:w-2/6';
    $column_3_classes = '';
elseif( $columns == '3' ):
    $column_1_classes = 'lg:px-4 lg:w-1/3';
    $column_2_classes = 'lg:px-4 lg:w-1/3';
    $column_3_classes = 'lg:px-4 lg:w-1/3';
endif;

$column_1 = get_field('column_1');
if( !empty( $column_1 ) ):
    $column_1_type = $column_1['column_type'];
    $column_1_img = $column_1['image'];
    $column_1_textarea = $column_1['textarea'];
    $column_1_text = $column_1['text'];
    $column_1_button_url = $column_1['button_link']['url'];
    $column_1_button_title = $column_1['button_link']['title'];
    $column_1_button_target = $column_1['button_link']['target'];
endif;

$column_2 = get_field('column_2');
if( !empty( $column_1 ) ):
    $column_2_type = $column_2['column_type'];
    $column_2_img = $column_2['image'];
    $column_2_textarea = $column_2['textarea'];
    $column_2_text = $column_2['text'];
endif;

$column_3 = get_field('column_3');
if( !empty( $column_3 ) ):
    $column_3_type = $column_3['column_type'];
    $column_3_img = $column_3['image'];
    $column_3_textarea = $column_3['textarea'];
    $column_3_text = $column_3['text'];
endif;

if( !empty( $column_1 ) ):
    echo '<section class="content-block py-10 '.$background_classes.'" '.$background_style.'>';
        echo '<div class="container flex flex-col gap-y-8 mx-auto px-8 lg:flex-row lg:flex-wrap 2xl:px-0">';

            echo '<div class="col col-1 '.$column_1_classes.'">';
                if( $column_1_type == 'image' && !empty( $column_1_img ) ):
                    echo wp_get_attachment_image($column_1_img, 'full');
                endif;

                if( $column_1_type == 'textarea' && !empty( $column_1_textarea ) ):
                    echo '<div class="right-text-wrapper">';
                            echo $column_1_textarea;
                        echo '</div>';
                endif;

                if( $column_1_type == 'text' && !empty( $column_1_text ) ):
                    echo '<div class="text-wrapper">';
                        echo $column_1_text;
                    echo '</div>';
                endif;
                 if( $column_1_type == 'text' && !empty( $column_1_text ) ):
                    echo '<div class="button-wrapper">';
                        echo '<div class="flex">';
                            echo '<a  href="'.$column_1_button_url.'" target="'.$column_1_button_target.'" class="px-8 py-3 text-lg font-semibold text-white uppercase transition-all duration-200 ease-in-out bg-orange">';
                                echo $column_1_button_title;
                            echo '</a>';
                        echo '</div>';
                    echo '</div>';
                    
                endif;
            echo '</div>';

            if( $columns > '1' && !empty( $column_2 ) ):
                echo '<div class="col col-2 '.$column_2_classes.'">';
                    if( $column_2_type == 'image' && !empty( $column_2_img ) ):
                        echo wp_get_attachment_image($column_2_img, 'full');
                    endif;

                    if( $column_2_type == 'textarea' && !empty( $column_2_textarea ) ):
                        echo '<div class="right-text-wrapper flex flex-col items-center">';
                            echo $column_2_textarea;
                        echo '</div>';
                    endif;

                    if( $column_2_type == 'text' && !empty( $column_2_text ) ):
                        echo '<div class="text-wrapper">';
                            echo $column_2_text;
                        echo '</div>';
                    endif;
                echo '</div>';
            endif;

            if( $columns > '2' && !empty( $column_3 ) ):
                echo '<div class="col col-3 '.$column_3_classes.'">';
                if( $column_3_type == 'image' && !empty( $column_3_img ) ):
                    echo wp_get_attachment_image($column_3_img, 'full');
                endif;

                if( $column_3_type == 'textarea' && !empty( $column_3_textarea ) ):
                    echo '<div class="right-text-wrapper">';
                        echo $column_3_textarea;
                    echo '</div>';
                endif;

                if( $column_3_type == 'text' && !empty( $column_3_text ) ):
                    echo '<div class="text-wrapper">';
                        echo $column_3_text;
                    echo '</div>';
                endif;
                echo '</div>';
            endif;

        echo '</div>';
    echo '</section>';
endif;