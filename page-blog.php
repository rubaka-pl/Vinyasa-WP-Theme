<?php

/**
 * Template Name: Блог
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="blog-wrap">
        <div class="container">
            <div class="blog-row">
                <div class="blog-left">

                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $get_query = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'paged' => $paged,
                    ]);

                    if ($get_query->have_posts()) :
                        while ($get_query->have_posts()) :
                            $get_query->the_post();
                    ?>
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
                        // Пагинация
                        echo '<div class="pagination-wrap">';
                        echo '<div class="pagination">';
                        echo paginate_links(array(
                            'total' => $get_query->max_num_pages,
                            'current' => $paged,
                            'prev_text' => '<',
                            'next_text' => '>',
                            'type' => 'plain',
                        ));
                        echo '</div>';
                        echo '</div>';


                        wp_reset_postdata();
                    endif;
                    ?>
                </div>


                <div class="blog-right">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>