<?php global $global_options; ?>
<section class="classes-wrap p-100 bg-gray">
    <div class="container">
        <div class="title-column">
            <span class="title-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon.svg" alt="Иконка">
            </span>
            <h2 class="title-text"><?php echo $global_options['classes-title']; ?></h2>
            <div class="title-desc">
                <?php echo $global_options['classes-subtitle']; ?>
            </div>
        </div>
        <div class="classes-items">
            <?php
            $get_query = new WP_Query;
            $classes_count = $global_options['classes-count'];
            $classes_thumbsize = $global_options['classes-thumb-size'];
            $classes = $get_query->query([
                'post_type' => 'classes',
                'posts_per_page' => $classes_count,
            ]);
            foreach ($classes as $class) : ?>
                <div class="classes-item">
                    <div class="classes-thumb">
                        <a href="<?php echo get_permalink($class->ID); ?>">
                            <?php
                            if (has_post_thumbnail($class->ID)):
                                echo get_the_post_thumbnail($class->ID, $classes_thumbsize);
                            else:
                                echo '<img src="' . get_template_directory_uri() . '/assets/images/no-image.png">';
                            endif;
                            ?>
                        </a>
                    </div>
                    <h4 class="class-item-title"><a href="classes-single.html"><?php echo esc_html($class->post_title); ?></a></h4>
                </div>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>