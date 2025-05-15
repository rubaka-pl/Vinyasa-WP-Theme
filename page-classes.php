<?php

/**
 * The template for displaying all pages
 * Template name: Классы
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vinyasa
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php get_template_part('template-parts/breadcrumbs'); ?>

	<?php get_template_part('template-parts/classes-about'); ?>

	<?php get_template_part('template-parts/classes'); ?>

	<?php get_template_part('template-parts/contacts-form'); ?>

</main><!-- #main -->

<?php
get_footer();
