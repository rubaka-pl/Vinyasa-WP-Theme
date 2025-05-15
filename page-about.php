<?php

/**
 * The template for displaying all pages
 * Template name: О нас
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


	<section class="about-wrap about-inner p-100">
		<div class="container">

			<div class="about-row">

				<div class="about-left">
					<div class=".about-title-row 	">
						<?php if (!empty(get_field('about_inner_title'))): ?>
							<h2 class="title-text"><?php echo get_field('about_inner_title'); ?></h2>
						<?php endif; ?>
					</div>
					<?php if (!empty(get_field('about_inner_desc'))): ?>
						<div class="about-desc about-title-desc">
							<?php echo get_field('about_inner_desc'); ?>
						</div>
					<?php endif; ?>


					<div class="about-inner-btn btn">
						<a href="<?php echo get_field('about_inner_link')['url']; ?>" class="button anchor-link">
							<?php echo get_field('about_inner_link')['title']; ?>
						</a>
					</div>
				</div>

				<?php if (get_field('about_inner_image')): ?>
					<div class="about-right">
						<div class="about-image-wrap">
							<div class="about-image-1">
								<?php if (!empty(get_field('about_inner_image'))): ?>
									<img src="<?php echo get_field('about_inner_image')['url']; ?>" alt="<?php echo get_field('about_inner_image')['alt']; ?>">
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.png" alt="No image">
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</section>

	<section class="about-numbers about-numbers-inner">
		<?php
		$numbers = get_field('about_inner_numbers_group');
		if ($numbers): ?>
			<div class="numbers-item">
				<div class="numbers-title"><?php echo $numbers['title_1']; ?></div>
				<div class="numbers-subtitle"><?php echo $numbers['subtitle_1']; ?></div>
			</div>
			<div class="numbers-item">
				<div class="numbers-title"><?php echo $numbers['title_2']; ?></div>
				<div class="numbers-subtitle"><?php echo $numbers['subtitle_2']; ?></div>
			</div>
			<div class="numbers-item">
				<div class="numbers-title"><?php echo $numbers['title_3']; ?></div>
				<div class="numbers-subtitle"><?php echo $numbers['subtitle_3']; ?></div>
			</div>
			<div class="numbers-item">
				<div class="numbers-title"><?php echo $numbers['title_4']; ?></div>
				<div class="numbers-subtitle"><?php echo $numbers['subtitle_4']; ?></div>
			</div>
		<?php endif; ?>
	</section>

	<?php if (get_field('video_group')['show_video']): ?>
		<section class="video-wrap p-100" id="<?php echo get_field('video_group')['video_id']; ?>">
			<div class="container">
				<div class="video-item" id="video-item">
					<a href="<?php echo get_field('video_group')['video_link']; ?>" class="magnific-iframe">
						<img class="video-bg" src="<?php echo get_field('video_group')['video_thumb']['url']; ?>" alt="Video">
						<span class="video-play"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/play.svg" alt="Play"></span>
					</a>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	get_template_part('template-parts/classes');
	?>


	<?php
	get_template_part('template-parts/instructors');
	?>

	<?php
	get_template_part('template-parts/contacts-form');
	?>
</main><!-- #main -->

<?php
get_footer();
