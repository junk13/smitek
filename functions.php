<?php
/**
 * smitek functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package smitek
 */

add_action('wp_enqueue_scripts', 'theme_styles');
add_action('wp_enqueue_scripts', 'theme_scripts');
add_action( 'after_setup_theme', 'Mymenu');
add_action( 'init', 'register_post_types' );
add_action('widgets_init', 'register_my_widgets');

add_action('init', function() {
  add_rewrite_rule('(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top');
});

function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => "left_sidebar",
		'description'   => 'Описание сайдбара',
		'class'         => '',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n"
	) );
}

function register_post_types(){
	register_post_type('product', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Продукт',
			'singular_name'      => 'Продукты',
			'add_new'            => 'Добавить продукт',
			'add_new_item'       => 'Добавление продукта',
			'edit_item'          => 'Редактирование продукта', 
			'new_item'           => 'Новый продукта',
			'view_item'          => 'Смотреть продукт', 
			'search_items'       => 'Искать продукт', 
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '',
			'menu_name'          => 'Продукты', 
		),
		'description'         => 'Это продукты',
		'public'              => true,
		'publicly_queryable'  => true, 
		'exclude_from_search' => false, 
		'show_ui'             => true, 
		'show_in_menu'        => true, 
		'show_in_admin_bar'   => true, 
		'show_in_nav_menus'   => true, 
		'show_in_rest'        => true, 
		'rest_base'           => 4, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-gallery', 
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','excerpt'), 
		'taxonomies'          => array('taxproducts'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );

	register_post_type('news', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Новость',
			'singular_name'      => 'Новости',
			'add_new'            => 'Добавить новость',
			'add_new_item'       => 'Добавление новости',
			'edit_item'          => 'Редактирование новости', 
			'new_item'           => 'Новая новость',
			'view_item'          => 'Смотреть новость', 
			'search_items'       => 'Искать новость', 
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '',
			'menu_name'          => 'Новости', 
		),
		'description'         => 'Это новости',
		'public'              => true,
		'publicly_queryable'  => true, 
		'exclude_from_search' => false, 
		'show_ui'             => true, 
		'show_in_menu'        => true, 
		'show_in_admin_bar'   => true, 
		'show_in_nav_menus'   => true, 
		'show_in_rest'        => true, 
		'rest_base'           => 4, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-gallery', 
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','excerpt'), 
		'taxonomies'          => array(''),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );

}

add_action('init', 'create_taxonomy');

function create_taxonomy(){
	register_taxonomy('products', array('product'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Категория продуктов',
			'singular_name'     => 'Категория продуктов',
			'search_items'      => 'Найти категорию продуктов',
			'all_items'         => 'Все категории продуктов',
			'view_item '        => 'Посмотреть категорию продуктов',
			'parent_item'       => 'Родительская категория продуктов',
			'parent_item_colon' => 'Родительская категория продуктов:',
			'edit_item'         => 'Изменить категорию продуктов',
			'update_item'       => 'Обновить категорию продуктов',
			'add_new_item'      => 'Добавить категорию продуктов',
			'new_item_name'     => 'Новое имя категории продуктов',
			'menu_name'         => 'Типы категории продуктов',
		),
		'description'           => 'Используемые категории продуктов', 
		'public'                => true,
		'publicly_queryable'    => null, 
		'hierarchical'          => true,
		'rewrite' => array('hierarchical' => true)
	) );

}


function Mymenu() {
  register_nav_menu('top', 'Главное меню');
  register_nav_menu('bottom', 'Нижнее меню');
  add_theme_support( 'post-thumbnails');
  add_image_size( 'post_thumb', 1300, 500, true );
  add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
      function my_navigation_template( $template, $class ){
      return '
      <div class="pagination pag-news" role="navigation">
	     <ul>%3$s</ul>
	  </div>';
   }
}

add_filter( 'upload_mimes', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
	// разрешаем новые типы
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}


add_filter('request', 'true_smenit_request', 1, 1 );
 
function true_smenit_request( $query ){
 
	$taxonomia_name = 'products'; // укажите название таксономии здесь, это также могут быть рубрики category или метки post_tag
 
	// запросы для дочерних элементов будут отличаться, поэтому нам потребуется дополнительная проверка
	if( $query['attachment'] ) :
		$dochernia = true; // эту переменную задаём для себя, она нам потребуется дальше
		$urlyarlyk = $query['attachment']; // это ярлык данного термина/рубрики/метки
	else:
		$dochernia = false;
		$urlyarlyk = $query['name']; // как видите, здесь ярлык хранится в другой переменной запроса
	endif;
 
 
	$termin = get_term_by('slug', $urlyarlyk, $taxonomia_name); // получаем элемент таксономии по ярлыку
 
	if ( isset( $urlyarlyk ) && $termin && !is_wp_error( $termin )): // если такого элемента не существует, прекращаем выполнение кода
 
		// для страниц дочерних элементов код немного отличается
		if( $dochernia ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$urlyarlyk = $parent_term->slug . '/' . $urlyarlyk; // нам нужно получить полный путь, состоящий из ярлыка текущего элемента и всех его родителей
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}
 
		switch( $taxonomia_name ): // параметры запроса для рубрик и меток отличаются от других таксономий
			case 'category':{
				$query['category_name'] = $urlyarlyk;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $urlyarlyk;
				break;
			}
			default:{
				$query[$taxonomia_name] = $urlyarlyk;
				break;
			}
		endswitch;
 
	endif;
 
	return $query;
 
}
 
// смена самой ссылки
add_filter( 'term_link', 'true_smena_permalink', 10, 3 );
 
function true_smena_permalink( $url, $term, $taxonomy ){
 
	$taxonomia_name = 'products'; // название таксономии, тут всё понятно
	$taxonomia_slug = 'products'; // ярлык таксономии - зависит от параметра rewrite, указанного при создании и может отличаться от названия,
	// как например таксономия меток это post_tag, а ярлык по умолчанию tag
 
	// выходим из функции, если указанного ярлыка таксономии нет в URL или если название таксономии не соответствует
	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;
 
	$url = str_replace('/' . $taxonomia_slug, '', $url); // если мы ещё тут, выполняем замену в URL
 
	return $url;
}



function theme_styles() {
	wp_enqueue_style('animate', get_template_directory_uri() . '/libs/animate.css/animate.css');
	wp_enqueue_style('hamburgers', get_template_directory_uri() . '/libs/hamburgers-master/dist/hamburgers.min.css');
	wp_enqueue_style('bootstrap-reboot', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap-grid.min.css');
	wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap-reboot.min.css');
	wp_enqueue_style('jquery.fancybox', get_template_directory_uri() . '/libs/fancybox-master/dist/jquery.fancybox.min.css');
	wp_enqueue_style('styles', get_stylesheet_uri());
	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.min.css');
}

function theme_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/libs/jquery/dist/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'current-device', get_template_directory_uri() . '/libs/current-device-master/current-device.min.js', ['jquery'], null, true);
	wp_enqueue_script( 'query.easeScroll', get_template_directory_uri() . '/libs/jquery.easeScroll/jquery.easeScroll.js', ['jquery'], null, true);
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/libs/modernizr/modernizr.js', ['jquery'], null, true);
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/libs/WOW-master/dist/wow.min.js', ['jquery'], null, true);
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/libs/sticky-kit-master/dist/sticky-kit.min.js', ['jquery'], null, true);
	wp_enqueue_script( 'jquery.fancybox', get_template_directory_uri() . '/libs/fancybox-master/dist/jquery.fancybox.min.js', ['jquery'], null, true);
	wp_enqueue_script( 'viewport.jquery', get_template_directory_uri() . '/libs/viewport.jquery-master/viewport.jquery.js', ['jquery'], null, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', ['jquery'], null, true);

}

if ( ! function_exists( 'smitek_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function smitek_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on smitek, use a find and replace
		 * to change 'smitek' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'smitek', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'smitek_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'smitek_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function smitek_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'smitek_content_width', 640 );
}
add_action( 'after_setup_theme', 'smitek_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function smitek_scripts() {
	wp_enqueue_style( 'smitek-style', get_stylesheet_uri() );

	wp_enqueue_script( 'smitek-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'smitek-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'smitek_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

