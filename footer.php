<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vinyasa-THEME
 */
global $global_options;
$phone   = $global_options['footer_phone'] ?? '';
$address = $global_options['footer_address'] ?? '';
$email   = $global_options['footer_email'] ?? '';

?>
<footer class="footer p-100">
	<div class="container">
		<div class="footer-wrapper">
			<div class="footer-left">
				<?php if (!empty($global_options['footer-logo']['url'])): ?>
					<div class="logo-footer">
						<a href=" <?php echo esc_url(home_url('/')); ?>">
							<img src="<?php echo esc_url($global_options['footer-logo']['url']); ?>" alt="logo">
						</a>
					</div>
				<?php endif; ?>

				<?php if (!empty($global_options['footer-desc'])): ?>
					<p class="footer-text"><?php echo esc_html($global_options['footer-desc']); ?></p>
				<?php endif; ?>

				<div class="footer-social">
					<?php if ($global_options['social-whatsapp']): ?>
						<a href="<?php echo $global_options['social-whatsapp'] ?>" target="_blank">
							<i class="fa-brands fa-whatsapp"></i>
						</a>
					<?php endif; ?>

					<?php if ($global_options['social-telegram']): ?>
						<a href="<?php echo $global_options['social-telegram'] ?>" target="_blank">
							<i class="fa-brands fa-telegram"></i>
						</a>
					<?php endif; ?>

					<?php if ($global_options['social-twitter']): ?>
						<a href="<?php echo $global_options['social-twitter'] ?>" target="_blank">
							<i class="fa-brands fa-twitter"></i>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="footer-right">
				<nav class="footer-nav">
					<div class="footer-column">
						<h3>Навигация</h3>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_nav',
							'container' => 'ul',
							'menu_class' => 'footer-menu',
						));
						?>
					</div>

					<div class="footer-column">
						<h3>Классы</h3>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_classes',
							'container' => 'ul',
							'menu_class' => 'footer-menu',
						));
						?>
					</div>

					<div class="footer-column">
						<h3>Контакты</h3>
						<ul class="contact-list">
							<?php if (!empty($phone)): ?>
								<li>
									<i class="fa fa-phone" aria-hidden="true"></i>
									<a href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>">
										<?php echo esc_html($phone); ?>
									</a>
								</li>
							<?php endif; ?>

							<?php if (!empty($address)): ?>
								<li>
									<i class="fa-solid fa-location-dot" aria-hidden="true"></i>
									<?php echo esc_html($address); ?>
								</li>
							<?php endif; ?>

							<?php if (!empty($email)): ?>
								<li>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<a href="mailto:<?php echo esc_attr($email); ?>">
										<?php echo esc_html($email); ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</nav>
			</div>

		</div>
		<?php if (!empty($global_options['footer_copyright'])): ?>
			<div class="footer-down">
				<div class="footer-copyrights">
					<?php echo esc_html($global_options['footer_copyright']); ?>
				</div>
			</div>
		<?php endif; ?>

</footer>
<button id="scrollToTopBtn" title="Наверх">
	<img style='width:24px; height: 24px; ' src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-up.svg" alt="arrow-up">
</button>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>