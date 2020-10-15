<?php
/**
* Plugin Name: ModelTheme Framework
* Plugin URI: http://modeltheme.com/
* Description: ModelTheme Framework required by MODELTHEME Theme.
* Version: 1.5
* Author: ModelTheme
* Author http://modeltheme.com/
* Text Domain: smartowl
*/


$plugin_dir = plugin_dir_path( __FILE__ );





/**

||-> Function: Dynamic Featured Image for 'portfolio' CPT only

*/
function modeltheme_allowed_post_types() {
    return array('portfolio'); //show DFI only in post
}
add_filter('dfi_post_types', 'modeltheme_allowed_post_types');





/**
||-> Function: ModelTheme Feed
*/
add_action('wp_dashboard_setup', 'modeltheme_dashboard_widgets');
function modeltheme_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('modeltheme_posts_feed', 'ModelTheme Feed', 'modeltheme_custom_dashboard_help');
}

function modeltheme_custom_dashboard_help() {
    echo '<div class="rss-widget">';
        wp_widget_rss_output(array(
             'url'          => 'http://modeltheme.com/feed/',
             'title'        => 'MODELTHEME_FEED',
             'items'        => 5,
             'show_summary' => 1,
             'show_author'  => 0,
             'show_date'    => 1
        ));
    echo '</div>';
}





/**
||-> Function: require_once() plugin necessary parts
*/
require_once('inc/post-types/post-types.php'); // POST TYPES
require_once('inc/shortcodes/shortcodes.php'); // SHORTCODES
require_once('inc/widgets/widgets.php'); // WIDGETS
require_once('inc/metaboxes/metaboxes.php'); // METABOXES
require_once('inc/demo-importer-v2/wbc907-plugin-example.php');
require_once('inc/dynamic-featured-image/dynamic-featured-image.php'); // DYNAMIC FEATURED IMAGE
require_once('inc/mega-menu/modeltheme-mega-menu.php'); // MEGA MENU
require_once('inc/sb-google-maps-vc-addon/sb-google-maps-vc-addon.php'); // GMAPS




/**

||-> Function: LOAD PLUGIN TEXTDOMAIN

*/
function modeltheme_load_textdomain(){
    $domain = 'modeltheme';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

    load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
    load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'modeltheme_load_textdomain' );




/**

||-> Function: modeltheme_framework()

*/
function modeltheme_framework() {
    // CSS
    wp_register_style( 'style-shortcodes-inc',  plugin_dir_url( __FILE__ ) . 'inc/shortcodes/shortcodes.css' );
    wp_enqueue_style( 'style-shortcodes-inc' );
    wp_register_style( 'style-mt-mega-menu',  plugin_dir_url( __FILE__ ) . 'css/mt-mega-menu.css' );
    wp_enqueue_style( 'style-mt-mega-menu' );
    
    // SCRIPTS
    wp_enqueue_script( 'lazyload', plugin_dir_url( __FILE__ ) . 'js/jquery.lazyload.min.js', array(), '1.9.3', true );
    wp_enqueue_script( 'js-modeltheme-modernizr-custom', plugin_dir_url( __FILE__ ) . 'js/perspective-slider/modernizr.custom.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-classie', plugin_dir_url( __FILE__ ) . 'js/perspective-slider/classie.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-members-main', plugin_dir_url( __FILE__ ) . 'js/mt-members-fancy/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-main', plugin_dir_url( __FILE__ ) . 'js/perspective-slider/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-mt-plugins', plugin_dir_url( __FILE__ ) . 'js/mt-plugins.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-events-mobile-custom', plugin_dir_url( __FILE__ ) . 'js/mt-events/jquery.mobile.custom.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-events-main', plugin_dir_url( __FILE__ ) . 'js/mt-events/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-members-dynamics', plugin_dir_url( __FILE__ ) . 'js/mt-members-fancy/dynamics.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-mt-jobs-snap-js', plugin_dir_url( __FILE__ ) . 'js/mt-jobs/snap.svg-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'percircle', plugin_dir_url( __FILE__ ) . 'js/mt-skills-circle/percircle.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-custom', plugin_dir_url( __FILE__ ) . 'js/modeltheme-custom.js', array(), '1.0.0', true );

    wp_enqueue_script( 'magnific-popup', plugin_dir_url( __FILE__ ) . 'js/mt-video/jquery.magnific-popup.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'modeltheme_framework' );




/**

||-> Function: modeltheme_enqueue_admin_scripts()

*/
function modeltheme_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( 'js-modeltheme-admin-custom', plugin_dir_url( __FILE__ ) . 'js/modeltheme-custom-admin.js', array(), '1.0.0', true );
    // CSS
    wp_register_style( 'css-modeltheme-custom',  plugin_dir_url( __FILE__ ) . 'css/modeltheme-custom.css' );
    wp_enqueue_style( 'css-modeltheme-custom' );
    wp_register_style( 'css-fontawesome-icons',  plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css' );
    wp_enqueue_style( 'css-fontawesome-icons' );
    wp_register_style( 'css-simple-line-icons',  plugin_dir_url( __FILE__ ) . 'css/simple-line-icons.css' );
    wp_enqueue_style( 'css-simple-line-icons' );

}
add_action('admin_enqueue_scripts', 'modeltheme_enqueue_admin_scripts');




    
    

add_image_size( 'mt_1250x700', 1250, 700, true );
add_image_size( 'mt_320x480', 320, 480, true );
add_image_size( 'mt_900x550', 900, 550, true );




/**

||-> Function: modeltheme_cmb_initialize_cmb_meta_boxes

*/
function modeltheme_cmb_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once ('init.php');
}
add_action( 'init', 'modeltheme_cmb_initialize_cmb_meta_boxes', 9999 );



/**

||-> Function: modeltheme_cmb_initialize_cmb_meta_boxes

*/
function modeltheme_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}




if (!function_exists('xgymwp_RemoveDemoModeLink')) {
    // |---> REDUX FRAMEWORK
    function xgymwp_RemoveDemoModeLink() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
        }
    }
    add_action('init', 'xgymwp_RemoveDemoModeLink');
}


if (!function_exists('GambitVCParallaxBackgrounds')) {
    // |---> VC Parallax Notices
    if ( class_exists('GambitVCParallaxBackgrounds') ) {
        defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) or define( 'GAMBIT_DISABLE_RATING_NOTICE', true );
    }
}


if(!function_exists('xgymwp_sharer')){
    function xgymwp_sharer($tooltip_placement){

        $html = '';
        $html .= '<div class="article-social">
                    <ul class="social-sharer">
                        <li class="facebook">
                            <a data-toggle="tooltip" title="'.esc_attr__('Share on Facebook','xgymwp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.facebook.com/share.php?u='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-facebook"></i></a>
                        </li>
                        <li class="twitter">
                            <a data-toggle="tooltip" title="'.esc_attr__('Tweet on Twitter','xgymwp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://twitter.com/home?status='.get_the_title().'+'.get_permalink().'"><i class="icon-social-twitter"></i></a>
                        </li>
                        <li class="google-plus">
                            <a data-toggle="tooltip" title="'.esc_attr__('Share on G+','xgymwp').'" data-placement="'.esc_attr($tooltip_placement).'" href="https://plus.google.com/share?url='.get_permalink().'"><i class="icon-social-gplus"></i></a>
                        </li>
                        <li class="pinterest">
                            <a data-toggle="tooltip" title="'.esc_attr__('Pin on Pinterest','xgymwp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://pinterest.com/pin/create/bookmarklet/?media='.get_permalink().'&url='.get_permalink().'&is_video=false&description='.get_permalink().'"><i class="icon-social-pinterest"></i></a>
                        </li>
                        <li class="linkedin">
                            <a data-toggle="tooltip" title="'.esc_attr__('Share on LinkedIn','xgymwp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_permalink().'"><i class="icon-social-linkedin"></i></a>
                        </li>
                        <li class="reddit">
                            <a data-toggle="tooltip" title="'.esc_attr__('Share on Reddit','xgymwp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.reddit.com/submit?url='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-reddit"></i></a>
                        </li>
                        <li class="tumblr">
                            <a data-toggle="tooltip" title="'.esc_attr__('Share on Tumblr','xgymwp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.tumblr.com/share?v=3&amp;u='.get_permalink().'&amp;t='.get_the_title().'"><i class="icon-social-tumblr"></i></a>
                        </li>
                    </ul>
                </div>';

        return $html;
    }
}

/**

||-> ... Custom functions here ...

*/









?>