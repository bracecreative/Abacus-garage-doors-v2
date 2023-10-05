</main>

<footer class="py-6 site-footer bg-buttonblue">
    <div class="container px-8 mx-auto xl:px-0">
        
        <?php
        $footer_images = get_field('footer_images', 'option');
        if( !empty( $footer_images ) ):
            $images_count = count($footer_images);
            $image_width = 100 / $images_count;
            $image_width = ceil($image_width);
        endif;

        if( !empty( $footer_images ) ):
            echo '<div class="footer-images flex flex-row flex-wrap mb-[30px]">';
                foreach( $footer_images as $image ):
                    echo '<div class="flex image basis-2/4 basis-'.$image_width.'">';
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
            echo '<div class="flex flex-col content-wrap gap-y-4 md:flex-row md:flex-wrap md:items-start md:justify-start">';
                if( !empty( $left_content ) ):
                    echo '<div class="flex left-content basis-full md:basis-7/12">';
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

<a class="fixed right-0 p-2 scroll-up bottom-20 bg-orange" href="#">
    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><path fill="#FFF" d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
</a>

<?php
$side_buttons = get_field('forms', 'option');
if( !empty( $side_buttons ) ):
    if( have_rows('forms', 'option') ):

        while( have_rows('forms', 'option') ): the_row();
            $form_id = get_sub_field('form_id');
            $form_title = get_sub_field('form_title');

            echo '<div id="footer-form_'.$form_id.'" class="footer-form bg-black/75 fixed h-screen left-0 top-0 w-screen z-[9999]" style="display: none">';
                echo '<div class="absolute bg-white h-5/6 left-2/4 overflow-y-scroll p-10 top-2/4 w-3/4 -translate-x-2/4 -translate-y-2/4">';
                    echo '<h2 class="font-bold mb-8 text-orange text-xl uppercase 2xl:text-2xl">'.$form_title.'</h2>';
                    echo '<a class="close-form absolute h-[24px] inline-block right-[20px] top-[20px] w-[24px]" href="#"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></a>';
                    echo do_shortcode("[booking type='$form_id' nummonths=1 form_type='standard']");
                echo '</div>';
            echo '</div>';
        endwhile;

        echo '<div class="side-buttons flex-col gap-4 hidden h-2/4 items-end justify-center origin-right relative rotate-90 z-[9999] lg:fixed lg:flex lg:right-0 lg:top-2/4">';
            echo '<div class="inner flex gap-x-8 pt-[30px] relative w-full">';
            while( have_rows('forms', 'option') ): the_row();

                $button_bg = get_sub_field('button_background');
                $button_icon = get_sub_field('button_icon');
                $button_text = get_sub_field('button_title');
                $button_form = get_sub_field('form');

                $button_form_id = get_sub_field('form_id');

                if( !empty( $button_text ) && !empty( $button_form_id ) ):
                    echo '<a class="button form-btn inline-flex flex-row flex-wrap gap-4 h-auto items-center justify-center px-3 py-1 " href="#footer-form_'.$button_form_id.'" data-form-id ="'.$button_form_id.'" style="background-color:'.$button_bg.'">';
                        
                        if( !empty( $button_icon ) ):
                            echo wp_get_attachment_image( $button_icon, '', 'full', array('class' => 'h-[14[x] -rotate-90 w-[14px]') );
                        endif;

                        if( !empty( $button_text ) ):
                            echo '<span class="text-white uppercase">'.$button_text.'</span>';
                        endif;

                    echo '</a>';

                endif;
            endwhile;
            echo '</div>';
        echo '</div>';
    endif;
endif;

wp_footer(); ?>

</body>

</html>