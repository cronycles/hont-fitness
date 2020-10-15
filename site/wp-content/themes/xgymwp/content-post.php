<?php 
$master_class = 'col-md-12';
$type_class = 'list-view';

if ( xgymwp_redux('mt_blog_display_type') == 'list' ) {
    $master_class = 'col-md-12';
    $type_class = 'list-view';
} else {
    if ( xgymwp_redux('mt_blog_grid_columns') == 1 ) {
        $master_class = 'col-md-12';
        $type_class .= ' grid-one-column';
    }elseif ( xgymwp_redux('mt_blog_grid_columns') == 2 ) {
        $master_class = 'col-md-6';
        $type_class .= ' grid-two-columns';
    }elseif ( xgymwp_redux('mt_blog_grid_columns') == 3 ) {
        $master_class = 'col-md-4';
        $type_class .= ' grid-three-columns';
    }elseif ( xgymwp_redux('mt_blog_grid_columns') == 4 ) {
        $master_class = 'col-md-3';
        $type_class .= ' grid-four-columns';
    }
}

// THUMBNAIL
$post_img = '';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'xgymwp_about_625x415' );
if ($thumbnail_src) {
    $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.get_the_title().'" />';
    $post_col = 'col-md-6';
}else{
    $post_col = 'col-md-12 no-featured-image';
}
?>


<!-- SINGLE ARTICLE -->
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post '.$master_class.' '.$type_class); ?> > 
    <div class="blog_custom">
        <?php if ($post_img) { ?>
            <!-- POST THUMBNAIL -->
            <div class="col-md-6 post-thumbnail">
                <a href="<?php the_permalink(); ?>" class="relative">
                    <?php echo wp_kses_post($post_img); ?>
                </a>
            </div>
        <?php } ?>

        <!-- POST DETAILS -->
        <div class="<?php echo esc_attr($post_col); ?> post-details">

            <h3 class="post-name row">
                <a title="<?php the_title_attribute() ?>" href="<?php the_permalink(); ?>">
                    <?php if(is_sticky(get_the_ID())){ ?>
                        <span class="post-sticky-label">
                            <i class="fa fa-bookmark"></i>
                        </span>
                    <?php } ?>
                    <?php the_title() ?>
                </a>
            </h3>
            
            <div class="post-category-comment-date row">
                <div class="post-date">
                    <a title="<?php the_title_attribute() ?>" href="<?php the_permalink(); ?>">
                        <i class="icon-calendar"></i>
                        <span class="blog_date"><?php echo get_the_date(); ?></span>
                    </a>
                </div>
                <span class="post-tags">
                    <?php echo get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i>', ', ' ); ?>
                </span>
                <span class="post-author"><i class="icon-user icons"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo get_the_author(); ?></a></span>
                <span class="post-comments"><i class="icon-bubbles icons"></i><a href="<?php echo the_permalink().'#comments'; ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>  
            </div>

            <div class="post-excerpt row">
                <p>
                    <?php
                        /* translators: %s: Name of current post */
                        the_excerpt();
                    ?>
                </p>
                <p><a href="<?php the_permalink(); ?>" class="more-link"><?php echo esc_html__( 'Read More ', 'xgymwp' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xgymwp' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div>
        </div>
    </div>
</article>