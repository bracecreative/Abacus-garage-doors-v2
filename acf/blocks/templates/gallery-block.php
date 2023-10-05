<?php
$background = get_field('background_colour');
$title = get_field('title');
$title_colour = get_field('title_colour');
$images = get_field('images');

if( !empty( $images ) ):
    echo '<section class="py-8 gallery" style="background-color: '.$background.'">';
        echo '<div class="container px-2 mx-auto 2xl:px-0">';

            if( !empty( $title ) ):
                echo '<h3 class="px-0 mb-6 text-3xl font-semibold text-center uppercase" style="color: '.$title_colour.'">'.$title.'</h3>';
            endif;

            echo '<div class="flex flex-row flex-wrap images">';
                foreach( $images as $image ):
                    echo '<div class="w-4/12 p-2 image-wrapper md:w-3/12 lg:w-2/12">';
                        echo '<div class="border-4 border-white border-solid">';
                            echo '<a class="gallery-modal" data-imgid="imgid-'.$image.'" href="#">';
                                echo wp_get_attachment_image($image, array('400', '400'), '', array('class' => 'h-[250px] object-cover object-center mx-auto w-full'));
                            echo '</a>';
                        echo '</div>';
                    echo '</div>';
                endforeach;
            echo '</div>';

        echo '</div>';

        echo '<div class="gallery-modals">';
            foreach( $images as $image ):
                echo '<div class="modal-wrapper bg-black/75 fixed h-full left-0 top-0 w-full z-[999999]" id="imgid-'.$image.'" style="display:none;">';
                    echo '<a class="close-modal absolute h-[24px] inline-block right-[20px] top-[20px] w-[24px]" href="#"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z" fill="#FFF"></path></svg></a>';
                    echo '<div class="absolute w-3/4 gallery-image h-3/4 left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4">';
                        echo wp_get_attachment_image($image, 'full');
                    echo '</div>';
                echo '</div>';
            endforeach;
        echo '</div>';
    echo '</section>';
endif;