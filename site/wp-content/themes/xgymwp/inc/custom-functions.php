<?php
//GET HEADER TITLE/BREADCRUMBS AREA
function xgymwp_header_title_breadcrumbs(){

    $html = '';
    $html .= '<div class="header-title-breadcrumb relative">';
        $html .= '<div class="header-title-breadcrumb-overlay text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 text-left">';
                                    if (is_single()) {
                                        $html .= '<ol class="breadcrumb text-left">'.xgymwp_breadcrumb().'</ol> ';
                                    }elseif (is_page()) {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }elseif (is_search()) {
                                        $html .= '<h1>'.esc_attr__( 'Search Results for: ', 'xgymwp' ) . get_search_query().'</h1>';
                                    }elseif (is_category()) {
                                        $html .= '<h1>'.esc_attr__( 'Category: ', 'xgymwp' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                                    }elseif (is_tag()) {
                                        $html .= '<h1>'.esc_attr__( 'Tag Archives: ', 'xgymwp' ) . single_tag_title( '', false ).'</h1>';
                                    }elseif (is_author() || is_archive()) {
                                        $html .= '<h1>'.get_the_archive_title() . get_the_archive_description().'</h1>';
                                    }elseif (is_home()) {
                                        $html .= '<h1>'.esc_attr__( 'From the Blog', 'xgymwp' ).'</h1>';
                                    }else {
                                        $html .= '<h1>'.get_the_title().'</h1>';
                                    }
                      $html .= '</div>
                                <div class="col-md-5">';
                                    if (!is_single()) {
                                        $html .= '<ol class="breadcrumb text-right">'.xgymwp_breadcrumb().'</ol>';
                                    }
                                $html .= '</div>
                            </div>
                        </div>
                    </div>';

    $html .= '</div>';
    $html .= '<div class="clearfix"></div>';

    return $html;
}


if ( function_exists('modeltheme_framework')) {
    function xgymwp_dfi_ids($postID){
        global  $dynamic_featured_image;
        $featured_images = $dynamic_featured_image->get_featured_images( $postID );

        //Loop through the image to display your image
        if( !is_null($featured_images) ){

            $medias = array();

            foreach($featured_images as $images){
                $attachment_id = $images['attachment_id'];
                $medias[] = $attachment_id;
            }

            $ids = '';
            $len = count($medias);
            $i = 0;
            foreach($medias as $media){

                if ($i == $len - 1) {
                    $ids .= $media;
                }else{
                    $ids .= $media . ',';
                }

                $i++;

            }
        } 

        return $ids;
    }
}
?>