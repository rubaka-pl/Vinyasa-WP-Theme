<?php

/**
 * Template Name: Блог
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs'); ?>


    <?php
    get_template_part('template-parts/contacts-form');
    ?>
</main>

<?php get_footer(); ?>