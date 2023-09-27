</main>

<footer class="site-footer bg-buttonblue py-6">
    <div class="container mx-auto px-8 xl:px-0">
        
        <?php
        $footer_images = get_field('footer_images', 'option');
        $images_count = count($footer_images);
        $image_width = 100 / $images_count;
        $image_width = ceil($image_width);
        
        if( !empty( $footer_images ) ):
            echo '<div class="footer-images flex flex-row flex-wrap mb-[30px]">';
                foreach( $footer_images as $image ):
                    echo '<div class="image basis-2/4 flex basis-'.$image_width.'">';
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
            echo '<div class="content-wrap flex flex-col gap-y-4 md:flex-row md:flex-wrap md:items-start md:justify-start">';
                if( !empty( $left_content ) ):
                    echo '<div class="left-content basis-full flex md:basis-7/12">';
                        echo $left_content;
                    echo '</div>';
                endif;

                if( !empty( $right_content ) ):
                    echo '<div class="right-content basis-full md:basis-5/12">';
                        echo $right_content;
                    echo '</div>';
                endif;
            echo '</div>';
        endif;
        ?>
    </div>
</footer>

<a class="scroll-up bottom-20 fixed right-0 bg-orange p-2" href="#">
    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><path fill="#FFF" d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
</a>

<?php wp_footer(); ?>

</body>

</html>