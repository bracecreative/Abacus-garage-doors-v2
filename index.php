<?php get_header();

$hero_bg = get_field('hero_background', 'option');
if( !empty( $hero_bg ) ):
    $hero_bg_classes = 'bg-cover bg-no-repeat';
    $hero_bg_style = 'style="background-image: url('.$hero_bg.')"';
else:
    $hero_bg_classes = 'bg-[#444]';
    $hero_bg_style = '';
endif;

$hero_overlay = get_field('include_overlay', 'option');
$hero_heading = get_field('hero_heading', 'option');

echo '<section class="relative hero-block '.$hero_bg_classes.'" '.$hero_bg_style.'>';
    if( $hero_overlay == '1' ):
        echo '<div class="absolute w-full h-full overlay bg-black/5"></div>';
    endif;

    echo '<div class="container max-w-[1000px] mx-auto pb-16 md:pt-[400px] px-10 xl:px-0">';
        if( !empty( $hero_heading ) ):
            echo '<h1 class="text-xl font-medium text-center text-white uppercase lg:text-4xl">'.$hero_heading.'</h1>';
        endif;
    echo '</div>';
echo '</section>';

$cb_bg = get_field('cb_background', 'option');
if( !empty( $cb_bg ) ):
    $background = 'style="background-color: '.$cb_bg.';"';
else:
    $background = 'style="background-color: #83969f;";';
endif;

echo '<section class="py-8 contact-bar" '.$background.'>';
    echo '<div class="container flex flex-row flex-wrap gap-y-6 items-center justify-center max-w-[1280px] mx-auto px-10 xl:px-0">';

        $items = get_field('contact_bar', 'option');
        if( $items ):
            $item_count = count($items);
            $item_width = 100 / $item_count;
            $item_width = ceil($item_width);
        endif;

        if( have_rows('contact_bar', 'option') ):
            while( have_rows('contact_bar', 'option') ): the_row();

                $icon = get_sub_field('icon');
                $text = get_sub_field('text');
                $link = get_sub_field('link');
                if( $link ):
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                endif;


                if( $text ):
                    echo '<div class="flex flex-row flex-wrap item basis-2/4 md:basis-1/3 basis-'.$item_width.'">';
                        
                        if( $link_url ):
                            echo '<a class="flex flex-row flex-wrap items-center w-full" href="'.$link_url.'" target="'.$link_target.'">';
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
?>

<section class="py-20 posts-wrapper">
    <div class="container flex flex-col px-8 mx-auto gap-y-8 md:flex-row md:flex-wrap md:items-start md:justify-start 2xl:px-0">
        <?php
        if( have_posts() ):
            while( have_posts() ): the_post();
                echo '<article class="px-4 post bais-full md:basis-2/4 lg:basis-1/3">';
                    echo '<div class="inner border border-solid border-[#e6e6e6] shadow-sm">';
                        if( has_post_thumbnail() ):
                            echo '<figure>';
                                echo '<a href="'.get_the_permalink().'">';
                                    the_post_thumbnail('full', array('class' => 'h-[190px] lg:h-[300px]') );
                                echo '</a>';
                            echo '</figure>';
                        endif;

                        echo '<div class="p-4 content">';
                            echo '<h2 class="mb-3 text-lg uppercase"><a class="text-[#666]" href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
                            echo '<div class="excerpt mb-6 text-[#666]">';
                                echo get_the_excerpt();
                            echo '</div>';
                            echo '<a class="inline-block px-10 py-2 text-white uppercase bg-buttonblue" href="'.get_permalink().'">Read More</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</article>';

            endwhile;

            the_posts_pagination(
                array(
                    'next_text' => '&raquo;',
                    'prev_text' => '&laquo;',
                    'show_all' => true,
                )
            );

        else:
            echo '<p>No posts found</p>';
        endif;
        ?>
    </div>
</section>

<?php
$layout = get_field('cta_layout', 'option');
$background = get_field('cta_background', 'option');
$title = get_field('cta_title', 'option');
$button = get_field('cta_button', 'option');
if( $button ):
    $button_url = $button['url'];
    $button_text = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
endif;

if( !empty( $title ) ):
    echo '<section class="py-12 cta-block" style="background-color: '.$background.';">';
        echo '<div class="container flex flex-col gap-y-8 justify-center max-w-[1280px] mx-auto px-10 '.(($layout == 'row') ? "lg:flex-row lg:flex-wrap lg:items-start lg:justify-between":"").' 2xl:px-0">';
            
            if( !empty( $title ) ):
                echo '<h2 class="text-xl font-semibold text-center text-white uppercase lg:text-5xl '.(($layout == 'row') ? "text-left":"").'">'.$title.'</h2>';
            endif;

            if( !empty( $button ) ):
                echo '<a class="block py-4 text-lg font-semibold text-center text-white uppercase transition-all duration-200 ease-in-out bg-buttonblue hover:bg-lblue lg:inline-block lg:px-14" href="'.$button_url.'" target="'.$button_target.'">'.$button_text.'</a>';
            endif;

        echo '</div>';
    echo '</section>';
endif;

get_footer(); ?>