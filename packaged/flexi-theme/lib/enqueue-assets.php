<?php

  function flexi_theme_assets() {
    
    wp_enqueue_style('flexi-theme-stylesheet', get_template_directory_uri() .'/dist/assets/css/bundle.css', array(), 'all');

    include(get_template_directory() . '/lib/inline-css.php'); 
    wp_add_inline_style( 'flexi-theme-stylesheet', $inline_styles );
    

    wp_enqueue_script('jquery');


    wp_enqueue_script('flexi-theme-scripts', get_template_directory_uri() . '/dist/assests/js/bundle.js', array('jquery'), '1.0.0', true );
  }

    add_action('wp_enqueue_scripts', 'flexi_theme_assets');

    function _flexi_customize_preview_js() {


      wp_enqueue_script('_flexi-customize-preview', get_template_directory_uri() . '/dist/assests/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true );

      wp_localize_script('_flexi-customize-preview', 'flexi-theme', array('x' => 3) );
    }

    add_action('customize_preview_init', '_flexi_customize_preview_js');

    
?>