</main>

<footer class="site-footer bg-buttonblue py-6">
    <div class="container mx-auto px-8 xl:px-0">
        
        <?php
        $footer_images = get_field('footer_images', 'option');
        $images_count = count($footer_images);
        $image_width = 100 / $images_count;
        $image_width = ceil($image_width);
        
        if( !empty( $footer_images ) ):
            echo '<div class="footer-images flex flex-row flex-wrap">';
                foreach( $footer_images as $image ):
                    echo '<div class="image basis-2/4 flex md:basis-'.$image_width.'">';
                        echo wp_get_attachment_image( $image, 'full' );
                    echo '</div>';
                endforeach;
            echo '</div>';
        endif;
        ?>

        <?php
        $left_content = get_field('left_content', 'option');
        $right_content = get_field('right_content', 'option');
        if( !empty( $left_content ) || !empty( $right_content ) ):
            echo '<div class="content-wrap flex flex-col gap-y-4 lg:flex-row lg:flex-wrap lg:items-start lg:justify-start">';
                if( !empty( $left_content ) ):
                    echo '<div class="left-content basis-full flex lg:basis-7/12">';
                        echo $left_content;
                    echo '</div>';
                endif;

                if( !empty( $right_content ) ):
                    echo '<div class="right-content basis-full lg:basis-5/12">';
                        echo $right_content;
                    echo '</div>';
                endif;
            echo '</div>';
        endif;
        ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>