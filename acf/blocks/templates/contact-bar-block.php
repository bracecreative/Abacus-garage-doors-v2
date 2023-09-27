<?php
$cb_bg = get_field('background');
if( !empty( $cb_bg ) ):
    $background = 'style="background-color: '.$cb_bg.';"';
else:
    $background = 'style="background-color: #83969f;";';
endif;

echo '<section class="contact-bar py-2" '.$background.'>';
    echo '<div class="container flex flex-row flex-wrap items-center justify-center mx-auto px-10 xl:px-0">';

        if( have_rows('items') ):
            while( have_rows('items') ): the_row();

                $icon = get_sub_field('icon');
                $text = get_sub_field('text');
                $link = get_sub_field('link');
                if( $link ):
                    $link_url = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                endif;


                if( $text ):
                    echo '<div class="item">';
                        
                        if( $link_url ):
                            echo '<a class="flex flex-row gap-4 items-center justify-center" href="'.$link_url.'" target="'.$link_target.'">';
                        endif;

                        if( $icon ):
                            echo wp_get_attachment_image( $icon, 'full', '', array('class' => 'h-[30px] w-[30px] lg:h-[42px] w-[42px]') );
                        endif;

                        if( $text ):
                            echo '<span class="">'.$text.'</span>';
                        endif;

                        if( $link_url ):
                            echo '</a>';
                        endif;
                    
                    echo '</div>';
                endif;

            endwhile;
        endif;

    echo '</div>';
echo '</section>';