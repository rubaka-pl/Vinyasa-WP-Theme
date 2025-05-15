<?php

/**
 * The template for displaying search category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Vinyasa-THEME
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php get_template_part('template-parts/breadcrumbs'); ?>

	<section class="blog-wrap">
		<div class="container">
			<div class="blog-row">
				<div class="blog-left">
					<?php if (have_posts()) :

						while (have_posts()) :
							the_post(); ?>

							<article class="blog-item">
								<div class="blog-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('full'); ?>
										<?php else : ?>
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.png" style="background-position: bottom; margin: 0 auto; width: 50%;" alt="No image">
										<?php endif; ?>
									</a>
								</div>

								<div class="blog-date-wrap">
									<div class="blog-date">
										<i class="fa-regular fa-calendar blog-date-icon"></i>
										<?php echo get_the_date('d.m.Y'); ?>
									</div>
									<div class="blog-date">
										<i class="fa-regular fa-comments blog-date-icon"></i>
										<?php echo get_comments_number(); ?> Коментария
									</div>
								</div>

								<h4 class="blog-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4>

								<div class="blog-desc">
									<?php the_excerpt(); ?>
								</div>
							</article>

					<?php
						endwhile;
						the_posts_navigation();
					else :
						echo 'Ничего не найдено';
					endif;
					?>

				</div>


				<div class="blog-right">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
