<?php
/**
 * The template for displaying the footer.
 *
*/
?>

    <!-- FOOTER -->
    <footer>
        <!-- FOOTER TOP -->
        <div class="row footer-top">
            <div class="container">
            <?php          
                //FOOTER ROW #1
                echo xgymwp_footer_row1();
                //FOOTER ROW #2
                echo xgymwp_footer_row2();
                //FOOTER ROW #3
                echo xgymwp_footer_row3();
             ?>
            </div>
        </div>

        <!-- FOOTER BOTTOM -->
        <div class="row footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="social-links">
                            <?php if ( xgymwp_redux('mt_social_fb') && xgymwp_redux('mt_social_fb') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_fb') ) ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_tw') && xgymwp_redux('mt_social_tw') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_tw') ) ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_gplus') && xgymwp_redux('mt_social_gplus') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_youtube') && xgymwp_redux('mt_social_youtube') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_youtube') ) ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_pinterest') && xgymwp_redux('mt_social_pinterest') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_pinterest') ) ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_linkedin') && xgymwp_redux('mt_social_linkedin') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_linkedin') ) ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_skype') && xgymwp_redux('mt_social_skype') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_skype') ) ?>"><i class="fa fa-skype"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_instagram') && xgymwp_redux('mt_social_instagram') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_instagram') ) ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_dribbble') && xgymwp_redux('mt_social_dribbble') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_dribbble') ) ?>"><i class="fa fa-dribbble"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_deviantart') && xgymwp_redux('mt_social_deviantart') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_deviantart') ) ?>"><i class="fa fa-deviantart"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_digg') && xgymwp_redux('mt_social_digg') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_digg') ) ?>"><i class="fa fa-digg"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_flickr') && xgymwp_redux('mt_social_flickr') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_flickr') ) ?>"><i class="fa fa-flickr"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_stumbleupon') && xgymwp_redux('mt_social_stumbleupon') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_stumbleupon') ) ?>"><i class="fa fa-stumbleupon"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_tumblr') && xgymwp_redux('mt_social_tumblr') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_tumblr') ) ?>"><i class="fa fa-tumblr"></i></a></li>
                            <?php } ?>
                            <?php if ( xgymwp_redux('mt_social_vimeo') && xgymwp_redux('mt_social_vimeo') != '' ) { ?>
                                <li><a href="<?php echo esc_url( xgymwp_redux('mt_social_vimeo') ) ?>"><i class="fa fa-vimeo-square"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="copyright"><?php echo wp_kses_post(xgymwp_redux('mt_footer_text')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>



<?php wp_footer(); ?>
</body>
</html>