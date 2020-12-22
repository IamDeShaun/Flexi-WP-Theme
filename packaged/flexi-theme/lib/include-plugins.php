<?php 

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'flexi_register_required_plugins');

function flexi_register_required_plugins(){
  $plugins = array(
    array(
        'name' => 'flexi-theme metaboxes',
        'slug' => 'flexi-theme-metaboxes',
        'source' => get_template_directory_uri() . '/lib/plugins/flexi-theme-metaboxes.zip',
        'required' => true,
        'version' => '1.0.0',
        'force_activation' => false,
        'force_deactivation' => false,
    )
);

$config = array(
    
);

tgmpa( $plugins, $config);

}



?>