<?php
/**
 * Educational Zone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Educational Zone
 */

if ( ! function_exists( 'educational_zone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function educational_zone_setup() {
		
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

        add_image_size('educational-zone-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','educational-zone' ),
	        'footer'=>esc_html__( 'Footer Menu','educational-zone' ),
	        'social'=>esc_html__( 'Social Menu','educational-zone' ),
	        'top'=>esc_html__( 'Top Menu','educational-zone' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
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
		add_theme_support( 'custom-background', apply_filters( 'educational_zone_custom_background_args', array(
			'default-color' => 'f7f7f7',
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
			'height'      => 40,
			'width'       => 40,
			'flex-width'  => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'educational_zone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function educational_zone_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'educational_zone_content_width', 1170 );
}
add_action( 'after_setup_theme', 'educational_zone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function educational_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'educational-zone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'educational-zone' ),
        'before_widget' => '<section id="%1$s" class="widget card shadow-sm mb-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title card-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'educational_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function educational_zone_scripts() {
    // load bootstrap css
    wp_enqueue_style( 'educational-zone-flatly-css', get_template_directory_uri() . '/assets/css/flatly.css');

	// fontawesome
	wp_enqueue_style( 'educational-zone-fontawesome', get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_style( 'style', get_stylesheet_uri() );


    // load bootstrap js
    wp_enqueue_script('educational-zone-popper', get_template_directory_uri() . '/assets/js/popper.js', array(), '', true );
    wp_enqueue_script('educational-zone-bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '', true );
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '', true );
    
    wp_enqueue_script('themejs', get_template_directory_uri() . '/assets/js/theme-script.js', array(), '', true );

    wp_enqueue_script('educational-zone-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'educational_zone_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*radio button sanitization*/
function educational_zone_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function educational_zone_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'educational_zone_skip_link_focus_fix' );