<?php

/**
 * The template for displaying all pages
 * Template Name: Главная
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vinyasa-THEME
 */

global $global_options;
get_header();
?>

<main id="primary" class="site-main">

	<section class="banner-wrapper">
		<!-- Slider main container -->
		<div class="swiper swiper-banner">
			<div class="swiper-wrapper">
				<!-- Slide  -->
				<?php
				$banner_title = $global_options['banner-repeater']['title'];
				$banner_subtitle = $global_options['banner-repeater']['subtitle'];
				$banner_btn_text = $global_options['banner-repeater']['btn-text'];
				$banner_btn_link = $global_options['banner-repeater']['btn-link'];
				$banner_background = $global_options['banner-repeater']['background'];
				$number = 0;
				foreach ($banner_title as $slide) : ?>
					<div class="swiper-slide">
						<div class="banner-item"
							style="background-image: url('<?php echo $banner_background[$number]['url']; ?>'); background-size: cover; background-position: top center;">
							<div class="container">
								<h2 class="banner-title">
									<?php echo $banner_title[$number] ?>
								</h2>
								<p class="banner-text">
									<?php echo $banner_subtitle[$number] ?>
								</p>
								<div class="btn banner-btn">
									<a href="<?php echo $banner_btn_link[$number] ?>" class="button">
										<span><?php echo $banner_btn_text[$number] ?> </span>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php
					$number++;
				endforeach
				?>
			</div>
			<div class="swiper-pagination"></div>
			<!-- If we need navigation buttons -->
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
	</section>

	<section class="about-wrap" id="about_wrap">
		<div class="container p-100">
			<div class="about-row">
				<div class="about-left">
					<div class="about-title-row title-row">
						<div class="about-title-icon title-icon">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon.svg" alt="icon">
						</div>
						<h2 class="about-title-text title-text"><?php echo get_field('about_title') ?></h2>
					</div>
					<div class="about-title-desc">
						<?php echo get_field('about_desc') ?>
					</div>
					<div class="about-numbers">
						<?php
						$numbers = get_field('about_numbers');
						if ($numbers): ?>
							<div class="numbers-item">
								<div class="numbers-title"> <?php echo $numbers['numbers_title_1']; ?>
								</div>
								<div class="numbers-subtitle"><?php echo $numbers['numbers_subtitle_1']; ?></div>
							</div>
							<div class="numbers-item">
								<div class="numbers-title"> <?php echo $numbers['numbers_title_2']; ?>
								</div>
								<div class="numbers-subtitle"><?php echo $numbers['numbers_subtitle_2']; ?></div>
							</div>
							<div class="numbers-item">
								<div class="numbers-title"> <?php echo $numbers['numbers_title_3']; ?>
								</div>
								<div class="numbers-subtitle"><?php echo $numbers['numbers_subtitle_3']; ?></div>
							</div>
							<div class="numbers-item">
								<div class="numbers-title"> <?php echo $numbers['numbers_title_4']; ?>
								</div>
								<div class="numbers-subtitle"><?php echo $numbers['numbers_subtitle_4']; ?></div>
							</div>

						<?php endif; ?>
					</div>
				</div>

				<div class="about-right">
					<div class="about-image-wrapper">
						<div class="about-image-1">
							<img src="<?php echo get_field('about_img_1',)['url']; ?>" alt="<?php echo get_field('about_img_1')['alt']; ?>">
						</div>

						<div class="about-image-2">
							<img src="<?php echo get_field('about_img_2')['url']; ?>" alt="<?php echo get_field('about_img_2')['alt']; ?>">
						</div>

						<div class="btn about-btn">
							<a class="button" href="<?php echo get_field('about_btn')['url']; ?>"><?php echo get_field('about_btn')['title']; ?></a>
						</div>
					</div>
				</div>

			</div>
		</div>
		</div>
	</section>


	<?php
	get_template_part('template-parts/classes');
	?>


	<?php
	get_template_part('template-parts/instructors');
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

			<?php echo do_shortcode('[gallery_images limit="' . $global_options['gallery-count'] . '"]'); ?>

			<div class="gallery-btn btn">
				<a href="<?php echo esc_url(home_url($global_options['gallery-button'])); ?>" class="button">Смотреть все</a>
			</div>
		</div>
	</section>
	<?php
	$faq_title = $global_options['faq-title'];
	$faq_subtitle = $global_options['faq-sub-title'];
	?>
	<section id="FaqWrap" class="faq-wrap p-100">
		<div class="container">
			<div class="title-column">
				<div class="title-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon.svg" alt="icon">
				</div>
				<h2 class="title-text"> <?php echo $global_options['faq-title']; ?></h2>
				<div class="title-desc gray-color"><?php echo $global_options['faq-sub-title'];  ?> <br> </div>
			</div>

			<div class="faq-group">
				<?php
				$faq_question = $global_options['faq-repeater']['question'];
				$faq_answer = $global_options['faq-repeater']['answer'];
				$number = 0;
				foreach ($faq_question as $item) : ?>
					<div class="faq-item">
						<div class="faq-question">
							<span><?php echo $faq_question[$number]; ?></span>
						</div>
						<div class="faq-answer-wrapper">
							<p class="faq-answer gray-color">
								<?php echo $faq_answer[$number]; ?>
							</p>
						</div>
					</div>
				<?php
					$number++;
				endforeach;
				?>
			</div>
		</div>
	</section>


	<section class="reviews-wrap bg-gray p-100">
		<div class="container">
			<div class="title-column">
				<span class="title-icon">
					<img src="http://localhost/wordpress/wp-content/themes/Vinyasa-THEME/assets/images/logo-icon.svg" alt="icon"> </span>
				<h2 class="title-text"><?php echo $global_options['reviews-title']; ?></h2>
				<div class="title-desc">
					<?php echo $global_options['reviews-subtitle']; ?>
				</div>
			</div>

			<div class="swiper swiper-reviews">
				<div class="swiper-wrapper">

					<?php
					$reviews_name = $global_options['reviews-repeater']['name'];
					$reviews_text = $global_options['reviews-repeater']['review'];
					$reviews_avatar = $global_options['reviews-repeater']['avatar'];
					$reviews_whatsapp = $global_options['reviews-repeater']['whatsapp'];
					$reviews_telegram = $global_options['reviews-repeater']['telegram'];
					$reviews_twitter = $global_options['reviews-repeater']['twitter'];
					$number = 0;
					foreach ($reviews_name as $reviews_item) : ?>
						<div class="swiper-slide">
							<div class="reviews-item">
								<div class="reviews-thumb">
									<img src="<?php echo $reviews_avatar[$number]['url']; ?>" alt="Review <?php echo $number; ?>">
								</div>

								<div class="reviews-body">
									<h4 class="reviews-name"><?php echo $reviews_name[$number]; ?></h4>
									<div class="reviews-text">
										<?php echo $reviews_text[$number]; ?>
									</div>
									<div class="reviews-line"></div>
									<div class="reviews-social">
										<?php if (!empty($reviews_whatsapp[$number])): ?>
											<a href="<?php echo $reviews_whatsapp[$number]; ?>" target="_blank">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-whatsapp.svg" alt="Whatsapp">
											</a>
										<?php endif; ?>
										<?php if (!empty($reviews_telegram[$number])): ?>
											<a href="<?php echo $reviews_telegram[$number]; ?>" target="_blank">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-telegram.svg" alt="Telegram">
											</a>
										<?php endif; ?>
										<?php if (!empty($reviews_twitter[$number])): ?>
											<a href="<?php echo $reviews_twitter[$number]; ?>" target="_blank">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-twitter.svg" alt="Telegram">
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>

					<?php
						$number++;
					endforeach;
					?>

				</div>

				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>

	<?php
	get_template_part('template-parts/contacts-form');
	?>

</main><!-- #main -->

<?php
get_footer();
