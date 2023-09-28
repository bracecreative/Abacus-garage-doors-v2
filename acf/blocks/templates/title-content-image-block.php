<?php

 /**
 * Title Content Image Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */
    // Content
    $button_link = get_field('button_link');
    if( $button_link ) {
        $button_text = $button_link['title'];
        $button_url = $button_link['url'];
        $button_target =  $button_link['target'] ? $button_link['target'] : '_self';
    }
    
    //  Display Options
    $display_content_option = get_field('display_content_option');
    $display_background_color = get_field('display_background_color');

    $title_color;
    $textarea_color;
    $button_color;
    $button_hover_color;
    $background_color;
    switch ($display_background_color) {
    case "White":
        $title_color = "text-orange";
        $textarea_color = "text-black";
        $button_color = "bg-orange";
        $button_hover_color = "hover:bg-buttonblue";
        $background_color = "bg-white";
        break;
    case "Grey":
        $title_color = "text-orange";
        $textarea_color = "text-black";
        $button_color = "bg-buttonblue";
        $button_hover_color = "hover:bg-orange";
        $background_color = "bg-lightGrey";
        break;
    case "Orange":
        $title_color = "text-white";
        $textarea_color = "text-white";
        $button_color = "bg-buttonblue";
        $button_hover_color = "hover:bg-lblue";
        $background_color = "bg-orange";
        break;
    case "Blue":
        $title_color = "text-white";
        $textarea_color = "text-white";
        $button_color = "bg-orange";
        $button_hover_color = "hover:bg-lblue";
        $background_color = "bg-buttonblue";
        break;
}
?>

<section class="lg:px-4 title_content_image_block <?php echo $background_color ?>">
    <div class="container flex <?php echo $display_content_option == "Right" ? "flex-col-reverse" : "flex-col" ?> gap-4 p-0 mx-auto lg:flex-row">
        <div class="<?php echo $display_content_option == "Right" ? "bg-center bg-no-repeat bg-cover w-full lg:w-1/2 min-h-[500px]" : "hidden" ?>" style="background-image: url(<?php echo get_field('image'); ?>">
        </div>
        <div class="flex flex-col items-center w-full px-4 py-8 <?php echo $display_content_option == "Left" ? "lg:items-end" : "lg:items-start"?> lg:px-8 lg:w-1/2">
            <div class="flex flex-col items-center max-w-lg lg:items-baseline">
                <h3 class="w-full px-0 mb-6 text-2xl font-semibold text-center uppercase lg:text-left <?php echo $title_color ?>">
                    <?php echo get_field('title'); ?>
                </h3>
                <div class="text-base text-center lg:text-left text-[1.110rem] <?php echo $textarea_color ?>">
                    <?php echo get_field('textarea'); ?>
                </div>
                <?php if( $button_link ) { ?>
                    <div class="flex mt-6">
                        <a class="px-8 py-3 text-lg font-semibold text-white uppercase transition-all duration-200 ease-in-out <?php echo $button_color ?> <?php echo $button_hover_color ?>"
                            href="<?php echo $button_url; ?>" target="<?php echo $button_target; ?>">
                            <?php echo $button_text; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="<?php echo $display_content_option == "Left" ? "bg-center bg-no-repeat bg-cover w-full lg:w-1/2 min-h-[500px]" : "hidden" ?>" style="background-image: url(<?php echo get_field('image'); ?>">
        </div>
    </div>
</section>