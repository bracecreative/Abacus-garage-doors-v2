<?php
/* 

Template Name: Content Builder 
Template Post Type: post, page, case-studies

*/


?>

<?php get_header(); ?>

<?php if (have_rows('content_builder')) : ?>

<?php $sliderCount = -1; ?>

<?php while (have_rows('content_builder')) : the_row(); $sliderCount++ ?>

<?php
    layout_loader('template-parts/components/', [

    ]);
?>

<?php endwhile; ?>

<?php endif; ?>


<?php get_footer(); ?>