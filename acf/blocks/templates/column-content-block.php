<?php

 /**
 * Column Content Block Template.
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
 $grid_content = get_field('grid_content');

 //  Display Options
 $display_title = get_field('display_title');
 $display_card_background_color = get_field('display_card_background_color');

?>

<section class="h-screen px-4 py-8 bg-center bg-no-repeat bg-cover bg-primary"
    style="background-image: url(<?php echo get_field('display_background_image') ? get_template_directory_uri() . "/resources/svg/svg-main-bg.svg" : " "; ?>">
    <div class="container p-0 mx-auto">
        <h3 class="text-center text-primary mb-20 leading-10 text-[35px] xl:text-[48px] px-4">
            <?php echo get_field('title'); ?>
        </h3>

        <div class="grid grid-cols-1 gap-4 grid_content lg:grid-cols-3">
            <?php foreach ($grid_content as $card) :

                $button_link = get_field('button_link');
                if( $button_link ) {
                    $button_text = $button['title'];
                    $button_url = $button['url'];
                    $button_target =  $button['target'] ? $button['target'] : '_self';
                }
                $display_button_link = get_field('display_button_link');

            ?>

            <div class="flex flex-col items-center justify-between px-4 <?php echo get_field('title'); ?>">
                <div class="flex flex-col gap-2">
                    <h3 class="text-[24px] text-primary text-center md:text-left">
                        <?php echo get_field('title'); ?>
                    </h3>
                    <p class="text-[24px] text-primary text-center md:text-left">
                        <?php echo get_field('textarea'); ?>
                    </p>
                </div>
                <?php if( $button_link ) { ?>
                <div class="<?php echo $display_button_link ? "block button" : "hidden"; ?>">
                    <a class="px-4 py-2 text-white transition-all duration-200 ease-in-out bg-primary hover:bg-secondary"
                        href="<?php echo $button_url; ?>" target="<?php echo $button_target; ?>">
                        <?php echo $button_text; ?>
                    </a>
                </div>
                <?php } ?>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>