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
    $column_1_video = $column_1['video'];
    $column_1_text = $column_1['text'];
endif;

$column_2 = get_field('column_2');
if( !empty( $column_1 ) ):
    $column_2_type = $column_2['column_type'];
    $column_2_img = $column_2['image'];
    $column_2_video = $column_2['video'];
    $column_2_text = $column_2['text'];
endif;

$column_3 = get_field('column_3');
if( !empty( $column_3 ) ):
    $column_3_type = $column_3['column_type'];
    $column_3_img = $column_3['image'];
    $column_3_video = $column_3['video'];
    $column_3_text = $column_3['text'];
endif;

if( !empty( $column_1 ) ):
    echo '<section class="content-block py-10 '.$background_classes.'" '.$background_style.'>';
        echo '<div class="container flex flex-col gap-y-8 mx-auto px-8 lg:flex-row lg:flex-wrap 2xl:px-0">';

            echo '<div class="col col-1 '.$column_1_classes.'">';
                if( $column_1_type == 'image' && !empty( $column_1_img ) ):
                    echo wp_get_attachment_image($column_1_img, 'full');
                endif;

                if( $column_1_type == 'video' && !empty( $column_1_video ) ):
                    echo '<div class="video-wrapper">';
                        if( str_contains($column_1_video, 'youtu') ):
                            echo '<iframe width="100%" height="315" src="'.$column_1_video.'" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                        elseif( str_contains($column_1_type, 'vimeo') ):
                            echo '<iframe src="'.$column_1_video.'" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
                        endif;
                    echo '</div>';
                endif;

                if( $column_1_type == 'text' && !empty( $column_1_text ) ):
                    echo '<div class="text-wrapper">';
                        echo $column_1_text;
                    echo '</div>';
                endif;
            echo '</div>';

            if( $columns > '1' && !empty( $column_2 ) ):
                echo '<div class="col col-2 '.$column_2_classes.'">';
                    if( $column_2_type == 'image' && !empty( $column_2_img ) ):
                        echo wp_get_attachment_image($column_2_img, 'full');
                    endif;

                    if( $column_2_type == 'video' && !empty( $column_2_video ) ):
                        echo '<div class="video-wrapper max-w-[580px]">';
                            if( str_contains($column_2_video, 'youtu') ):
                                echo '<iframe width="100%" height="315" src="'.$column_2_video.'" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                            elseif( str_contains($column_2_type, 'vimeo') ):
                                echo '<iframe src="'.$column_2_video.'" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
                            endif;
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

                if( $column_3_type == 'video' && !empty( $column_3_video ) ):
                    echo '<div class="video-wrapper">';
                        if( str_contains($column_3_video, 'youtu') ):
                            echo '<iframe width="100%" height="315" src="'.$column_3_video.'" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                        elseif( str_contains($column_3_type, 'vimeo') ):
                            echo '<iframe src="'.$column_3_video.'" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
                        endif;
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