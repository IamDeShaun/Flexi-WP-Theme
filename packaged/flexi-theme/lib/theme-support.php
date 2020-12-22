<?php
    function flexi_theme_support() {
        add_theme_support('title-tag');
        add_theme_support('post-thumnails');
        add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption'));
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('custom-logo', array(
            'height' => 200,
            'width' => 600,
            'flex-height' => true,
            'flex-width' => true
            
        ));
    }

    add_action('after_setup_theme', 'flexi_theme_support');
?>