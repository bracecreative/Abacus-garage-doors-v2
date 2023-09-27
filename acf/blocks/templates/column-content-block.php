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

<section class="px-4 py-8 mt-[250px] bg-center bg-no-repeat bg-cover bg-white"
    style="background-image: url(<?php echo get_field('display_background_image') ? get_template_directory_uri() . "/resources/svg/svg-main-bg.svg" : " "; ?>">
    <div class="container p-0 mx-auto">
        <h3 class="w-full px-0 mb-10 text-2xl font-semibold text-center uppercase lg:max-w-xl lg:text-left text-orange">
            <?php echo get_field('title'); ?>
        </h3>

        <div class="grid grid-cols-1 gap-4 grid_content lg:grid-cols-3">
             <?php if( have_rows('grid_content') ):
                    while( have_rows('grid_content') ) : the_row();
                        if( have_rows('card') ):
                            while( have_rows('card') ) : the_row();

                            $title = get_sub_field('title');
                            $textarea = get_sub_field('textarea');
                            $button_link = get_sub_field('button_link');
                            if( $button_link ) {
                                $button_text = $button_link['title'];
                                $button_url = $button_link['url'];
                                $button_target =  $button_link['target'] ? $button_link['target'] : '_self';
                            }
                            $display_button_link = get_sub_field('display_button_link');

            ?>

           <div class="<?php echo $display_card_background_color === "Blue" ? "bg-dblue" : "bg-white"; ?> flex flex-col items-center justify-between p-8">
                <div class="flex flex-col gap-2">
                    <h3 class="mb-6 text-2xl font-semibold text-center uppercase <?php echo $display_card_background_color === "Blue" ? "text-white" : "text-orange"; ?>">
                        <?php echo get_sub_field('title'); ?>
                    </h3>
                    <div class="text-base text-center lg:text-left  <?php echo $display_card_background_color === "Blue" ? "text-white" : "text-lgrey"; ?>">
                        <?php echo get_sub_field('textarea'); ?>
                    </div>
                </div>
                <?php if( $button_link ) { ?>
                <div class="<?php echo $display_button_link ? "flex mt-6" : "hidden"; ?>">
                    <a class="px-8 py-3 text-lg font-semibold text-white uppercase transition-all duration-200 ease-in-out bg-orange <?php echo $display_card_background_color === "Blue" ? "hover:bg-lgrey" : "hover:bg-dblue "; ?>"
                        href="<?php echo $button_url; ?>" target="<?php echo $button_target; ?>">
                        <?php echo $button_text; ?>
                    </a>
                </div>
                <?php } ?>
            </div>

            <?php endwhile; endif; endwhile; endif; ?>

        </div>
    </div>
</section>