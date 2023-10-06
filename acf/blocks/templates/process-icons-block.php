<?php

 /**
 * Process Icons Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

    //  Content
    $title = get_field('title');

    //  Display Options
    $display_background_color = get_field('display_background_color');


    $background_color;
    switch ($display_background_color) {
    case "Grey":
        $background_color = "bg-lgrey";
        break;
    case "Orange":
        $background_color = "bg-orange";
        break;
    case "Blue":
        $background_color = "bg-buttonblue";
        break;
}
?>

<section class="px-4 py-12 purchasing_process <?php echo $background_color ?>">
    <div class="container p-0 mx-auto">
        <h3 class="px-0 text-3xl font-semibold text-center text-white uppercase">
            <?php echo get_field('title'); ?>
        </h3>

        <div class="grid  items-center justify-center grid-cols-1 mt-20 lg:grid-cols-4 gap-y-12 lg:gap-y-[4.5rem] lg:gap-x-10 icon_grid">
                <?php 
                    if( have_rows('icon_grid') ):
                        while( have_rows('icon_grid') ) : the_row();
                            $icon = get_sub_field('icon')['url'];
                            $iconAlt = get_sub_field('icon')['alt'];
                            $IconText = get_sub_field('text');
                ?>
                <div class="relative flex items-center justify-center gap-4 item">
                    <img class="w-[50px] h-[50px] object-contain object-center" src="<?php echo $icon?>" alt="<?php echo $iconAlt?> Image">
                    <h3 class="max-w-[200px] text-xl font-semibold text-white"><?php echo $IconText?></h3>
                </div>
                <?php endwhile;  endif; ?>
            </div>
    </div>
</section>