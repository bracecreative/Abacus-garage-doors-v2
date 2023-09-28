<?php

 /**
 * Image Row Links Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */
?>

<section class="px-4 py-8 bg-lightGrey-two">
    <div class="container p-0 mx-auto">
        <div class="grid items-center justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php 
                if( have_rows('image_grid') ):
                    while( have_rows('image_grid') ) : the_row();
                        $text = get_sub_field('text');
                        $link = get_sub_field('link');
                        $image = get_sub_field('image')['url'];
                        $imageAlt = get_sub_field('image')['alt'];

            ?>
            <div class="flex items-center justify-center gap-4">
                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                <?php if( $image ) { ?>
                <img class="w-full h-[200px] object-contain object-center" src="<?php echo $image?>" alt="<?php echo $imageAlt?> Image">
                <?php } ?>
                <h3 class="text-xl font-semibold text-center uppercase text-buttonblue">
                    <?php echo $text?>
                </h3>
                </a>
            </div>
            <?php endwhile;  endif; ?>
        </div>
    </div>
</section>