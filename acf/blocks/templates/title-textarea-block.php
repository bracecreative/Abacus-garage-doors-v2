<?php

 /**
 * Title Textarea Image Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */
    
    //  Display Options
    $display_background_svg = get_field('display_background_svg');
    $display_background_color = get_field('display_background_color');

    $title_color;
    $textarea_color;
    $background_color;
    switch ($display_background_color) {
    case "White":
        $title_color = "text-buttonblue";
        $textarea_color = "text-buttonblue";
        $background_color = "bg-white";
        break;
    case "Grey":
        $title_color = "text-buttonblue";
        $textarea_color = "text-buttonblue";
        $background_color = "bg-lightGrey";
        break;
    case "Orange":
        $title_color = "text-white";
        $textarea_color = "text-white";
        $background_color = "bg-orange";
        break;
    case "Blue":
        $title_color = "text-white";
        $textarea_color = "text-white";
        $background_color = "bg-buttonblue";
        break;
}
?>

<section 
    class="title_textarea px-4 py-8 <?php echo $display_background_color == "Grey" ? "bg-ternary" : "bg-white"; ?>"
    style="background-image: url(<?php echo $display_background_svg ? get_template_directory_uri() . "/resources/svg/svg-main-bg.svg" : " "; ?>"
    >
    <div class="container p-0 mx-auto">
        <div class="flex flex-col w-full mx-auto lg:max-w-6xl">
            <?php if( get_field('title') ) { ?>
            <h2 class="w-full px-0 mb-6 text-2xl font-semibold text-center uppercase lg:max-w-xl lg:text-left <?php echo $title_color ?>">
                <?php echo get_field('title') ?>
            </h2>
            <?php } ?>
            <?php if( get_field('textarea') ) { ?>
            <div class="text-center sm:text-left <?php echo $textarea_color ?>">
                <?php echo get_field('textarea') ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>