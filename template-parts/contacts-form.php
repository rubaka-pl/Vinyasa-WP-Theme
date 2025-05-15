<?php global $global_options; ?>


<section class="contacts p-100">
    <div class="contact-form-container" style="background-image: url('<?php echo $global_options['contacts-background']['url']; ?>')">
        <div class="contact-form-left">
            <div class="title-column">
                <div class="title-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-icon--white.svg" alt="icon" />
                </div>
                <h2 class="title-text"><?php echo $global_options['contacts-title'] ?></h2>
                <div class="title-desc gray-color">
                    <?php echo $global_options['contacts-subtitle'] ?>
                </div>
            </div>
            <!-- <form name="contact" id="contact-form" class="	" -->
            <?php echo do_shortcode($global_options['contacts-shortcode']) ?>
        </div>
        <div class="line-vertical"></div>
        <div class="contact-form-right">
            <div class="contact-form-title">
                <?php if (!empty($global_options['contacts-r-title'])) : ?>
                    <h3><?php echo $global_options['contacts-r-title'] ?></h3>
                <?php endif; ?>

                <?php if (!empty($global_options['contacts-email'])) : ?>
                    <div class="contact-info__item">
                        <a href="mailto:shapovalov.pr@gmail.com">
                            <span class="contact-info__icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <div class="contact-info__text"><?php echo $global_options['contacts-email'] ?></div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($global_options['contacts-phone'])) : ?>
                    <div class="contact-info__item">
                        <a href="tel:+48123456789">
                            <span class="contact-info__icon">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            <div class="contact-info__text"><?php echo $global_options['contacts-phone'] ?></div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($global_options['contacts-adress'])) : ?>
                    <div class="contact-info__item">
                        <a href="https://www.google.com/maps?q=52.994182,18.611847" target="_blank"
                            rel="noopener">
                            <span class="contact-info__icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                            <div class="contact-info__text"><?php echo $global_options['contacts-adress'] ?></div>
                        </a>

                    </div>
                <?php endif; ?>

                <?php if (!empty($global_options['contacts-map'])) : ?>
                    <?php echo $global_options['contacts-map'] ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    </div>
</section>