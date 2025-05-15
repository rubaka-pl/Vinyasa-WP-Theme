<?php get_header(); ?>
<?php
$instructor_id = get_the_ID(); // ID текущего поста
$phone  = get_field('instructor_phone', $instructor_id);
$email  = get_field('instructor_email', $instructor_id);
$telegram = get_field('post_telegram', $instructor_id);
$whatsapp = get_field('post_whatsap', $instructor_id);
$twitter  = get_field('post_twitter', $instructor_id);
?>
<?php get_template_part('template-parts/breadcrumbs'); ?>

<section class="about-wrap about-inner p-100">
    <div class="container">
        <div class="about-row about-row-instructors">

            <div class="about-left">
                <div class="about-image-wrapper">
                    <div class="about-image-1">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="about-right">
                <div class="about-title-row title-row">
                    <h2 class="about-title-text title-text"><?php the_field('post_name'); ?></h2>
                </div>
                <div class="about-title-desc">
                    <?php the_content(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="instructors-contacts-wrap p-100">
    <div class="container full" style="background-color: var(--main-color); ">
        <div class="instructors-contact-row">

            <?php if (!empty($phone)) : ?>
                <div class="instructors-contact-item">
                    <div class="instructors-contact-icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div class="instructors-contact-title">Телефон</div>
                    <div class="instructors-contact-desc">
                        <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($email)) : ?>

                <div class="instructors-contact-item">
                    <div class="instructors-contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="instructors-contact-title">Email</div>
                    <div class="instructors-contact-desc">
                        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                    </div>
                </div>

            <?php endif; ?>

            <div class="instructors-contact-item">
                <div class="instructors-contact-icon">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                </div>
                <div class="instructors-contact-title">Социальные сети</div>
                <div class="instructors-contact-desc">
                    <div class="instructors-items-social">

                        <?php if (!empty($telegram)) : ?>
                            <div class="instructors-social-item">
                                <a href="<?php echo esc_url($telegram); ?>" target="_blank" rel="noopener noreferrer" aria-label="Telegram">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-telegram.svg" alt="Telegram" />
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($whatsapp)) : ?>
                            <div class="instructors-social-item">
                                <a href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-whatsapp.svg" alt="WhatsApp" />
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($twitter)) : ?>
                            <div class="instructors-social-item">
                                <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social-twitter.svg" alt="Twitter" />
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</section>

<?php get_template_part('template-parts/contacts-form'); ?>
<?php get_footer(); ?>