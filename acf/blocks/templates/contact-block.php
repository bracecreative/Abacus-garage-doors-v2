<?php
$left_content = get_field('left_content');
if( !empty( $left_content ) ):
    $phone_no = $left_content['include_phone_numbers'];
    $address = $left_content['address'];
    $address_icon = $left_content['address_icon'];
    $email = $left_content['email'];
    $email_icon = $left_content['email_icon'];
endif;

$form = get_field('form');

echo '<section class="contact-form py-8">';
    echo '<div class="container flex flex-col mx-auto px-10 lg:flex-row lg:flex-wrap lg:gap-x-6 2xl:px-0">';
    
        if( !empty( $left_content ) ):
            echo '<div class="left-content basis-full lg:basis-2/4">';

                if( $phone_no == '1' ):
                    echo '<div class="flex flex-row flex-wrap locations gap-y-4 mb-5 md:basis-5/12 lg:basis-6/12 lg:items-start">';
                        $locations = get_field('phone_numbers', 'option');
                        if( !empty( $locations ) ):
                            if( have_rows('phone_numbers', 'option') ):
                                while( have_rows('phone_numbers', 'option') ): the_row();
                                    echo '<div class="flex flex-col justify-center location basis-2/4 lg:basis-1/3">';

                                        $location = get_sub_field('location');
                                        if( !empty( $location ) ):
                                            echo '<p class="pb-2 text-sm text-center uppercase text-dblue lg:font-bold lg:text-lg">'.$location.'</p>';
                                        endif;

                                        $phone_no = get_sub_field('phone_number');
                                        $phone_no_condensed = str_replace(' ', '', $phone_no);
                                        if( !empty( $phone_no ) ):
                                            echo '<a class="text-sm font-semibold text-center text-orange lg:text-base" href="tel:'.$phone_no_condensed.'">'.$phone_no.'</a>';
                                        endif;
                                    
                                    echo '</div>';
                                endwhile;
                            endif;
                        endif;

                    echo '</div>';
                endif;

                if( !empty( $address ) ):
                    echo '<div class="address-wrap flex flex-row flex-wrap gap-10 items-start justify-start mb-5">';
                        if( !empty( $address_icon ) ):
                            echo wp_get_attachment_image( $address_icon, 'full', '', array('class' => 'w-[20px]') );
                        endif;

                        if( !empty( $address ) ):
                            echo '<span class="address">';
                                echo $address;
                            echo '</span>';
                        endif;

                    echo '</div>';
                endif;
                    
                if( !empty( $email ) ):
                    echo '<div class="address-wrap flex flex-row flex-wrap gap-10 items-center justify-start">';
                        if( !empty( $email_icon ) ):
                            echo wp_get_attachment_image( $email_icon, 'full', '', array('class' => 'w-[20px]') );
                        endif;

                        if( !empty( $email ) ):
                            echo '<a class="email" href=mailto:'.$email.'>';
                                echo $email;
                            echo '</a>';
                        endif;

                    echo '</div>';
                endif;

            echo '</div>';
        endif;

        if( !empty( $form ) ):
            echo '<div class="form-wrapper basis-full>';
                echo gravity_form( $form['id'], false, false );
            echo '</div>';
        endif;

    echo '</div>';
echo '</section>';