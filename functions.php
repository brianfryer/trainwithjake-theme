<?php

/* =========================================================================== *
 *  Enqueue styles & scripts  *
 * ================= */

if (!function_exists('trainwithjake_load_styles_scripts')) {
    function trainwithjake_load_styles_scripts() {
        if (!is_admin()) {
            // Screen stylesheet
            wp_enqueue_style( 'trainwithjake_screen', get_template_directory_uri() . '/css/screen.css', null, null, 'screen' );
            // Modernizr
            wp_register_script('modernizr', get_template_directory_uri() . '/js/vendors/modernizr-2.6.2-respond-1.1.0.min.js', null, null );
            wp_enqueue_script('modernizr');
            // jQuery
            wp_deregister_script( 'jquery' );
            wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', null, null );
            wp_enqueue_script('jquery');
            // TypeKit
            wp_register_script('trainwithjake_typekit', '//use.typekit.net/bny7tcf.js', null, null );
            wp_enqueue_script('trainwithjake_typekit');
        }
    }
}
add_action( 'wp_enqueue_scripts', 'trainwithjake_load_styles_scripts' );

// TypeKit
if (!function_exists('typekit_inline')) {
    function trainwithjake_typekit_inline() {
        if ( wp_script_is( 'trainwithjake_typekit', 'done' ) ) { ?>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <?php }
    }
}
add_action( 'wp_head', 'trainwithjake_typekit_inline' );


/* =========================================================================== *
 *  Register navigation menus  *
 * =========================== */

if (!function_exists('wtrainwithjake_register_menus')) {
    function trainwithjake_register_menus() {
        register_nav_menus(
            array(
                'primary-nav' => __( 'Primary Navigation' ),
                'bottom-nav'  => __( 'Bottom Navigation' )
            )
        );
    }
}
add_action( 'init', 'trainwithjake_register_menus' );


/* =========================================================================== *
 *  Register widget ready areas  *
 * ============================= */

// Footer
if (!function_exists('register_sidebar')) {
    register_sidebar(array(
        'id'            => 'footer',
        'name'          => 'Footer',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}


/* =========================================================================== *
 *  Miscellaneous  *
 * =============== */

// Allow shortcodes to be used in widgets
add_filter('widget_text', 'do_shortcode');
