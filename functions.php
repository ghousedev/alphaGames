<?php
/**
 * Alpha Games functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alpha_Games
 */

if (!function_exists('alphagames_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function alphagames_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Alpha Games, use a find and replace
		 * to change 'alphagames' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('alphagames', get_template_directory() . '/languages');

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
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'alphagames'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('alphagames_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'alphagames_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alphagames_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('alphagames_content_width', 640);
}
add_action('after_setup_theme', 'alphagames_content_width', 0);

function my_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="mdc-form-field mdc-typography" action="' . home_url('/') . '" >
		<div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
		<i class="material-icons mdc-text-field__icon">search</i>
		<input class="mdc-text-field__input" type="text" value="' . get_search_query() . '" name="s" id="s" />
		<div class="mdc-notched-outline">
		<div class="mdc-notched-outline__leading"></div>
		<div class="mdc-notched-outline__notch">
		<label class="mdc-floating-label">Search..</label>
		</div>
		<div class="mdc-notched-outline__trailing"></div>
		</div>
		</div>
		<button class="mdc-button search-button" type="submit" id="searchsubmit">' . esc_attr__('Search') . '</button>
		</form>';

	return $form;
}

function alpha_pagination($pages = '', $range = 5)
{
	$showitems = ($range * 2) + 1;

	global $paged;
	if (empty($paged)) $paged = 1;

	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}

	if (1 != $pages) {
		echo "<nav class='text-center'>\n\n<ul class='pagination mdc-list mdc-typography'>";
		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li class='mdc-list-item'><a href='" . get_pagenum_link(1) . "' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
		if ($paged > 1 && $showitems < $pages) echo "<li class='mdc-list-item'><a href='" . get_pagenum_link($paged - 1) . "' aria-label='Previous'><span aria-hidden='true'>&lsaquo;</span></a></li>";


		for ($i = 1; $i <= $pages; $i++) {
			if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
				echo ($paged == $i) ? "<li class='current mdc-list-item'><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>" : "<li class='mdc-list-item'><a href='" . get_pagenum_link($i) . "' class='inactive'>" . $i . "</a></li>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<li class='mdc-list-item'><a href='" . get_pagenum_link($paged + 1) . "' aria-label='Previous'><span aria-hidden='true'>&rsaquo;</span></a></li>";
		if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<li class='mdc-list-item'><a href='" . get_pagenum_link($pages) . "' aria-label='Previous'><span aria-hidden='true'>&raquo;</span></a></li>";
		echo "</ul>\n</nav>";
	}
}

add_filter('get_search_form', 'my_search_form', 100);

add_action('pre_get_posts', 'my_change_sort_order');
function my_change_sort_order($query)
{
	if (is_post_type_archive('facebook_events')) :
		$query->set('orderby', 'meta_value_num');
		$query->set('meta_key', 'start_ts');
		$query->set('order', 'ASC');
	endif;
	if (is_post_type_archive('previous_events')) :
		$query->set('orderby', 'meta_value_num');
		$query->set('meta_key', 'start_ts');
		$query->set('order', 'DESC');
	endif;
	wp_reset_postdata();
};
function front_page_order($query)
{
	if (is_front_page()) :
		$query->set('orderby', 'meta_value_num');
		$query->set('meta_key', 'start_ts');
		$query->set('order', 'ASC');
	endif;
	wp_reset_postdata();
};
add_action('pre_get_posts', 'front_page_order');
function previous_events_autofill()
{
	$args = array(
		'post_type' => 'facebook_events',
		'post_status' => 'publish',
		'nopaging'		=> 'true',
		'order'		=> 'ASC'
	);
	$myposts = new WP_Query($args);
	while ($myposts->have_posts()) : $myposts->the_post();
		$postid = get_the_ID();
		$now = time();
		$eventtimestamp = get_post_meta($postid, 'start_ts', true);		
		if ($now > $eventtimestamp) :
			$content = get_the_content();
			strip_shortcodes($content);
			$updateargs = array(
				'ID' => ''	.	$postid	  .	 '',
				'post_type' => 'previous_events'
			);
			wp_update_post($updateargs);
			else : 
		endif;
	endwhile;
	wp_reset_postdata();
}
add_action('check_event_expired', 'previous_events_autofill');
if (!wp_next_scheduled('check_event_expired')) :
	wp_schedule_single_event(time() + 3600, 'check_event_expired');
endif;

function console_log($output, $with_script_tags = true)
{
	$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
		');';
	if ($with_script_tags) {
		$js_code = '<script>' . $js_code . '</script>';
	}
	echo $js_code;
}

// Register Custom Post Type
function custom_post_type()
{

	$labels = array(
		'name'                  => _x('Previous Events', 'Post Type General Name', 'alphagames'),
		'singular_name'         => _x('Past Event', 'Post Type Singular Name', 'alphagames'),
		'menu_name'             => __('Past Events', 'alphagames'),
		'name_admin_bar'        => __('Past Events', 'alphagames'),
		'archives'              => __('Item Archives', 'alphagames'),
		'attributes'            => __('Item Attributes', 'alphagames'),
		'parent_item_colon'     => __('Parent Item:', 'alphagames'),
		'all_items'             => __('All Items', 'alphagames'),
		'add_new_item'          => __('Add New Item', 'alphagames'),
		'add_new'               => __('Add New', 'alphagames'),
		'new_item'              => __('New Item', 'alphagames'),
		'edit_item'             => __('Edit Item', 'alphagames'),
		'update_item'           => __('Update Item', 'alphagames'),
		'view_item'             => __('View Item', 'alphagames'),
		'view_items'            => __('View Items', 'alphagames'),
		'search_items'          => __('Search Item', 'alphagames'),
		'not_found'             => __('Not found', 'alphagames'),
		'not_found_in_trash'    => __('Not found in Trash', 'alphagames'),
		'featured_image'        => __('Featured Image', 'alphagames'),
		'set_featured_image'    => __('Set featured image', 'alphagames'),
		'remove_featured_image' => __('Remove featured image', 'alphagames'),
		'use_featured_image'    => __('Use as featured image', 'alphagames'),
		'insert_into_item'      => __('Insert into item', 'alphagames'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'alphagames'),
		'items_list'            => __('Items list', 'alphagames'),
		'items_list_navigation' => __('Items list navigation', 'alphagames'),
		'filter_items_list'     => __('Filter items list', 'alphagames'),
	);
	$args = array(
		'label'                 => __('Past Event', 'alphagames'),
		'description'           => __('Events held in the past', 'alphagames'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'previous_events',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type('previous_events', $args);
}
add_action('init', 'custom_post_type', 0);

include get_template_directory() . '/widgets/custom-widgets.php';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alphagames_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar Left', 'alphagames'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'alphagames'),
		'before_widget' => '<section id="%1$s" class="widget %2$s mdc-typography">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title mdc-typography mdc-typography--headline6">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name' 			=> __('Sidebar Right', 'alphagames'),
		'id' 			=> 'sidebar-2',
		'before_title'  => '<h2 class="widget-title mdc-typography mdc-typography--headline6">',
		'after_title'   => '</h2>'
	));

	register_widget('wpse97411_Widget_Recent_Posts');

	register_widget('wpse97411_Widget_Categories');
}
add_action('widgets_init', 'alphagames_widgets_init');



/**
 * Enqueue scripts and styles.
 */
function alphagames_scripts()
{
	wp_enqueue_style('alphagames-style', get_stylesheet_uri());

	wp_enqueue_style('material-components-web', get_template_directory_uri() . '/bundle.css');

	wp_enqueue_style('left-right-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css');

	wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');

	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');

	wp_enqueue_style('google-fonts-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500');

	wp_enqueue_style('aos-styles', 'https://unpkg.com/aos@next/dist/aos.css');

	wp_enqueue_script('swiper', 'https://unpkg.com/aos@next/dist/aos.js', array(), '', true);

	wp_enqueue_script('material-components-web-js', get_template_directory_uri() . '/bundle.js', array(), '', true);

	wp_enqueue_script('alphagames-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

	wp_enqueue_script('alphagames-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'alphagames_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
