<?php 
/* ------------------------------------------------------------------
[Modeltheme - SHORTCODES]

[Table of contents]
    Recent Tweets
    Contact Form
    Recent Posts
    Featured Post with thumbnail
    Subscribe form
    Skill
    Google map
    Pricing tables
    Jumbot
    Alert
    Progress bars
    Custom content
    Responsive video (YouTube)
    Heading With Border
    Testimonials
    List group
    Thumbnails custom content
    Section heading with title and subtitle
    Section heading with title
    Heading with bottom border
    Call to action
    Blog posts
    Social Media
    Quotes
    Banner
    Our Services
    Quotes Slider
    Courses
------------------------------------------------------------------ */



include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


include_once( 'mt-members/mt-members-slider.php' ); # Members 01
include_once( 'mt-services/mt_custom_service.php' ); # Services 03
include_once( 'mt-contact/mt-contact01.php' );
include_once( 'mt-blog-posts/mt-blogpost01.php' ); # Blog Post
include_once( 'mt-testimonials/mt-testimonials01.php' ); # Testimonials 01
include_once( 'mt-testimonials/mt-testimonials02.php' ); # Testimonials 02
include_once( 'mt-clients/mt-clients.php' ); # Clients
include_once( 'mt-title-subtitle/mt-title-subtitle.php' ); # Title Subtitle
include_once( 'mt-social-icons/mt-social-icons.php' ); # Social Icons
include_once( 'mt-featured-post/mt-featured-post.php' ); # Featured Post
include_once( 'mt-skills/mt-skills.php' ); # Skills
include_once( 'mt-skills-circle/mt-skills-circle.php' ); # Skills Cricle
include_once( 'mt-pricing-tables/mt-pricing-tables.php' ); # Pricing Tables
include_once( 'mt-countdown/mt-countdown.php' ); # Countdown
include_once( 'mt-icon-list-item/mt-icon-list-item.php' ); # Mailchimp Subscribe Form
include_once( 'mt-typed-text/mt-typed-text.php' ); # Typed text
include_once( 'mt-video/mt-video.php' ); # Video
include_once( 'mt-mailchimp-subscribe-form/mt-mailchimp-subscribe-form.php' ); # Mailchimp Subscribe Form
include_once( 'mt-featured-product/mt-featured-product.php' ); # Featured Product





// BOOTSTRAP ELEMENTS
include_once( 'mt-bootstrap-alert/mt-bootstrap-alert.php' ); # Bootstrap Alerts
include_once( 'mt-bootstrap-jumbotron/mt-bootstrap-jumbotron.php' ); # Bootstrap Jumbotron
include_once( 'mt-bootstrap-panel/mt-bootstrap-panel.php' ); # Bootstrap Panel
include_once( 'mt-bootstrap-thumbnails-custom-content/mt-bootstrap-thumbnails-custom-content.php' ); # Bootstrap Thumbnails Custom Content
include_once( 'mt-bootstrap-listgroup/mt-bootstrap-listgroup.php' ); # Bootstrap List Group
include_once( 'mt-bootstrap-button/mt-bootstrap-button.php' ); # Bootstrap Buttons
include_once( 'mt-bubble-box/mt-bubble-box.php' ); # Bootstrap Buttons







    // AJAX PORTFOLIO
    function connection_ajax_portfolio() {
        echo '<script type="text/javascript">
                (function ($) {
                    \'use strict\';

                    jQuery(".get-portfolio-details").on( "click", function() {

                        var current_post_id = jQuery(this).parent().parent().find("input[name=\'post_id\']").val();

                        var data = jQuery(\'.form_portfolio\').serialize();
                        jQuery.ajax({
                            type: \'GET\',
                            url: "'.admin_url('admin-ajax.php').'",
                            dataType: \'text\',
                            data: {
                                action: \'mt_portfolio01\',
                                post_id: current_post_id
                            },
                            
                            complete: function( xhr, status ){
                                console.log("Request complete: " + status);
                            },
                            error: function( xhr, status, errorThrown ){
                                console.log("Request failed: " + status);
                            },
                            success: function( data, status, xhr ){

                                // console.log("Request success: " + data);
                                console.log("Request success: " + status);
                                // change the html 
                                jQuery(".result-" + current_post_id).addClass( \'visible\' );
                                jQuery(".result-" + current_post_id).hide().html( data ).slideDown(\'slow\');

                                jQuery(".result-" + current_post_id).parent().parent().addClass(\'visible\');


                                jQuery(".close-ajax-content i").on( "click", function() {
                                    console.log(jQuery(".close-ajax-content i").parent().parent().parent().parent().parent().removeClass(\'visible\'));
                                    jQuery(this).parent().parent().slideUp(\'slow\', function() { jQuery(this).remove(); } );
                                    console.log(jQuery(".close-ajax-content i").parent().parent().parent().removeClass(\'visible\'));
                                    console.log(jQuery(".close-ajax-content i").parent().parent().parent().parent().parent().removeClass(\'visible\'));
                                }) 
                            }
                        });
                    }) 

                } (jQuery) )
            </script>';
    }
    add_action( 'wp_footer', 'connection_ajax_portfolio' );


    // AJAX SERVICES
    function connection_ajax_services() {
        echo '<script type="text/javascript">
                (function ($) {
                    \'use strict\';

                    jQuery(".mt--services .single-service .plus-icon .icon-plus").on( "click", function() {


                        var current_post_id = jQuery(this).parent().parent().parent().parent().find("input[name=\'post_id\']").val();
                        var plus_icon = jQuery(this).parent();


                        var data = jQuery(\'.form_service\').serialize();
                        jQuery.ajax({
                            type: \'GET\',
                            url: "'.admin_url('admin-ajax.php').'",
                            dataType: \'text\',
                            data: {
                                action: \'mt_services\',
                                post_id: current_post_id
                            },
                            
                            complete: function( xhr, status ){
                                console.log("Request complete: " + status);
                            },
                            error: function( xhr, status, errorThrown ){
                                console.log("Request failed: " + status);
                            },
                            success: function( data, status, xhr ){
                                //console.log("Request success: " + data);

                                console.log("Request success: ");
                                jQuery(plus_icon).addClass(\'close-ajax\');

                                // Change the html 
                                jQuery(".result-" + current_post_id).hide().html( data ).slideDown(\'normal\');

                                // Close the ajax content
                                jQuery(\'.mt--services .single-service .plus-icon .icon-close\').on( "click", function() {
                                    //console.log(thissdfasdfasd);
                                    jQuery(this).parent().removeClass(\'close-ajax\');
                                    jQuery(this).parent().parent().parent().parent().find(\'.mt-ajax-content\').slideUp(\'normal\', function() { jQuery(this).remove(); } );
                                }) 
                            }
                        });
                    }) 

                } (jQuery) )
            </script>';
    }
    add_action( 'wp_footer', 'connection_ajax_services' );




/**

||-> JS_COMPOSER Register Shortcodes

*/
// check for plugin using plugin name
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    // REMOVE CV Shortcodes
    // vc_remove_element( "vc_progress_bar" );

} 







?>