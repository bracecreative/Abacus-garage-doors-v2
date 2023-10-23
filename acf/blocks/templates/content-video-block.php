<?php

 /**
 * Content Video Block Template.
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
    $video_URL = get_field('video');
    $button_link = get_field('button_link');
    if( $button_link ) {
        $button_text = $button_link['title'];
        $button_url = $button_link['url'];
        $button_target =  $button_link['target'] ? $button_link['target'] : '_self';
    }
    
    //  Display Options
    $display_button_link = get_field('display_button_link');

?>

<section class="content-video px-4 py-8 bg-white">
    <div class="container p-0 mx-auto flex flex-col lg:flex-row gap-4">
        <div class="lg:w-[40%] bg-orange h-full flex flex-col gap-4 items-center justify-between">
            <div class="flex flex-col w-full">
                <?php if( !empty( get_field('title') ) ): ?>
                <h3 class="mb-6 text-2xl font-semibold text-center uppercase text-white">
                    <?php echo get_field('title'); ?>
                </h3>
                <?php endif; ?>
                <div class="text-base text-center lg:text-left text-[1.110rem] text-white">
                    <?php echo get_field('textarea');  ?>
                </div>
            </div>
            <?php if( $button_link ) { ?>
            <div class="<?php echo $display_button_link ? "flex w-full mt-2 p-4" : "hidden"; ?>">
                <a class="px-8 py-3 w-full text-center text-lg font-semibold text-white uppercase transition-all duration-200 ease-in-out bg-dblue hover:bg-buttonblue"
                    href="<?php echo $button_url; ?>" target="<?php echo $button_target; ?>">
                    <?php echo $button_text; ?>
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="video-wrapper w-full lg:w-[60%] min-h-[600px] overflow-hidden">
            <?php
                if (isset($video_URL)) {
                    $video_URL = htmlspecialchars($video_URL); // Sanitize the URL for security

                    if (strpos($video_URL, 'youtu') !== false) {
                        // Embed a YouTube video
                        echo '<iframe width="100%" height="100%" src="' . $video_URL . '" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                    } elseif (strpos($video_URL, 'vimeo') !== false) {
                        // Embed a Vimeo video
                        echo '<iframe width="100%" height="100%" src="' . $video_URL . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
                    } else {
                        echo 'Unsupported video source';
                    }
                } else {
                    echo 'No video URL provided';
                }
            ?>
        </div>
    </div>
</section>