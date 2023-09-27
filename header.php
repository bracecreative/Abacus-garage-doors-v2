<!DOCTYPE html>
<html <?php language_attributes(); ?> class="overflow-x-hidden">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class('font-sans');?>>

    <header class="w-full site-header md:absolute md:left-0 md:top-0 md:z-[9999]">
        <?php
        $topbar_content = get_field('top_bar_content', 'option');
        if( !empty( $topbar_content ) ): ?>
            <div class="py-2 top-bar bg-dblue">
                <div class="container max-w-[1280px] mx-auto lg:px-10 xl:px-0 xl:w-10/12">
                    <?php echo $topbar_content; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="bg-white middle pt-6 md:bg-white/75">
            <div class="container max-w-[1280px] mx-auto md:flex md:flex-row md:flex-wrap xl:w-10/12">
                <div class="px-4 pb-6 logo-wrapper md:basis-7/12 md:flex md:items-center md:justify-center md:pb-0 md:pl-[30px] md:pr-20 lg:basis-6/12 xl:pl-0">
                    <?php
                    $logo = get_field('logo', 'option');
                    if( !empty( $logo ) ):
                        echo '<a href="'.get_site_url().'">';
                            echo wp_get_attachment_image( $logo, 'full');
                        echo '</a>';
                    endif;
                    ?>
                </div>

                <div class="flex flex-row flex-wrap locations gap-y-4 md:basis-5/12 lg:basis-6/12 lg:items-end">
                    <?php
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
                                        echo '<a class="text-sm text-center text-orange lg:text-base" href="tel:'.$phone_no_condensed.'">'.$phone_no.'</a>';
                                    endif;
                                    
                                echo '</div>';
                            endwhile;
                        endif;
                    endif;
                    ?>
                </div>
            </div>

            <?php
            $bottom_content = get_field('bottom_bar_content', 'option');
            if( !empty( $bottom_content ) ):
                ?>
                <div class="bottom-bar bg-dblue max-w-[1280px] mt-[20px] px-6 py-4 md:mx-auto md:w-11/12 xl:w-10/12">
                    <?php echo $bottom_content; ?>
                </div>
            <?php endif; ?>

        </div>

        <nav class="relative flex flex-col py-4 nav-wrapper bg-orange gap-y-4 max-w-[1280px] md:mx-auto md:w-11/12 lg:py-0 xl:w-10/12">
            <a class="flex flex-row items-center justify-center nav-toggle lg:hidden" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="32px" width="36px" viewBox="0 0 448 512"><path fill="#FFF" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </a>
            <div class="nav-menu absolute bg-orange hidden left-0 top-[64px] w-full z-[1] lg:flex lg:static">
                <?php
                wp_nav_menu(
                    array(
                        'container' => '',
                        'theme_location' => 'primary',
                    ),
                );
                ?>
            </div>
        </nav>

    </header>

    <main>