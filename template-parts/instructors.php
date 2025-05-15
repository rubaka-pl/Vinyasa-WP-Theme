<?php global $global_options; ?>
<section class="about-wrap about-inner p-100">
    <div class="container">
        <div class="about-row about-row-instructors">

            <div class="about-left">
                <div class="about-image-wrapper">
                    <div class="about-image-1">
                        <?php
                        $image = get_field('desc_image');
                        if ($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="about-right">
                <div class="about-title-row title-row">
                    <h2 class="about-title-text title-text"><?php the_field('desc_inner_title'); ?></h2>
                </div>
                <div class="about-title-desc">
                    <?php the_field('desc_inner_desc'); ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
$instructor_id = get_the_ID(); // ID текущего поста
$phone  = get_field('instructor_phone', $instructor_id);
$email  = get_field('instructor_email', $instructor_id);
$telegram = get_field('post_telegram', $instructor_id);
$whatsapp = get_field('post_whatsap', $instructor_id);
$twitter  = get_field('post_twitter', $instructor_id);
?>


<section id="instructorsWrap" class="instructors-wrap p-100">
    <div class="container">
        <div class="title-column">
            <div class="title-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon.svg" alt="icon" />
            </div>
            <h2 class="title-text">
                <?php echo !empty($global_options['instructors-title']) ? esc_html($global_options['instructors-title']) : 'Инструкторы'; ?>
            </h2>
            <div class="title-desc gray-color">
                <?php echo !empty($global_options['instructors-subtitle']) ? esc_html($global_options['instructors-subtitle']) : 'Вдохновляющие менторы студии йоги Виньяса'; ?>
            </div>
        </div>

        <div class="instructors-items">
            <?php
            $instructor_thumbsize = $global_options['instructors-images-size'] ?? 'medium';
            $instructor_count = $global_options['instructors-count'] ?? 4;

            $get_query = new WP_Query([
                'post_type'      => 'instructors',
                'posts_per_page' => $instructor_count,
            ]);

            $instructors = $get_query->get_posts();

            foreach ($instructors as $instructor) :
                $name = get_the_title($instructor->ID);
                $specialization = get_field('post_specialization', $instructor->ID);
                $telegram = get_field('post_telegram', $instructor->ID);
                $whatsapp = get_field('post_whatsap', $instructor->ID);
                $twitter  = get_field('post_twitter', $instructor->ID);
            ?>
                <div class="instructor-item bg-gray">
                    <div class="instructor-thumb">
                        <a href="<?php echo get_permalink($instructor->ID); ?>">
                            <?php
                            if (has_post_thumbnail($instructor->ID)) {
                                echo get_the_post_thumbnail($instructor->ID, $instructor_thumbsize);
                            }
                            ?>
                        </a>
                    </div>

                    <?php if ($name) : ?>
                        <div class="instructor-item-name">
                            <a href="<?php echo get_permalink($instructor->ID); ?>">
                                <?php echo esc_html($name); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="line"></div>
                    <div class="instructor-item-style gray-color">Направление</div>
                    <div class="instructor-item-title"><?php echo esc_html($specialization); ?></div>

                    <div class="instructor-social" aria-label="Социальные сети инструктора">
                        <div class="item__social social-items">
                            <?php if (!empty($telegram)) : ?>
                                <div class="social-item">
                                    <a href="<?php echo esc_url($telegram); ?>" target="_blank" rel="noopener noreferrer" aria-label="Telegram">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-telegram.svg" alt="Telegram" />
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($whatsapp)) : ?>
                                <div class="social-item">
                                    <a href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-whatsapp.svg" alt="WhatsApp" />
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($twitter)) : ?>
                                <div class="social-item">
                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-twitter.svg" alt="Twitter" />
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>