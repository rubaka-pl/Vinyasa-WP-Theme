<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vinyasa-THEME
 */
global $global_options;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<!--MODAL FORM START-->
		<div class="modal-form-wrap mfp-hide" id="modal-form">
			<div class="modal-form-header">
				<div class="modal-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo">
				</div>
				<div class="modal-close">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="close">
				</div>
			</div>
			<div class="modal-body">
				<h4 class="modal-title">Записаться на занятие</h4>
				<?php echo do_shortcode('[contact-form-7 id="f2dd1e3" title="Модальное окно"]') ?>
			</div>
		</div>
		<!--MODAL FORM END-->
		<header class="header">
			<div class="header-top">
				<div class="container">
					<div class="header-top-row">

						<div class="header-top-social">

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

						<div class="header-top-info mobile-only" style="cursor: default;">
							<?php if ($global_options['schedule']): ?>
								<div class="header-top-info-item">
									<span class="header-top-info-item-icon">
										<i class="fa-solid fa-clock"></i>
									</span>
									<div class="header-top-info-text"><?php echo $global_options['schedule'] ?>
									</div>
								</div>
							<?php endif; ?>

							<?php if ($global_options['email']): ?>
								<div class="header-top-info-item">
									<a href="mailto:shapovalov.pr@gmail.com">
										<span class="header-top-info-item-icon">
											<i class="fa-solid fa-envelope"></i>
										</span>
										<div class="header-top-info-text"><?php echo $global_options['email'] ?></div>
									</a>
								</div>
							<?php endif; ?>

							<?php if ($global_options['phone']): ?>
								<?php
								$phone_number_clean = preg_replace('/[^\d+]/', '', $global_options['phone']);
								?>
								<div class="header-top-info-item">
									<a href="tel:<?php echo $phone_number_clean ?>">
										<span class="header-top-info-item-icon">
											<i class="fa-solid fa-phone"></i>
										</span>
										<div class="header-top-info-text"><?php echo $global_options['phone'] ?></div>
									</a>
								</div>
							<?php endif; ?>
							<?php if ($global_options['location']): ?>
								<div class="header-top-info-item">
									<a href="https://www.google.com/maps?q=52.994182,18.611847" target="_blank" rel="noopener">
										<span class="header-top-info-item-icon">
											<i class="fa-solid fa-location-dot"></i>
										</span>
										<div class="header-top-info-text"><?php echo $global_options['location'] ?></div>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom">
				<div class="container">
					<div class="header-bottom-row">
						<?php if (!empty($global_options['header-logo']['url'])): ?>
							<div class="header-logo">
								<a href="<?php echo esc_url(home_url('/')); ?>">
									<img src="<?php echo esc_url($global_options['header-logo']['url']); ?>" alt="logo">
								</a>
							</div>
						<?php endif; ?>

						<nav class="nav-menu">
							<?php
							$menu_items = $global_options['menu-items'];
							$submenu_items = $global_options['submenu-instructors'];
							?>

							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-header',
									'menu_id' => 'menu-header',
									'container' => 'ul',
									'menu_class' => 'nav-list',
									'walker' => new Vinyasa_Walker_Nav_Menu(),
								)
							);
							?>
							<!-- <ul class="nav-list">
								<?php foreach ($menu_items as $item): ?>
									<?php
									$title = !empty($item['title']) ? esc_html($item['title']) : '';
									$url = !empty($item['description']) ? esc_url($item['description']) : '#';
									$is_instructors = $title === 'Инструкторы';
									?>

									<?php if ($is_instructors && !empty($submenu_items)): ?>
										<li class="nav-list-item nav-list-item-has-children">
											<a href="<?php echo $url; ?>"><?php echo $title; ?></a>

											<ul class="nav-list-submenu--hover">
												<?php foreach ($submenu_items as $sub): ?>
													<?php
													$sub_title = !empty($sub['title']) ? esc_html($sub['title']) : '';
													$sub_url = !empty($sub['description']) ? esc_url($sub['description']) : '#';
													?>
													<li class="nav-list-item nav-list-submenu-item">
														<a href="<?php echo $sub_url; ?>">
															<span><?php echo $sub_title; ?></span>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>

											<span class="open-submenu">
												<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/arrow.svg" alt="carret">
											</span>
										</li>

									<?php else: ?>
										<li class="nav-list-item">
											<a href="<?php echo $url; ?>"><?php echo $title; ?></a>
										</li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul> -->

							<div class="header-top mobile-only">
								<div class="container">
									<div class="header-top-row">

										<div class="header-top-social">
											<a href="https://whatsapp.com/" target="_blank">
												<i class="fa-brands fa-whatsapp"></i>
											</a>
											<a href="https://web.telegram.org/" target="_blank">
												<i class="fa-brands fa-telegram"></i>
											</a>
											<a href="https://x.com/" target="_blank">
												<i class="fa-brands fa-x-twitter"></i>
											</a>
										</div>

										<div class="header-top-info mobile-only" style="cursor: default;">
											<div class="header-top-info-item">
												<span class="header-top-info-item-icon">
													<i class="fa-solid fa-clock"></i>
												</span>
												<div class="header-top-info-text">Пн-Пт с 10:00 до 19:00</div>
											</div>
											<div class="header-top-info-item">
												<a href="mailto:shapovalov.pr@gmail.com">
													<span class="header-top-info-item-icon">
														<i class="fa-solid fa-envelope"></i>
													</span>
													<div class="header-top-info-text">shapovalov.pr@gmail.com</div>
												</a>
											</div>
											<div class="header-top-info-item">
												<a href="tel:+48123456789">
													<span class="header-top-info-item-icon">
														<i class="fa-solid fa-phone"></i>
													</span>
													<div class="header-top-info-text">+(48) 123-456-789</div>
												</a>
											</div>
											<div class="header-top-info-item">
												<a href="https://www.google.com/maps?q=52.994182,18.611847" target="_blank"
													rel="noopener">
													<span class="header-top-info-item-icon">
														<i class="fa-solid fa-location-dot"></i>
													</span>
													<div class="header-top-info-text">ул. zwirki i wigury 81 г.Торунь</div>
												</a>
											</div>
										</div>

									</div>
								</div>
							</div>
						</nav>

						<div class="btn header-btn">
							<a href="#modal-form" class="header-btn open-modal-form">Записаться</a>
						</div>
						<div class="hamburger"> <i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</header>