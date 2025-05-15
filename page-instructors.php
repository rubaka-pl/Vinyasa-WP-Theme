<?php

/**
 * The template for displaying all pages
 * Template name: Инструкторы
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vinyasa-THEME
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php get_template_part('template-parts/breadcrumbs'); ?>

	<?php get_template_part('template-parts/about-instructor'); ?>


	<?php get_template_part('template-parts/instructors'); ?>

	<?php
	get_template_part('template-parts/contacts-form');
	?>

</main><!-- #main -->

<?php
get_footer();
