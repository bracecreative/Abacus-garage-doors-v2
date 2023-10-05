<?php

$accordion_items = get_field('items');
if( $accordion_items ):

    echo '<section class="accordion bg-[#f8f8f8]">';
        echo '<div class="container px-10 py-8 mx-auto 2xl:px-0">';
            
            if( have_rows('items') ):
                echo '<div class="items">';
                    while( have_rows('items') ): the_row();

                        $title = get_sub_field('title');
                        $content = get_sub_field('content');

                        if( !empty( $title ) && !empty( $content ) ):
                            echo '<div class="item">';
                                echo '<div class="header bg-[#f8f8f8] font-medium pl-12 pr-5 py-3.5 text-2xl text-[#666] uppercase">';
                                    echo $title;
                                echo '</div>';
                                echo '<div class="content bg-[#f8f8f8] hidden px-5 py-3.5 text-base text-buttonblue">';
                                    echo $content;
                                echo '</div>';
                            echo '</div>';
                        endif;

                    endwhile;
                echo '</div>';
            endif;

        echo '</div>';
    echo '</section>';
endif;