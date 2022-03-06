<?php

// General scripts and styles
function scripts() {
    global $wp_styles; 

    // TOOD: minify
   // wp_enqueue_script( 'vendor-js', get_template_directory_uri() . '/dist/scripts/vendor.min.js', array( 'jquery' ), filemtime(get_template_directory() . '/dist/scripts/vendor.min.js'), true );
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/dist/scripts/scripts.min.js', array( 'jquery' ), filemtime(get_template_directory() . '/dist/scripts/scripts.min.js'), true );
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/dist/styles/theme.css', array(), filemtime(get_template_directory() . '/dist/styles/theme.css'), 'all' );
}
add_action('wp_enqueue_scripts', 'scripts', 999);


// Move jQuery to footer, 'group' is arbitrary
add_action( 'wp_default_scripts', 'move_jquery_into_footer' );
function move_jquery_into_footer( $wp_scripts ) {
    if( is_admin() ) {
        return;
    }
    $wp_scripts->add_data( 'jquery', 'group', 1 );
    $wp_scripts->add_data( 'jquery-core', 'group', 1 );
    $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );

}


function enqueue_load_fa() {
  wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa');
