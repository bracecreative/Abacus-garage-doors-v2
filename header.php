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

    <header class="site-header w-full md:fixed md:left-0 md:top-0">
        <?php
        $topbar_content = get_field('top_bar_content', 'option');
        if( !empty( $topbar_content ) ): ?>
            <div class="top-bar bg-dblue py-2">
                <div class="container mx-auto lg:px-10 xl:px-0 xl:w-10/12">
                    <?php echo $topbar_content; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="middle bg-white py-6 md:bg-transparent">
            <div class="container mx-auto md:flex md:flex-row md:flex-wrap md:max-w-[91.666667%] xl:w-10/12">
                <div class="logo-wrapper px-4 pb-6 md:basis-7/12 md:flex md:items-center md:justify-center md:pb-0 md:pl-0 md:pr-20 lg:basis-6/12">
                    <?php
                    $logo = get_field('logo', 'option');
                    if( !empty( $logo ) ):
                        echo '<a href="'.get_site_url().'">';
                            echo wp_get_attachment_image( $logo, 'full');
                        echo '</a>';
                    endif;
                    ?>
                </div>

                <div class="locations flex flex-row flex-wrap gap-y-4 md:basis-5/12 lg:basis-6/12 lg:items-end">
                    <?php
                    $locations = get_field('phone_numbers', 'option');
                    if( !empty( $locations ) ):
                        if( have_rows('phone_numbers', 'option') ):
                            while( have_rows('phone_numbers', 'option') ): the_row();
                                echo '<div class="location basis-2/4 flex flex-col justify-center lg:basis-1/3">';

                                    $location = get_sub_field('location');
                                    if( !empty( $location ) ):
                                        echo '<p class="pb-2 text-dblue text-center text-sm uppercase lg:font-bold lg:text-lg">'.$location.'</p>';
                                    endif;

                                    $phone_no = get_sub_field('phone_number');
                                    $phone_no_condensed = str_replace(' ', '', $phone_no);
                                    if( !empty( $phone_no ) ):
                                        echo '<a class="text-center text-orange text-sm lg:text-base" href="tel:'.$phone_no_condensed.'">'.$phone_no.'</a>';
                                    endif;
                                    
                                echo '</div>';
                            endwhile;
                        endif;
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <?php
        $bottom_content = get_field('bottom_bar_content', 'option');
        if( !empty( $bottom_content ) ):
        ?>
            <div class="bottom-bar bg-dblue px-6 py-4 md:mx-auto md:w-11/12 xl:w-10/12">
                <?php echo $bottom_content; ?>
            </div>
        <?php endif; ?>

        <nav class="nav-wrapper bg-orange flex flex-col gap-y-4 py-4 relative md:mx-auto md:w-11/12 lg:py-0 xl:w-10/12">
            <a class="nav-toggle flex flex-row items-center justify-center lg:hidden" href="#">
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