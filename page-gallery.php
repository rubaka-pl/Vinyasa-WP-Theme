<?php

/**
 * The template for displaying all pages
 * Template Name : Галерея
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
	<?php
	get_template_part('template-parts/breadcrumbs');
	?>

	<section id="GalleryWrap" class="gallery-wrap p-100">
		<div class="container">
			<div class="title-column">
				<div class="title-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon--white.svg" alt="icon-white">
				</div>
				<?php if (!empty($global_options['gallery-title'])): ?>
					<h2 class="title-text"><?php echo $global_options['gallery-title']; ?></h2>
				<?php endif; ?>
				<div class="title-desc">
					<?php echo $global_options['gallery-subtitle']; ?>
				</div>
			</div>

			<?php echo do_shortcode('[gallery_images]'); ?>

		</div>
	</section>


</main>

<?php
get_footer();
