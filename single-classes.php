<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vinyasa-THEME
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="classes-about-wrap p-100">
        <div class="container">
            <div class="classes-about-row">
                <div class="classes-sidebar">
                    <ul class="yoga-list">
                        <?php
                        // Получаем ID текущего поста
                        $current_post_id = get_the_ID();

                        // Запрос для получения списка всех постов
                        $args = array(
                            'post_type' => 'classes',
                            'posts_per_page' => -1 // Получить все посты
                        );
                        $query = new WP_Query($args);

                        // Цикл для вывода ссылок на посты
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_id = get_the_ID();
                                $class = ($post_id == $current_post_id) ? 'active' : ''; // Добавляем класс, если это текущий пост
                        ?>
                                <li class="<?php echo $class; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                            }
                            wp_reset_postdata(); // Сбрасываем данные постов
                        }
                        ?>
                    </ul>
                </div>
                <div class="classes-content">
                    <div class="classes-content-image">
                        <img src="<?php echo get_field('classes_image')['url'] ?>" alt="<?php echo get_field('classes_image')['alt'] ?>">
                    </div>
                    <h3 class="classes-content-title"> <?php the_title() ?></h3>
                    <div class="classes-content-desc">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/classes'); ?>

    <?php get_template_part('template-parts/contacts-form'); ?>

</main><!-- #main -->

<?php
get_footer();
