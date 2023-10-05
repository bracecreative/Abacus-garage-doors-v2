<?php
$title = get_field('title');
$images = get_field('images');

if( $images ):

    $images_count = count($images);
    $image_width = 100 / $images_count;
    $image_width = ceil($image_width);

    echo '<section class="pt-8 image-row lg:pt-14">';
        if( $title ):
            echo '<div class="title">';
                echo '<div class="container px-10 mx-auto 2xl:px-0">';
                    echo '<h2 class="w-full px-0 mb-6 text-3xl font-semibold text-center uppercase lg:text-left text-orange lg:mb-12">'.$title.'</h2>';
                echo '</div>';
            echo '</div>';
        endif;

        if( have_rows('images') ):
            echo '<div class="flex flex-col images lg:flex-row">';
                while( have_rows('images') ): the_row();
                    
                    $image = get_sub_field('image');
                    $hover_content = get_sub_field('hover_content');
                    $link = get_sub_field('link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    endif;

                    if( $image ):
                        echo '<div class="item lg:basis-2/4 lg:relative basis-'.$image_width.'">';

                            if( !empty($link_url) ):
                                echo '<a class="flex flex-col w-full h-full" href="'.$link_url.'">';
                            endif;

                            echo wp_get_attachment_image($image, 'full', '', array('class' => 'h-full  max-h-[350px] object-cover object-center min-h-[350px]') );

                            if( $hover_content ):
                                $icon = $hover_content['icon'];
                                $title = $hover_content['title'];
                                $text = $hover_content['text'];

                                echo '<div class="p-6 my-auto text-center content bg-midblue lg:absolute lg:h-full lg:w-full lg:bg-midblue/90 lg:left-0 lg:top-0 xl:hidden">';
                                    if( $icon ):
                                            echo '<div class="text-center icon">';
                                                echo wp_get_attachment_image($icon, 'full', '', array('class' => 'h-[40px] object-contain object-center mb-4 mx-auto w-[40px]'));
                                            echo '</div>';
                                    endif;

                                    if( $title ):
                                            echo '<h4 class="font-semibold mb-3.5 text-lg text-white uppercase lg:text-2xl">'.$title.'</h4>';
                                    endif;

                                    if( $text ):
                                            echo '<div class="text-white text">'.$text.'</div>';
                                    endif;
                                echo '</div>';
                            endif;

                            if( !empty($link_url) ):
                                echo '</a>';
                            endif;
                            
                        echo '</div>';
                    endif;

                endwhile;
            echo '</div>';
        endif;

    echo '</section>';

endif;