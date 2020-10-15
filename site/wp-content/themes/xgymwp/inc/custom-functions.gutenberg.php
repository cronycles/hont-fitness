<?php
// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'xgymwp_add_gutenberg_assets' );
/**
 * Load Gutenberg stylesheet.
 */
function xgymwp_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'xgymwp-gutenberg-style', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), false );
    wp_enqueue_style( 
        'xgymwp-gutenberg-fonts', 
        '//fonts.googleapis.com/css?family=Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic%2Clatin-ext%2Clatin%7CMontserrat%3Aregular%2C700%2Clatin' 
    ); 
}
?>