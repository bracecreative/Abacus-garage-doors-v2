<?php
$title = get_field('title');
$images = get_field('images');

if( $images ):

    $images_count = count($images);
    $image_width = 100 / $images_count;
    $image_width = ceil($image_width);

    echo '<section class="image-row pt-8 lg:pt-14">';
        if( $title ):
            echo '<div class="title">';
                echo '<div class="container mx-auto px-10 2xl:px-0">';
                    echo '<h2 class="mb-6 text-lg text-orange uppercase lg:mb-12 lg:text-3xl">'.$title.'</h2>';
                echo '</div>';
            echo '</div>';
        endif;

        if( have_rows('images') ):
            echo '<div class="images flex flex-col md:flex-row md:flex-wrap">';
                while( have_rows('images') ): the_row();
                    
                    $image = get_sub_field('image');
                    $hover_content = get_sub_field('hover_content');
                    $link = get_sub_field('link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    endif;

                    if( $image ):
                        echo '<div class="item md:basis-2/4 md:relative basis-'.$image_width.'">';

                            if( !empty($link_url) ):
                                echo '<a class="block h-full w-full" href="'.$link_url.'">';
                            endif;

                            echo wp_get_attachment_image($image, 'full', '', array('class' => 'h-full') );

                            if( $hover_content ):
                                $icon = $hover_content['icon'];
                                $title = $hover_content['title'];
                                $text = $hover_content['text'];

                                echo '<div class="content bg-midblue p-6 text-center md:absolute md:flex md:flex-col md:justify-center md:h-full md:w-full md:bg-midblue/90 md:left-0 md:top-0 xl:hidden">';
                                    if( $icon ):
                                        echo '<div class="icon text-center">';
                                            echo wp_get_attachment_image($icon, 'full', '', array('class' => 'h-[30px] mb-4 mx-auto w-[30px]'));
                                        echo '</div>';
                                    endif;

                                    if( $title ):
                                        echo '<h4 class="font-bold mb-3.5 text-lg text-white uppercase lg:text-2xl">'.$title.'</h4>';
                                    endif;

                                    if( $text ):
                                        echo '<div class="text text-white">'.$text.'</div>';
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