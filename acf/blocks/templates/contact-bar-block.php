<?php
$cb_bg = get_field('background');
if( !empty( $cb_bg ) ):
    $background = 'style="background-color: '.$cb_bg.';"';
else:
    $background = 'style="background-color: #83969f;";';
endif;

echo '<section class="py-8 contact-bar" '.$background.'>';
    echo '<div class="container flex flex-row flex-wrap gap-y-6 items-center justify-center max-w-[1280px] mx-auto px-10 xl:px-0">';

        $items = get_field('items');
        if( $items ):
            $item_count = count($items);
            $item_width = 100 / $item_count;
            $item_width = ceil($item_width);
        endif;

        if( have_rows('items') ):
            while( have_rows('items') ): the_row();

                $icon = get_sub_field('icon');
                $text = get_sub_field('text');
                $link = get_sub_field('link');
                if( $link ):
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                endif;


                if( $text ):
                    echo '<div class="flex flex-row item basis-2/4 md:basis-1/5 basis-'.$item_width.'">';
                        
                        if( $link_url ):
                            echo '<a class="flex flex-col flex-wrap items-center justify-center w-full gap-4 lg:flex-row" href="'.$link_url.'" target="'.$link_target.'">';
                        endif;

                        if( $icon ):
                            echo wp_get_attachment_image( $icon, 'full', '', array('class' => 'basis-[30px] h-[30px] mr-3.5 w-[30px] lg:h-[42px] w-[42px]') );
                        endif;

                        if( $text ):
                            echo '<span class="basis-auto text-center inline-block max-w-[125px] text-base text-white md:max-w-auto">'.$text.'</span>';
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