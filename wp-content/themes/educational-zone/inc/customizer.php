<?php
/**
 * Educational Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Educational Zone
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function educational_zone_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {

        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title',
            'render_callback' => 'educational_zone_customize_partial_blogname',
        ));
    }

    //welcome text
    $wp_customize->add_section('educational_zone_welcome_textmessage',array(
        'title' => esc_html__('Welcome text ','educational-zone'),
        'description' => esc_html__('Topbar content','educational-zone'),
    ));

    $wp_customize->add_setting('educational_zone_welcome_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('educational_zone_welcome_text',array(
        'label' => esc_html__('Welcome text','educational-zone'),
        'section' => 'educational_zone_welcome_textmessage',
        'setting' => 'educational_zone_welcome_text',
        'type'  => 'text'
    ));

    //social icons
    $wp_customize->add_section('educational_zone_social_icons',array(
        'title' => esc_html__('Social Icons ','educational-zone'),
        'description' => esc_html__('Topbar content','educational-zone'),
    ));

    $wp_customize->add_setting('educational_zone_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('educational_zone_facebook_url',array(
        'label' => esc_html__('Facebook link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('educational_zone_twitter_url',array(
        'label' => esc_html__('Twitter link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('educational_zone_youtube_url',array(
        'label' => esc_html__('Youtube link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_youtube_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_google_plus_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('educational_zone_google_plus_url',array(
        'label' => esc_html__('Google Plus link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_google_plus_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('educational_zone_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('educational_zone_linkedin_url',array(
        'label' => esc_html__('Linkedin link','educational-zone'),
        'section' => 'educational_zone_social_icons',
        'setting' => 'educational_zone_linkedin_url',
        'type'  => 'url'
    ));

    // Banner title
    $wp_customize->add_setting('header_banner_title_setting', array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __('Banner Title', 'educational-zone'),
        'section' => 'header_image',
        'settings' => 'header_banner_title_setting',
        'type' => 'text'
    )));

    // Banner description
    $wp_customize->add_setting('header_banner_description_setting', array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_description_setting', array(
        'label' => __('Banner description', 'educational-zone'),
        'section' => 'header_image',
        'settings' => 'header_banner_description_setting',
        'type' => 'text'
    )));

    // Banner button
    $wp_customize->add_setting('header_banner_button_setting', array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_button_setting', array(
        'label' => __('Banner button link', 'educational-zone'),
        'section' => 'header_image',
        'settings' => 'header_banner_button_setting',
        'type' => 'text'
    )));

    //Our Services section
    $wp_customize->add_section( 'educational_zone_services_section' , array(
        'title'      => __( 'Our Course Settings', 'educational-zone' ),
        'priority'   => null
    ) );

    $wp_customize->add_setting('educational_zone_section_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('educational_zone_section_title',array(
        'label' => __('Add Section Title','educational-zone'),
        'input_attrs' => array(
            'placeholder' => __( 'Our Course', 'educational-zone' ),
        ),
        'section'=> 'educational_zone_services_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('educational_zone_section_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('educational_zone_section_text',array(
        'label' => __('Add Section Text','educational-zone'),
        'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum is dummy text', 'educational-zone' ),
        ),
        'section'=> 'educational_zone_services_section',
        'type'=> 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('educational_zone_our_services',array(
        'default'   => 'select',
        'sanitize_callback' => 'educational_zone_sanitize_choices',
    ));
    $wp_customize->add_control('educational_zone_our_services',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Services','educational-zone'),
        'description' => __('Image Size (50 x 50)','educational-zone'),
        'section' => 'educational_zone_services_section',
    ));
    

    // Footer
    $wp_customize->add_section('site_footer_section', array(
        'title' => esc_html__('Footer', 'educational-zone'),
        'capability' => 'edit_theme_options',
    ));


    $wp_customize->add_setting('footer_text_setting', array(
        'type' => 'option', // or 'option'
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text_setting', array(
        'label' => __('Replace the footer text', 'educational-zone'),
        'section' => 'site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}

add_action('customize_register', 'educational_zone_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function educational_zone_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function educational_zone_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function educational_zone_customize_preview_js()
{
    wp_enqueue_script('educational-zone-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'educational_zone_customize_preview_js');



/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Educational_Zone_Customize {

    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {

        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }

        return $instance;
    }

    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {}

    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {

        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array( $this, 'sections' ) );

        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
    }

    /**
     * Sets up the customizer sections.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @return void
    */
    public function sections( $manager ) {

        // Load custom sections.
        load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

        // Register custom section types.
        $manager->register_section_type( 'Educational_Zone_Customize_Section_Pro' );
        
        // Register sections.
        $manager->add_section( new Educational_Zone_Customize_Section_Pro( $manager,'educational-zone', array(
            'priority'   => 1,
            'title'    => esc_html__( 'Educational Zone PRO', 'educational-zone' ),
            'pro_text' => esc_html__( 'UPGRADE PRO', 'educational-zone' ),
            'pro_url'  => esc_url('https://www.themagnifico.net/themes/education-wordpress-theme'),
        ) ) );
    }

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {

        wp_enqueue_script( 'educational-zone-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

        wp_enqueue_style( 'educational-zone-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
    }
}

// Doing this customizer thang!
Educational_Zone_Customize::get_instance();