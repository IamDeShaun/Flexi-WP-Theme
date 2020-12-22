<?php

function _flexi_add_meta_box() {

  add_meta_box(
    '_flexi_post_metaox',
    esc_html__('Post Setting'),
    '_flexi_post_metabox_html', 
    'post', 
    'normal', 
    'default'

  );
}

add_action( 'add_meta_boxes', '_flexi_add_meta_box' );

function _flexi_post_metabox_html($post) {
  $subtitle = get_post_meta($post->ID, '__flexi_post_subtitle', true);
  $layout = get_post_meta($post->ID, '__flexi_post_layout', true);
  wp_nonce_field( '_flexi_update_post_metabox', '_flexi_update_post_nonce' );
  ?>
  <p>
      <label for="_flexi_post_metabox_html"><?php esc_html_e( 'Post Subtitle', 'flexi-theme' ); ?></label>
      <br />
      <input class="widefat" type="text" name="_flexi_post_subtitle_field" id="_flexi_post_metabox_html" value="<?php echo esc_attr( $subtitle ); ?>" />
  </p>
  <p>
      <label for="_flexi_post_layout_field"><?php esc_html_e( 'Layout', 'flexi-theme' ); ?></label>
      <select name="_flexi_post_layout_field" id="_flexi_post_layout_field" class="widefat">
          <option <?php selected( $layout, 'full' ); ?> value="full"><?php esc_html_e( 'Full Width', 'flexi-theme' ); ?></option>
          <option <?php selected( $layout, 'primary-sidebar' ); ?> value="flexi-theme"><?php esc_html_e( 'Post With Sidebar', 'flexi-theme' ); ?></option>
      </select>
  </p>
  <?php
}

function _flexi_save_post_metabox($post_id, $post) {

  $edit_cap = get_post_type_object( $post->post_type )->cap->edit_post;
  if( !current_user_can( $edit_cap, $post_id )) {
      return;
  }
  if( !isset( $_POST['_flexi_update_post_nonce']) || !wp_verify_nonce( $_POST['_flexi_update_post_nonce'], '_flexi_update_post_metabox' )) {
      return;
  }
  
  if(array_key_exists('_flexi_post_subtitle_field', $_POST)) {
      update_post_meta( 
          $post_id, 
          '__flexi_post_subtitle', 
          sanitize_text_field($_POST['_flexi_post_subtitle_field'])
      );
  }

  if(array_key_exists('_flexi_post_layout_field', $_POST)) {
      update_post_meta( 
          $post_id, 
          '__flexi_post_layout', 
          sanitize_text_field($_POST['_flexi_post_layout_field'])
      );
  }
}

add_action( 'save_post', '_flexi_save_post_metabox', 10, 2 );

?>