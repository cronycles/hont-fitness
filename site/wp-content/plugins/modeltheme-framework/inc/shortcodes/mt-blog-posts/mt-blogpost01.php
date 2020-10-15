<?php 


/**

||-> Shortcode: BlogPos01

*/
function modeltheme_shortcode_blogpost01($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           =>'',
            'number'              =>'',
            'blog_post_day_color' =>'',
            'columns'             =>''
        ), $params ) );


    $html = '';
    $html .= '<div class="blog-posts blog-posts-shortcode wow '.$animation.'">';
    $html .= '<div class="row">';
    $args_blogposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish' 
            ); 
    $blogposts = get_posts($args_blogposts);

    foreach ($blogposts as $blogpost) {


        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ),'xgymwp_about_415x525' );
        
        $content_post   = get_post($blogpost->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);

        if ($thumbnail_src) {
            $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />';
            $post_col = 'col-md-12';
        }else{
            $post_col = 'col-md-12 no-featured-image';
            $post_img = '';
        }

      
          $html.='<div class="'.esc_attr($columns).'">
                      <article class="single-post list-view">
                        <div class="blog_custom">


                          <!-- POST THUMBNAIL -->
                          <div class="col-md-12 post-thumbnail">
                              <a class="relative" href="'.get_permalink($blogpost->ID).'">'.$post_img.'</a>
                          </div>





                          <!-- POST DETAILS -->
                          <div class="post-details '.$post_col.'">


                            <h3 class="post-name row">
                              <a href="'.get_permalink($blogpost->ID).'" title="'. $blogpost->post_title .'">'. $blogpost->post_title .'</a>
                            </h3>

                            <div class="post-category-comment-date row">
                              <div class="post-date">
                                  <a href="'.get_the_permalink().'">
                                      <i class="icon-calendar"></i>
                                      <span class="blog_date blog_day">'.get_the_date( "j" ).'</span>
                                      <span class="blog_date blog_month">'.get_the_date( "M" ).'</span>
                                  </a>
                              </div>

                                <span class="post-tags">
                                  '.get_the_term_list( $blogpost->ID, 'category', '<i class="icon-tag"></i>', ', ' ).'
                                </span>
                                <span class="post-author">
                                  <i class="icon-user icons"></i>
                                  <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a>
                                </span>
                            </div>


                            <div class="post-excerpt row">
                                <p>'.modeltheme_excerpt_limit($content, 33).'</p>
                                <div class="text-element content-element">
                                    <p> <a class="more-link" href="'.get_permalink($blogpost->ID).'">'.esc_attr__('Read More','modeltheme').'<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                          </div>

                          

                        </div>
                      </article>
                    </div>';

      }





    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('blogpost01', 'modeltheme_shortcode_blogpost01');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("MT - Blog Posts", 'modeltheme'),
     "base" => "blogpost01",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'modeltheme' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'modeltheme' )
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Columns"),
           "param_name" => "columns",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('2 columns')     => 'vc_col-sm-6',
            esc_attr__('3 columns')     => 'vc_col-sm-4'
           )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Choose blog post day color", 'modeltheme' ),
          "param_name" => "blog_post_day_color",
          "value" => '', //Default color
          "description" => esc_attr__( "Choose blog post day color", 'modeltheme' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
}

?>