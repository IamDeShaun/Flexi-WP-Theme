<?php

function _flexi_customize_register( $wp_customize ) {

  
$wp_customize->selective_refresh->add_partial('_flexi_footer_partial', array(
  'settings' => array('_flexi_site_info', '_flexi_footer_bg' ),
  'selector' => '#footer',
  'container_inclusive' => false,
  'render_callback' => function() {
    get_template_part('template-parts/footer/widgets');
    get_template_part('template-parts/footer/info');
  }
));

/*####################### General Options #########################*/

$wp_customize->add_section('_flexi_general_options', array(
  'title' => esc_html__('General Options','flexi-theme' ),
  'description' => esc_html__('You can change General options from here', 'flexi-theme' )
));

$wp_customize->add_setting('_flexi_accent_color', array(
  'default' => '#20ddae',
  'transport' => 'postMessage',
  'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '_flexi_accent_color', array(
  'label' => __('Accent Color', 'flexi-theme' ),
  'section' => '_flexi_general_options',
)));


/*####################### Footer Options #########################*/

  $wp_customize->add_section('_flexi_footer_options', array(
    'title' => esc_html__('Footer Options','flexi-theme' ),
    'description' => esc_html__('You can change footer options from here', 'flexi-theme' )
  ));

 $wp_customize->add_setting('_flexi_site_info', array(
    'default' => '',
    'sanitize_callback' => '_flexi_sanitize_site_info',
    'transport' => 'postMessage'
 ));

 $wp_customize->add_control('_flexi_site_info', array(
    'type' =>'text',
    'label' => esc_html__('Site Info', 'flexi-theme'),
    'section' => '_flexi_footer_options'
 ));

 $wp_customize->add_setting('_flexi_footer_bg', array(
   'default' => 'dark',
   'transport' => 'postMessage',
   'sanitize_callback' => '_flexi_sanitize_footer_bg'
 ));

 $wp_customize->add_control('_flexi_footer_bg', array(
    'type' => 'select',
    'label' => esc_html__( 'Footer Background', 'flexi-theme' ),
    'choices' =>array(
      'light' => esc_html__('Light', 'flexi-theme'),
      'Dark' => esc_html__('Dark', 'flexi-theme'),
    ),
    'section' => '_flexi_footer_options'
 ));

 $wp_customize->add_setting('_flexi_footer_layout', array(
  'default' => '3,3,3,3',
  'sanitize_callback' => 'sanitize_text_field',
  'validate_callback' => 'flexi_validate_footer_layout'
));

$wp_customize->add_control('_flexi_footer_layout', array(
  'type' =>'text',
  'label' => esc_html__('Footer Layout', 'flexi-theme'),
  'section' => '_flexi_footer_options'
));

}

add_action( 'customize_register', '_flexi_customize_register' );

function _flexi_sanitize_footer_bg( $input ) {
    $valid = array('light', 'dark');
    if( in_array($input, $valid, true)) {
      return $input;
    }
    return 'dark';
}

function flexi_validate_footer_layout( $validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*s/', $value)) {
      $validity->add('invalid_footer_layout', esc_html__('Footer Layout is invalid', 'flexi-theme'));
    }
    return $validity;
}

function _flexi_sanitize_site_info( $input ) {
  $allowed = array('a' => array(
    'href' => array(),
    'title' => array(),
  ));
  return wp_kses($input, $allowed);
}