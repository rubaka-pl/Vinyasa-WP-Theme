<?php

/**
 * Vinyasa-THEME functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vinyasa-THEME
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yoga_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Vinyasa-THEME, use a find and replace
		* to change 'yoga' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('yoga', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'yoga'),
			'menu-header' => esc_html__('Menu Header', 'yoga'),
			'footer_nav' => __('Меню в подвале', 'vinyasa'),
			'footer_classes' => __('Меню в подвале - Классы', 'vinyasa'),

		)
	);

	//custom walker for menu
	class Vinyasa_Walker_Nav_Menu extends Walker_Nav_Menu
	{
		public function start_lvl(&$output, $depth = 0, $args = null)
		{
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"nav-list-submenu--hover\">\n";
		}
		public function end_lvl(&$output, $depth = 0, $args = null)
		{
			$output .= "\t</ul>\n";
		}
		public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
		{
			$classes = empty($item->classes) ? [] : (array) $item->classes;
			$is_dropdown = in_array('menu-item-has-children', $classes);

			$class_names = 'nav-list-item';
			if ($depth > 0) {
				$class_names .= ' nav-list-submenu-item';
			}
			if ($is_dropdown) {
				$class_names .= ' nav-list-item-has-children';
			}

			$output .= '<li class="' . esc_attr($class_names) . '">';
			$output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';

			// стрелка
			if ($is_dropdown && $depth === 0) {
				$output .= '<span class="open-submenu">
					<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/arrow.svg" alt="carret">
				</span>';
			}
		}
		public function end_el(&$output, $item, $depth = 0, $args = null)
		{
			$output .= "</li>\n";
		}
	}

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'yoga_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'yoga_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yoga_content_width()
{
	$GLOBALS['content_width'] = apply_filters('yoga_content_width', 640);
}
add_action('after_setup_theme', 'yoga_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yoga_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'yoga'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'yoga'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'yoga_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function yoga_scripts()
{

	// Базовые стили темы
	wp_enqueue_style('yoga-style', get_stylesheet_uri(), array(), _S_VERSION);

	// Стили внешние	
	wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
	wp_enqueue_style('global-style', get_template_directory_uri() . '/assets/css/global.css', array('main-style'), '1.0.0');
	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null);
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.min.css', array(), null);
	wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.1.1');
	wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0');


	// Скрипты темы
	wp_enqueue_script('yoga-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	// Поддержка комментариев
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.0.min.js', array(), '3.6.0', true);
	wp_enqueue_script('jquery');


	// Подключаем скрипты	
	wp_enqueue_script('masonry');

	wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array('jquery'), null, true);
	wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), null, true);
	wp_enqueue_script('animate', get_template_directory_uri() . '/assets/js/animate.js', array('jquery'), null, true);
	if (is_page('blog') || is_home()) {
		wp_enqueue_script('pagination', get_template_directory_uri() . '/assets/js/pagination.js', array(), null, true);
	}
	wp_enqueue_script('urlReadPosts', get_template_directory_uri() . '/assets/js/urlReadPosts.js', array('jquery'), null, true);

	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', array('swiper-bundle', 'jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'yoga_scripts');


/**
 * GLOBAL OPTIONS
 */
require get_template_directory() . '/inc/global-options.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



//HIDE DEFAULT WP EDITION MENU start
function disable_content_editor()
{
	if (isset($_GET['post'])) {
		$post_ID = $_GET['post'];
	} else if (isset($_POST['post_ID'])) {
		$post_ID = $_POST['post_ID'];
	}

	if (!isset($post_ID) || empty($post_ID)) {
		return;
	}

	$disabled_IDs = array(54, 148, 215);
	if (in_array($post_ID, $disabled_IDs)) {
		remove_post_type_support('page', 'editor');
	}
}
add_action('admin_init', 'disable_content_editor');


//HIDE DEFAULT WP EDITION MENU END



//yoast link
add_filter('wpseo_breadcrumb_links', 'custom_instructors_breadcrumb_link');
function custom_instructors_breadcrumb_link($links)
{
	// Если на странице отдельного инструктора
	if (is_singular('instructors')) {
		foreach ($links as $key => $link) {
			if ($link['text'] === 'Инструкторы' || $link['text'] === 'instructors') {
				// заменяем ссылку на страницу instructors-about
				$links[$key]['url'] = site_url('/instructors-about/');
			}
		}
	}
	return $links;
}

add_filter('wpseo_breadcrumb_single_link', 'custom_trim_breadcrumb_title', 10, 2);

function custom_trim_breadcrumb_title($link_output, $link)
{
	if (is_single() && isset($link['text'])) {
		$original = $link['text'];
		$new = wp_trim_words($original, 3, '...');
		$link_output = str_replace($link['text'], esc_html($new), $link_output);
	}
	return $link_output;
}



//search form
add_filter('get_search_form', 'replace_search_placeholder');
function replace_search_placeholder($form)
{
	$form = str_replace(
		'placeholder="Search …"',
		'placeholder="Поиск по сайту..."',
		$form
	);

	$form = str_replace(
		'placeholder="Search"',
		'placeholder="Поиск по сайту..."',
		$form
	);

	return $form;
}
//TAGS style reset
function disable_tagcloud_font_sizes($args)

{
	$args['smallest'] = 0.85;
	$args['largest'] = 0.85;
	$args['unit'] = 'em';
	return $args;
}
add_filter('widget_tag_cloud_args', 'disable_tagcloud_font_sizes');
function custom_tag_cloud_wrapper($html)
{
	return '<div class="tags-list">' . $html . '</div>';
}
add_filter('wp_tag_cloud', 'custom_tag_cloud_wrapper');






/// comments section
function custom_comment($comment, $args, $depth)
{
?>
	<li <?php comment_class('custom-comment'); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-container" style="display: flex; gap: 20px; margin-bottom: 40px; border-bottom: 1px solid #eee; padding-bottom: 20px;">

			<div class="comment-avatar" style="flex-shrink: 0;">
				<?php echo get_avatar($comment, 80, '', '', ['class' => 'comment-avatar-img']); ?>
			</div>

			<div class="comment-content" style="flex: 1;">
				<div class="comment-author-name" style="font-weight: 700; font-size: 18px;">
					<?php echo get_comment_author_link(); ?>
				</div>

				<div class="comment-date" style="color: #888; font-size: 14px; margin: 5px 0 15px;">
					<i class="fa-solid fa-rotate-left" style="margin-right: 5px;"></i>
					<?php echo get_comment_date('d.m.Y', $comment); ?>
				</div>

				<div class="comment-text" style="font-size: 16px; color: #444;">
					<?php comment_text(); ?>
				</div>

				<div class="comment-reply" style="margin-top: 15px;">
					<?php
					comment_reply_link(array_merge($args, [
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text' => '<i class="fa-solid fa-reply" style="margin-right:5px;"></i>Ответить',
						'before'    => '<button class="comment-reply-button" style="background:#fff; border:1px solid #ccc; padding:8px 16px; font-size:14px; cursor:pointer;">',
						'after'     => '</button>',
					]));
					?>
				</div>
			</div>
		</div>
	</li>
<?php
}

// comment section end
