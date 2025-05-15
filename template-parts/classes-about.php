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