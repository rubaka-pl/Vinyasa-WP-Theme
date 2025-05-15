<?php

/**
 * The template for displaying all single posts
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
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="blog-post bg-gray">
								<div class="blog-post-thumb">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('full'); ?>
									<?php else : ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.png" alt="No image" style="background-position: bottom; margin: 0 auto; width: 50%;">
									<?php endif; ?>
								</div>

								<h1 class="blog-post-title blog-post-title-single">
									<?php the_title(); ?>
								</h1>

								<div class="blog-date-wrap blog-date-wrap-single">
									<div class="blog-date">
										<i class="fa-regular fa-calendar"></i>
										<?php echo get_the_date('d.m.Y'); ?>
									</div>
									<div class="blog-comments">
										<i class="fa-regular fa-comments"></i>
										<?php comments_number('0 Комментариев', '1 Комментарий', '% Комментариев'); ?>
									</div>
								</div>

								<div class="blog-post-content blog-post-content-single">
									<?php the_content(); ?>
								</div>

								<section class="blog-post-navigation">
									<div class="post-nav">
										<?php
										$prev_post = get_previous_post();
										if (!empty($prev_post)) :
										?>
											<a class="post-nav prev-post" href="<?php echo get_permalink($prev_post->ID); ?>">
												<div class="post-thumb">
													<?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail'); ?>
												</div>
												<div class="post-info">
													<span class="post-label">Предыдущий пост</span>
													<strong class="post-title"><?php echo get_the_title($prev_post->ID); ?></strong>
													<p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt($prev_post->ID), 12); ?></p>
												</div>
												<div class="arrow-icon">←</div>
											</a>
										<?php endif; ?>

										<?php
										$next_post = get_next_post();
										if (!empty($next_post)) :
										?>
											<a class="post-nav next-post" href="<?php echo get_permalink($next_post->ID); ?>">
												<div class="post-thumb">
													<?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
												</div>
												<div class="post-info">
													<span class="post-label">Следующий пост</span>
													<strong class="post-title"><?php echo get_the_title($next_post->ID); ?></strong>
													<p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt($next_post->ID), 12); ?></p>
												</div>
												<div class="arrow-icon">→</div>
											</a>
										<?php endif; ?>
									</div>
								</section>
							</div> <!-- закрытие .blog-post -->

							<?php
							if (comments_open() || get_comments_number()) {
								comments_template();
							}
							?>

					<?php endwhile;
					endif; ?>
				</div> <!-- .blog-left -->
				<div class="blog-right">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
?>