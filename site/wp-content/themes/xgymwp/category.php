<?php
/**
 * The template for displaying categories results pages.
 *
 */

get_header(); 



$class = "";
if ( xgymwp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "row";
}elseif ( xgymwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or xgymwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "col-md-9";
}
$sidebar = xgymwp_redux('mt_blog_layout_sidebar');
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo xgymwp_header_title_breadcrumbs(); ?>


<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="container blog-posts">
        <div class="row">

            <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                <?php if ( xgymwp_redux('mt_blog_layout') != '' && xgymwp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                    <div class="col-md-3 sidebar-content"><?php dynamic_sidebar( $sidebar ); ?></div>
                <?php } ?>
            <?php } ?>


            <div class="<?php echo esc_attr($class); ?> main-content">
                <?php if ( have_posts() ) : ?>
                    <div class="row">
                        <?php /* Start the Loop */ ?>
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', 'post' ); ?>
                        <?php endwhile; ?>

                        <!-- PAGINATION -->
                        <div class="modeltheme-pagination-holder col-md-12">             
                            <div class="modeltheme-pagination pagination">             
                                <?php xgymwp_pagination(); ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
            </div>

            <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                <?php if ( xgymwp_redux('mt_blog_layout') != '' && xgymwp_redux('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                    <div class="col-md-3 sidebar-content"><?php dynamic_sidebar( $sidebar ); ?></div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>