<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: https://devs.redux.io/
 *
 * @package Redux Framework
 */

// phpcs:disable
defined('ABSPATH') || exit;

if (! class_exists('Redux')) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'global_options';
// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if (is_dir($sample_patterns_path)) {
	$sample_patterns_dir = opendir($sample_patterns_path);

	if ($sample_patterns_dir) {

		// phpcs:ignore Generic.CodeAnalysis.AssignmentInCondition.FoundInWhileCondition
		while (false !== ($sample_patterns_file = readdir($sample_patterns_dir))) {
			if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
				$name              = explode('.', $sample_patterns_file);
				$name              = str_replace('.' . end($name), '', $sample_patterns_file);
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL → Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get('Name'),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get('Version'),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__('Настройки из плагина redux', 'vinyasa'),

	// The text to appear on the page title.
	'page_title'                => esc_html__('Настройки из плагина redux', 'vinyasa'),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => true,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: https://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// Shows the Options Object for debugging purposes. Show be set to false before deploying.
	'show_options_object'       => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE → Not in use yet, but reserved or partially implemented.
	// Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);


// ADMIN BAR LINKS → Set up custom links in the admin bar menu as external items.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => __('Documentation', 'vinyasa'),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => __('Support', 'vinyasa'),
);

// SOCIAL ICONS → Set up custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin',
);

// Panel Intro text → before the form.
if (! isset($args['global_variable']) || false !== $args['global_variable']) {
	if (! empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace('-', '_', $args['opt_name']);
	}

	// translators:  Panel opt_name.
	$args['intro_text'] = '<p>' . sprintf(esc_html__('Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'vinyasa'), '<strong>' . $v . '</strong>') . '<p>';
} else {
	$args['intro_text'] = '<p>' . esc_html__('This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'vinyasa') . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__('This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'vinyasa') . '</p>';

Redux::set_args($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__('Theme Information 1', 'vinyasa'),
		'content' => '<p>' . esc_html__('This is the tab content, HTML is allowed.', 'vinyasa') . '</p>',
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__('Theme Information 2', 'vinyasa'),
		'content' => '<p>' . esc_html__('This is the tab content, HTML is allowed.', 'vinyasa') . '</p>',
	),
);
Redux::set_help_tab($opt_name, $help_tabs);

// Set the help sidebar.
$content = '<p>' . esc_html__('This is the sidebar content, HTML is allowed.', 'vinyasa') . '</p>';

Redux::set_help_sidebar($opt_name, $content);

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields

//HEADER START
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Header', 'Vinyasa'),
		'id'               => 'basic',
		'subsection'       => false,
		'desc'             => esc_html__('Поля для шапки', 'Vinyasa'),
		'customizer_width' => '400px',
		'icon'             => 'el el-arrow-up',
		'fields'           => array(
			array(
				'id'       => 'social-whatsapp',
				'type'     => 'text',
				'title'    => esc_html__('Whatsapp link', 'vinyasa'),
			),
			array(
				'id'       => 'social-telegram',
				'type'     => 'text',
				'title'    => esc_html__('Telegram link', 'vinyasa'),
			),
			array(
				'id'       => 'social-twitter',
				'type'     => 'text',
				'title'    => esc_html__('Twitter link', 'vinyasa'),
			),
			array(
				'id'       => 'schedule',
				'type'     => 'text',
				'title'    => esc_html__('График работы', 'vinyasa'),
			),
			array(
				'id'       => 'email',
				'type'     => 'text',
				'title'    => esc_html__('Почта', 'vinyasa'),
			),
			array(
				'id'       => 'phone',
				'type'     => 'text',
				'title'    => esc_html__('Телефон', 'vinyasa'),
			),
			array(
				'id'       => 'location',
				'type'     => 'text',
				'title'    => esc_html__('Локация', 'vinyasa'),
			),
			array(
				'id'       => 'header-logo',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__('Логотип', 'vinyasa'),
				'desc'     => esc_html__('Загрузить логотип', 'vinyasa'),
			),
		),
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__('Меню', 'vinyasa'),
		'id'         => 'header_menu',
		'subsection' => false,
		'desc'       => esc_html__('Ссылки основного меню и подменю', 'vinyasa'),
		'icon'       => 'el el-lines',
		'fields'     => array(
			array(
				'id'       => 'menu-items',
				'type'     => 'slides',
				'title'    => esc_html__('Пункты меню', 'vinyasa'),
				'subtitle' => esc_html__('Добавьте ссылки основного меню', 'vinyasa'),
				'placeholder' => array(
					'title' => 'Название',
					'description' => 'Ссылка',
				),
			),
			array(
				'id'       => 'submenu-instructors',
				'type'     => 'slides',
				'title'    => esc_html__('Подменю "Инструкторы"', 'vinyasa'),
				'subtitle' => esc_html__('Ссылки подменю для раздела "Инструкторы"', 'vinyasa'),
				'placeholder' => array(
					'title' => 'Имя инструктора',
					'description' => 'Ссылка',
				),

			),
		),
	)
);
//HEADER END


//BANNER START
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Баннер', 'Vinyasa'),
		'id'               => 'Banner',
		'subsection'       => false,
		'desc'             => esc_html__('Слайдер', 'Vinyasa'),
		'customizer_width' => '400px',
		'icon'             => 'el el-photo',
		'fields'           => array(
			array(
				'id'          => 'banner-repeater',
				'type'        => 'repeater',
				'title' => esc_html__('Слайдер', 'vinyasa'),
				'limit'        => 8,
				'group_values' => true,
				'sortable' => true,
				'fields'         => array(
					array(
						'id'          => 'title',
						'type'        => 'text',
						'placeholder' => esc_html__('Заголовок', 'vinyasa'),
					),
					array(
						'id'          => 'subtitle',
						'type'        => 'textarea',
						'placeholder' => esc_html__('Подзаголовок', 'vinyasa'),
					),
					array(
						'id'      => 'btn-text',
						'type'    => 'text',
						'placeholder' => esc_html__('Текст кнопки', 'vinyasa'),
					),
					array(
						'id'      => 'btn-link',
						'type'    => 'text',
						'placeholder' => esc_html__('Ссылка кнопки', 'vinyasa'),
					),
					array(
						'id'          => 'background',
						'type'        => 'media',
						'url' 	      => false,
						'tite' => esc_html__('Фоновое изображение', 'vinyasa'),
						'desc' => esc_html__('Загрузите изображение', 'vinyasa'),
					)
				),
			)
		)
	)
);


//BANNER END

//FOOTER START
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Footer', 'Vinyasa'),
		'id'               => 'footer-basic',
		'subsection'       => false,
		'desc'             => esc_html__('Поля для подвала', 'Vinyasa'),
		'customizer_width' => '400px',
		'icon'             => 'el el-arrow-down',
		'fields'           => array(
			array(
				'id'       => 'footer-logo',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__('Логотип', 'vinyasa'),
				'desc'     => esc_html__('Загрузить логотип', 'vinyasa'),
			),
			array(
				'id'       => 'footer-desc',
				'type'     => 'text',
				'title'    => esc_html__('Описание', 'vinyasa'),
			),
			array(
				'id'    => 'footer_phone',
				'type'  => 'text',
				'title' => esc_html__('Телефон', 'vinyasa'),
				'default' => '(+6) 666-653-4523',
			),
			array(
				'id'    => 'footer_address',
				'type'  => 'text',
				'title' => esc_html__('Адрес', 'vinyasa'),
				'default' => 'ул. zwirki i wigury 81 г.Торунь',
			),
			array(
				'id'    => 'footer_email',
				'type'  => 'text',
				'title' => esc_html__('Email', 'vinyasa'),
				'default' => 'vinyasa@gmail.com',
			),
			array(
				'id'       => 'footer_copyright',
				'type'     => 'text',
				'title'    => esc_html__('Копирайт в подвале', 'vinyasa'),
				'default'  => '2024 © Vinyasa Все права защищены',
			),

		)
	),

);
//FOOTER END

//CLASSES START
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Классы', 'Vinyasa'),
		'id'               => 'classes',
		'subsection'       => false,
		'desc'             => esc_html__('Классы', 'Vinyasa'),
		'icon'             => 'el el-th-large',
		'fields'           => array(
			array(
				'id'      => 'classes-title',
				'type'    => 'text',
				'placeholder' => esc_html__('Заголовок', 'vinyasa'),
			),
			array(
				'id'      => 'classes-subtitle',
				'type'    => 'text',
				'placeholder' => esc_html__('Подзаголовок', 'vinyasa'),
			),
			array(
				'id'      => 'classes-count',
				'type'    => 'text',
				'placeholder' => esc_html__('Количество отображаемых записей на главной странице', 'vinyasa'),
			),
			array(
				'id'       => 'classes-images-size',
				'type'     => 'select',
				'title'    => esc_html__('Размер Миниатюр', 'vinyasa'),
				'options'  => array(
					'thumbnail' => 'Миниатюра',
					'medium' => 'Средняя',
					'large' => 'Большая',
					'full' => 'Полный размер'
				),
				'default'  => 'medium',
			)

		)

	)
);
//CLASSES END
//instructors START
Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__('Инструкторы', 'vinyasa'),
		'id'         => 'instructors_section',
		'desc'       => esc_html__('Настройки секции "Инструкторы"', 'vinyasa'),
		'icon'       => 'el el-user',
		'fields'     => array(
			array(
				'id'       => 'instructors-title',
				'type'     => 'text',
				'title'    => esc_html__('Заголовок', 'vinyasa'),
				'default'  => 'Инструкторы',
			),
			array(
				'id'       => 'instructors-subtitle',
				'type'     => 'text',
				'title'    => esc_html__('Подзаголовок', 'vinyasa'),
				'default'  => 'Вдохновляющие менторы студии йоги Виньяса',
			),
			array(
				'id'       => 'instructors-count',
				'type'     => 'text',
				'title'    => esc_html__('Количество отображаемых записей', 'vinyasa'),
				'default'  => '4',
			),
			array(
				'id'       => 'instructors-images-size',
				'type'     => 'select',
				'title'    => esc_html__('Размер изображений', 'vinyasa'),
				'options'  => array(
					'thumbnail' => 'Миниатюра',
					'medium' => 'Средняя',
					'large' => 'Большая',
					'full' => 'Полный размер',
				),
				'default'  => 'medium',
			),
		),
	)
);
//instructors END

/* Gallery START */
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Галерея', 'vinyasa'),
		'id'               => 'gallery',
		'icon'             => 'el el-picture',
		'fields'           => array(
			array(
				'id'       => 'gallery-title',
				'type'     => 'text',
				'title'    => esc_html__('Заголовок', 'vinyasa'),
			),
			array(
				'id'       => 'gallery-subtitle',
				'type'     => 'text',
				'title'    => esc_html__('Подзаголовок', 'vinyasa'),
			),
			array(
				'id'       => 'gallery-group',
				'type'     => 'gallery',
				'title'    => esc_html__('Фотографии', 'vinyasa'),
			),
			array(
				'id'       => 'gallery-count',
				'type'     => 'text',
				'title'    => esc_html__('Количество отображаемых изображении на главной странице', 'vinyasa'),
			),
			array(
				'id'       => 'gallery-button',
				'type'     => 'text',
				'title'    => esc_html__('Ссылка кнопки', 'vinyasa'),
			),
		),
	)
);
/* Gallery END */

/* FAQ start */
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('FAQ', 'Vinyasa'),
		'id'               => 'Faq',
		'customizer_width' => '400px',
		'icon'             => 'el el-question',

		'fields'           => array(

			array(
				'id' => 'faq-title',
				'type' => 'text',
				'placeholder' => esc_html__('Заголовок', 'vinyasa'),
			),
			array(
				'id' => 'faq-sub-title',
				'type' => 'text',
				'placeholder' => esc_html__('Подзаголовок', 'vinyasa'),
			),
			array(
				'id'          => 'faq-repeater',
				'type'        => 'repeater',
				'title' => esc_html__('FAQ', 'vinyasa'),
				'limit' => 10,
				'sortable' => true,
				'group_values' => true,
				'fields'         => array(
					array(
						'id'          => 'question',
						'type'        => 'text',
						'placeholder' => esc_html__('Вопрос', 'vinyasa'),
					),
					array(
						'id'          => 'answer',
						'type'        => 'textarea',
						'placeholder' => esc_html__('Ответ', 'vinyasa'),
					)
				),
			)
		)
	)
);


/* FAQ end */
/* Reviews start */
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('Reviews', 'Vinyasa'),
		'id'               => 'Reviews',
		'customizer_width' => '400px',
		'icon'             => 'el el-star',
		'fields'           => array(

			array(
				'id' => 'reviews-title',
				'type' => 'text',
				'placeholder' => esc_html__('Заголовок', 'vinyasa'),
			),
			array(
				'id' => 'reviews-sub-title',
				'type' => 'text',
				'placeholder' => esc_html__('Подзаголовок', 'vinyasa'),
			),
			array(
				'id'             => 'reviews-repeater',
				'type'           => 'repeater',
				'title'          => esc_html__('Отзывы', 'vinyasa'),
				'limit'        => 10,
				'group_values' => true,
				'sortable'     => true,
				'fields'         => array(
					array(
						'id'          => 'name',
						'type'        => 'text',
						'placeholder' => esc_html__('Имя', 'vinyasa'),
					),
					array(
						'id'          => 'avatar',
						'type'        => 'media',
						'placeholder' => esc_html__('Изображение', 'vinyasa'),
					),
					array(
						'id'          => 'review',
						'type'        => 'textarea',
						'placeholder' => esc_html__('Отзыв', 'vinyasa'),
					),
					array(
						'id'          => 'whatsapp',
						'type'        => 'text',
						'placeholder' => esc_html__('Whatsapp', 'vinyasa'),
					),
					array(
						'id'          => 'telegram',
						'type'        => 'text',
						'placeholder' => esc_html__('Telegram', 'vinyasa'),
					),
					array(
						'id'          => 'twitter',
						'type'        => 'text',
						'placeholder' => esc_html__('Twitter', 'vinyasa'),
					),
				),
			)
		)
	)
);

/* contacts start*/

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__('Контакты', 'vinyasa'),
		'id'         => 'contacts',
		'subsection' => false,
		'desc'       => esc_html__('Ссылки основного меню и подменю', 'vinyasa'),
		'icon'       => 'el el-envelope',
		'fields' => array(
			array(
				'id' => 'contacts-background',
				'type' => 'media',
				'title' => esc_html__('Фоновое изображение', 'vinyasa'),
				'placeholder' => esc_html__('Фоновое изображение', 'vinyasa'),
			),
			array(
				'id' => 'contacts-title',
				'type' => 'text',
				'title' => esc_html__('Заголовок', 'vinyasa'),
				'placeholder' => esc_html__('Заголовок', 'vinyasa'),
			),
			array(
				'id' => 'contacts-subtitle',
				'type' => 'text',
				'placeholder' => esc_html__('Подзаголовок', 'vinyasa'),
				'title' => esc_html__('Подзаголовок', 'vinyasa'),
			),
			array(
				'id' => 'contacts-shortcode',
				'type' => 'text',
				'placeholder' => esc_html__('Шорткод формы', 'vinyasa'),
				'title' => esc_html__('Шорткод формы', 'vinyasa'),
				'description' => esc_html__('Шорткод используется для вставки в плагине ContactForm', 'vinyasa'),
			),
			array(
				'id' => 'contacts-r-title',
				'type' => 'text',
				'placeholder' => esc_html__('Заголовок справа', 'vinyasa'),
				'title' => esc_html__('Заголовок справа', 'vinyasa'),
			),
			array(
				'id' => 'contacts-phone',
				'type' => 'text',
				'placeholder' => esc_html__('Телефон', 'vinyasa'),
				'title' => esc_html__('Телефон', 'vinyasa'),
			),
			array(
				'id' => 'contacts-adress',
				'type' => 'text',
				'placeholder' => esc_html__('Адрес', 'vinyasa'),
				'title' => esc_html__('Адрес', 'vinyasa'),
			),
			array(
				'id' => 'contacts-email',
				'type' => 'text',
				'placeholder' => esc_html__('Email', 'vinyasa'),
				'title' => esc_html__('Email', 'vinyasa'),
			),
			array(
				'id' => 'contacts-map',
				'type' => 'textarea',
				'placeholder' => esc_html__('Карта', 'vinyasa'),
				'title' => esc_html__('Карта', 'vinyasa'),
			),


		)
	)
);
/* contacts end*/

/* Reviews end */

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 is necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section.
// It can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if (! function_exists('compiler_action')) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler => true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values that have changed since last save.
	 */
	function compiler_action(array $options, string $css, array $changed_values)
	{
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r($changed_values); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if (! function_exists('redux_validate_callback_function')) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function(array $field, $value, $existing_value): array
	{
		$error   = false;
		$warning = false;

		// Do your validation.
		if (1 === (int) $value) {
			$error = true;
			$value = $existing_value;
		} elseif (2 === (int) $value) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if (true === $error) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if (true === $warning) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if (! function_exists('dynamic_section')) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section(array $sections): array
	{
		$sections[] = array(
			'title'  => esc_html__('Section via hook', 'vinyasa'),
			'desc'   => '<p class="description">' . esc_html__('This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'vinyasa') . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if (! function_exists('change_arguments')) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments(array $args): array
	{
		$args['dev_mode'] = true;

		return $args;
	}
}

if (! function_exists('change_defaults')) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults(array $defaults): array
	{
		$defaults['str_replace'] = esc_html__('Testing filter hook!', 'vinyasa');

		return $defaults;
	}
}

if (! function_exists('redux_custom_sanitize')) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize(string $value): string
	{
		$return = '';

		foreach (explode(' ', $value) as $w) {
			foreach (str_split($w) as $k => $v) {
				if (($k + 1) % 2 !== 0 && ctype_alpha($v)) {
					$return .= mb_strtoupper($v);
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
// phpcs:enable
