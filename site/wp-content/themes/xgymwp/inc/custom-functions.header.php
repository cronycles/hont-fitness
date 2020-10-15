<?php
/**
CUSTOM HEADER FUNCTIONS
*/




/**
||-> FUNCTION: GET HEADER-TOP LEFT PART
*/
function xgymwp_get_top_left(){

    $html = '';
    $html .= '<a href="#"><i class="fa fa-phone"></i> +34-2345-3456</a>';

    return $html;
}



/**
||-> FUNCTION: GET HEADER-TOP RIGHT PART
*/
function xgymwp_get_top_right(){

    // CONTENT
    $html = '';
    $html .= '<a class="modeltheme-trigger" href="#"><i class="fa fa-lock"></i> '.esc_attr__('Log In', 'xgymwp').'</a>';

    return $html;
}





/**
Function name: 				xgymwp_get_nav_menu()			
Function description:		Get page NAV MENU
*/
function xgymwp_get_nav_menu(){

    // PAGE METAS
	$page_custom_menu = get_post_meta( get_the_ID(), 'smartowl_page_custom_menu', true );

	$html = '';
    if ( has_nav_menu( 'primary' ) ) {
		$defaults = array(
			'menu'            => '',
			'container'       => false,
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => false,
			'before'          => '<ul class="menu nav navbar-nav nav-effect nav-menu pull-right">',
			'after'           => '</ul>',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'          => ''
		);

		$defaults['theme_location'] = 'primary';
		if (isset($page_custom_menu)) {
			$html .= wp_nav_menu( array('menu' => $page_custom_menu ));
		}else{
			$html .= wp_nav_menu( $defaults );
		}
	}else{
		$html .= '<p class="no-menu text-right">'.esc_attr__('Primary navigation menu is missing. Add one from "Appearance" -> "Menus"','xgymwp').'<p>';
	}

    return $html;
}



/**
Function name: 				xgymwp_current_header_template()			
Function description:		Gets the current header variant from theme options. If page has custom options, theme options will be overwritten.
*/
function xgymwp_current_header_template(){

	global  $xgymwp_redux;


    // PAGE METAS
    $custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
	$sidebar_headers = array('header6', 'header7', 'header14', 'header15');


	$html = '';

    if (is_page() && $header_v) {
        if ($custom_header_activated && $custom_header_activated == 'yes') {
			if (!in_array($header_v, $sidebar_headers)){
            	$html .= get_template_part( 'templates/template-'.$header_v ); ?>

        	<?php }else{ ?>

        	<?php }
        }?>
    <?php }else{
    	if (isset($xgymwp_redux['mt_header_layout'])) {
			if (!in_array($header_v, $sidebar_headers)){
    			$html .= get_template_part( 'templates/template-'.$xgymwp_redux['mt_header_layout'] );
        	}
    	}else{
    		$html .= get_template_part( 'templates/template-header1' );
    	}
    }
    return $html;
}


/**
||-> FUNCTION: GET GOOGLE FONTS FROM THEME OPTIONS PANEL
*/
function xgymwp_get_site_fonts(){
    global  $xgymwp_redux;
    $fonts_string = '';
    if (isset($xgymwp_redux['mt_google_fonts_select'])) {
        $i = 0;
        $len = count($xgymwp_redux['mt_google_fonts_select']);
        foreach(array_keys($xgymwp_redux['mt_google_fonts_select']) as $key){
            $font_url = str_replace(' ', '+', $xgymwp_redux['mt_google_fonts_select'][$key]);
            
            if ($i == $len - 1) {
                // last
                $fonts_string .= $font_url;
            }else{
                $fonts_string .= $font_url . '|';
            }
            $i++;
        }
        // fonts url
        $fonts_url = add_query_arg( 'family', $fonts_string, "//fonts.googleapis.com/css" );
        // enqueue fonts
        wp_enqueue_style( 'xgym-fonts', $fonts_url, array(), '1.0.0' );
    }
}
add_action('wp_enqueue_scripts', 'xgymwp_get_site_fonts');


// Add specific CSS class by filter
add_filter( 'body_class', 'xgymwp_body_classes' );
function xgymwp_body_classes( $classes ) {

	global  $xgymwp_redux;


	// POST META FOOTER STATUS
    $row1_status = get_post_meta( get_the_ID(), 'mt_footer_row1_status', true );
    $row2_status = get_post_meta( get_the_ID(), 'mt_footer_row2_status', true );
    $row3_status = get_post_meta( get_the_ID(), 'mt_footer_row3_status', true );
    $footer_bottom_bar = get_post_meta( get_the_ID(), 'mt_footer_bottom_bar', true );
    $mt_page_preloader_status = get_post_meta( get_the_ID(), 'mt_page_preloader_status', true );

	$footers_row1_status = '';
	$footers_row2_status = '';
	$footers_row3_status = '';
	$footers_status = '';
	$page_preloader_status = '';

	if (is_single() || is_page()) {
		# code...
		if ($row1_status == 'on') {
			$footers_row1_status = 'footer_row1_off';
		}
		if ($row2_status == 'on') {
			$footers_row2_status = 'footer_row2_off';
		}
		if ($row3_status == 'on') {
			$footers_row3_status = 'footer_row3_off';
		}
		if ($footer_bottom_bar == 'on') {
			$footers_status = 'footer_bottom_bar_off';
		}
		if ($mt_page_preloader_status == 'on') {
			$page_preloader_status = 'page_preloader_off';
		}
	}
	

    // CHECK IF FEATURED IMAGE IS FALSE(Disabled)
    $post_featured_image = '';
    if (is_singular('post')) {
        if ($xgymwp_redux['mt_post_featured_image'] == false) {
            $post_featured_image = 'hide_post_featured_image';
        }else{
            $post_featured_image = '';
        }
    }

    // CHECK IF THE NAV IS STICKY
    $is_nav_sticky = '';
    if ($xgymwp_redux['mt_is_nav_sticky'] == true) {
        // If is sticky
        $is_nav_sticky = 'is_nav_sticky';
    }else{
        // If is not sticky
        $is_nav_sticky = '';
    }

    // CHECK IF HEADER IS SEMITRANSPARENT
    $semitransparent_header_meta = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
    $semitransparent_header = '';
    if ($semitransparent_header_meta == 'enabled') {
        // If is semitransparent
        $semitransparent_header = 'is_header_semitransparent';
    }

    // DIFFERENT HEADER LAYOUT TEMPLATES
    $header_status = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );

    $header_version = 'header1';
    if ($header_status && $header_status == 'no') {
	    $header_version = 'header1';
	    if ($xgymwp_redux['mt_header_layout']) {
	        // Header Layout #1
	        $header_version = $xgymwp_redux['mt_header_layout'];
	    }
    }else{
    	$header_version = $header_v;
    }

    // add 'class-name' to the $classes array
    $classes[] = $page_preloader_status . ' ' . $footers_status . ' ' . $footers_row1_status . ' ' . $footers_row2_status . ' ' . $footers_row3_status . ' ' . $post_featured_image . ' ' . $is_nav_sticky . ' ' . $header_version . ' ' . $semitransparent_header . ' ';
    // return the $classes array
    return $classes;

}

/**
||-> FUNCTION: GET DYNAMIC CSS
*/
add_action('wp_enqueue_scripts', 'xgymwp_dynamic_css' );
function xgymwp_dynamic_css(){

    $html = '';
    $html .= xgymwp_redux('mt_custom_css');

	wp_enqueue_style(
	   'xgymwp-custom-style',
	    get_template_directory_uri() . '/css/custom-editor-style.css'
	);

    //PAGE PRELOADER BACKGROUND COLOR
    $mt_page_preloader = get_post_meta( get_the_ID(), 'mt_page_preloader', true );
    $mt_page_preloader_bg_color = get_post_meta( get_the_ID(), 'mt_page_preloader_bg_color', true );
    if (isset($mt_page_preloader) && $mt_page_preloader == 'enabled' && isset($mt_page_preloader_bg_color)) {
        $html .= 'body .xgymwp_preloader_holder{
					background-color: '.$mt_page_preloader_bg_color.';
        		}';
    }elseif (xgymwp_redux('mt_preloader_status')) {
        $html .= 'body .xgymwp_preloader_holder{
					background-color: '.xgymwp_redux('mt_preloader_status').';
        		}';
    }

	// HEADER SEMITRANSPARENT - METABOX
	$custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
	$mt_header_custom_bg_color = get_post_meta( get_the_ID(), 'mt_header_custom_bg_color', true );
	$mt_header_semitransparent = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
    if (isset($mt_header_semitransparent) == 'enabled') {
		$mt_header_semitransparentr_rgba_value = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value', true );
		$mt_header_semitransparentr_rgba_value_scroll = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value_scroll', true );
		
		if (isset($mt_header_custom_bg_color)) {
			list($r, $g, $b) = sscanf($mt_header_custom_bg_color, "#%02x%02x%02x");
		}else{
			$hexa = '#04ABE9'; //Theme Options Color
			list($r, $g, $b) = sscanf($hexa, "#%02x%02x%02x");
		}

		$html .= '
			.is_header_semitransparent .navbar-default {
			    background: rgba('.$r.', '.$g.', '.$b.', '.$mt_header_semitransparentr_rgba_value.') none repeat scroll 0 0;
			}
			.is_header_semitransparent .sticky-wrapper.is-sticky .navbar-default {
			    background: rgba('.$r.', '.$g.', '.$b.', '.$mt_header_semitransparentr_rgba_value_scroll.') none repeat scroll 0 0;
			}';
    }


    // THEME OPTIONS STYLESHEET
    $html .= '
    		.breadcrumb a::after {
	        	content: "'.xgymwp_redux('mt_breadcrumbs_delimitator').'";
	    	}
		    .logo img,
		    .navbar-header .logo img {
		        max-width: '.xgymwp_redux('mt_logo_max_width').'px;
		    }

		    ::selection{
		        color: '.xgymwp_redux('mt_text_selection_color').';
		        background: '.xgymwp_redux('mt_text_selection_background_color').';
		    }
		    ::-moz-selection { /* Code for Firefox */
		        color: '.xgymwp_redux('mt_text_selection_color').';
		        background: '.xgymwp_redux('mt_text_selection_background_color').';
		    }

		    a{
		        color: '.xgymwp_redux('mt_global_link_styling', 'regular').';
		    }
		    a:focus,
		    a:visited,
		    a:hover{
		        color: '.xgymwp_redux('mt_global_link_styling', 'hover').';
		    }

		    /*------------------------------------------------------------------
		        COLOR
		    ------------------------------------------------------------------*/
		    a, 
		    a:hover, 
		    a:focus,
		    span.amount,
		    .widget_popular_recent_tabs .nav-tabs li.active a,
		    .widget_product_categories .cat-item:hover,
		    .widget_product_categories .cat-item a:hover,
		    .widget_archive li:hover,
		    .widget_archive li a:hover,
		    .widget_categories .cat-item:hover,
		    .widget_categories li a:hover,
		    .pricing-table.recomended .button.solid-button, 
		    .pricing-table .table-content:hover .button.solid-button,
		    .pricing-table.Recommended .button.solid-button, 
		    .pricing-table.recommended .button.solid-button, 
		    #sync2 .owl-item.synced .post_slider_title,
		    #sync2 .owl-item:hover .post_slider_title,
		    #sync2 .owl-item:active .post_slider_title,
		    .pricing-table.recomended .button.solid-button, 
		    .pricing-table .table-content:hover .button.solid-button,
		    .testimonial-author,
		    .testimonials-container blockquote::before,
		    .testimonials-container blockquote::after,
		    .post-author > a,
		    h2 span,
		    label.error,
		    .author-name,
		    .comment_body .author_name,
		    .prev-next-post a:hover,
		    .prev-text,
		    .wpb_button.btn-filled:hover,
		    .next-text,
		    .social ul li a:hover i,
		    .wpcf7-form span.wpcf7-not-valid-tip,
		    .text-dark .statistics .stats-head *,
		    .wpb_button.btn-filled,
		    footer ul.menu li.menu-item a:hover,
		    .widget_meta a:hover,
		    .widget_pages a:hover,
		    .simple_sermon_content_top h4,
		    .widget_recent_entries_with_thumbnail li:hover a,
		    .widget_recent_entries li a:hover,
		    .sidebar-content .widget_nav_menu li a:hover{
		        color: '.xgymwp_redux("mt_style_main_texts_color").'; /*Color: Main blue*/
		    }


		    /*------------------------------------------------------------------
		        BACKGROUND + BACKGROUND-COLOR
		    ------------------------------------------------------------------*/
		    .tagcloud > a:hover,
		    .modeltheme-icon-search,
		    .wpb_button::after,
		    .rotate45,
		    .latest-posts .post-date-day,
		    .latest-posts h3, 
		    .latest-tweets h3, 
		    .latest-videos h3,
		    .button.solid-button, 
		    button.vc_btn,
		    .pricing-table.recomended .table-content, 
		    .pricing-table .table-content:hover,
		    .pricing-table.Recommended .table-content, 
		    .pricing-table.recommended .table-content, 
		    .pricing-table.recomended .table-content, 
		    .pricing-table .table-content:hover,
		    .block-triangle,
		    .owl-theme .owl-controls .owl-page span,
		    body .vc_btn.vc_btn-blue, 
		    body a.vc_btn.vc_btn-blue, 
		    body button.vc_btn.vc_btn-blue,
		    .pagination .page-numbers.current,
		    .pagination .page-numbers:hover,
		    #subscribe > button[type=\'submit\'],
		    .social-sharer > li:hover,
		    .prev-next-post a:hover .rotate45,
		    .masonry_banner.default-skin,
		    .form-submit input,
		    .member-header::before, 
		    .member-header::after,
		    .member-footer .social::before, 
		    .member-footer .social::after,
		    .subscribe > button[type=\'submit\'],
		    .no-results input[type=\'submit\'],
		    h3#reply-title::after,
		    .newspaper-info,
		    .categories_shortcode .owl-controls .owl-buttons i:hover,
		    .widget-title:after,
		    h2.heading-bottom:after,
		    .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active,
		    #primary .main-content ul li:not(.rotate45)::before,
		    .wpcf7-form .wpcf7-submit,
		    ul.ecs-event-list li span,
		    #contact_form2 .solid-button.button,
		    .navbar-default .navbar-toggle .icon-bar,
		    .details-container > div.details-item .amount, .details-container > div.details-item ins,
		    .modeltheme-search .search-submit,
		    .pricing-table.recommended .table-content .title-pricing,
		    .pricing-table .table-content:hover .title-pricing,
		    .pricing-table.recommended .button.solid-button,
		    #navbar ul.sub-menu li a:hover,
		    .post-category-date a[rel="tag"],
		    #navbar .mt-icon-list-item:hover,
		    footer .mc4wp-form-fields input[type="submit"],
		    .pricing-table .table-content:hover .button.solid-button,
		    footer .footer-top .menu .menu-item a::before,
		    .post-password-form input[type=\'submit\'] {
		        background: '.xgymwp_redux("mt_style_main_backgrounds_color").';
		    }

		    .modeltheme-search.modeltheme-search-open .modeltheme-icon-search, 
		    .no-js .modeltheme-search .modeltheme-icon-search,
		    .modeltheme-icon-search:hover,
		    .latest-posts .post-date-month,
		    .button.solid-button:hover,
		    body .vc_btn.vc_btn-blue:hover, 
		    body a.vc_btn.vc_btn-blue:hover, 
		    .post-category-date a[rel="tag"]:hover,
		    .single-post-tags > a:hover,
		    body button.vc_btn.vc_btn-blue:hover,
		    #contact_form2 .solid-button.button:hover,
		    .subscribe > button[type=\'submit\']:hover,
		    footer .mc4wp-form-fields input[type="submit"]:hover,
		    .no-results input[type=\'submit\']:hover,
		    ul.ecs-event-list li span:hover,
		    .pricing-table.recommended .table-content .price_circle,
		    .pricing-table .table-content:hover .price_circle,
		    #modal-search-form .modal-content input.search-input,
		    .wpcf7-form .wpcf7-submit:hover,
		    .form-submit input:hover,
		    .pricing-table.recommended .button.solid-button:hover,
		    .error-return-home.text-center > a:hover,
		    .pricing-table .table-content:hover .button.solid-button:hover,
		    .post-password-form input[type=\'submit\']:hover {
		        background: '.xgymwp_redux('mt_style_main_backgrounds_color_hover').';
		    }
		    .tagcloud > a:hover{
		        background: '.xgymwp_redux('mt_style_main_backgrounds_color_hover').' !important;
		    }

		    .flickr_badge_image a::after,
		    .thumbnail-overlay,
		    .portfolio-hover,
		    .pastor-image-content .details-holder,
		    .item-description .holder-top,
		    blockquote::before {
		        background: '.xgymwp_redux("mt_style_semi_opacity_backgrounds", "alpha").';
		    }

		    /*------------------------------------------------------------------
		        BORDER-COLOR
		    ------------------------------------------------------------------*/
		    .comment-form input, 
		    .comment-form textarea,
		    .author-bio,
		    blockquote,
		    .widget_popular_recent_tabs .nav-tabs > li.active,
		    body .left-border, 
		    body .right-border,
		    body .member-header,
		    body .member-footer .social,
		    body .button[type=\'submit\'],
		    .navbar ul li ul.sub-menu,
		    .wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
		    #contact-us .form-control:focus,
		    .sale_banner_holder:hover,
		    .testimonial-img,
		    .wpcf7-form input:focus, 
		    .wpcf7-form textarea:focus,
		    .navbar-default .navbar-toggle:hover, 
		    .header_search_form,
		    .navbar-default .navbar-toggle{
		        border-color: '.xgymwp_redux("mt_style_main_texts_color").'; /*Color: Main blue */
		    }';

    wp_add_inline_style( 'xgymwp-custom-style', $html );
}
?>