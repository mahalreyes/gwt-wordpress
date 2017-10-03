<?php
define('CPT_NAME', "Slider Images");
define('CPT_SINGLE', "Slider Image");
define('CPT_TYPE', "slider-image");
define('CPT_THUMB_SIZE', 500);

add_theme_support('post-thumbnails', array('slider-image'));  
  
function efs_register() {  
    $args = array(  
        'label' => __(CPT_NAME),  
        'singular_label' => __(CPT_SINGLE),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
  
    register_post_type(CPT_TYPE , $args );  
    set_post_thumbnail_size(CPT_THUMB_SIZE);
}

add_action('init', 'efs_register');

function efs_disable_editor() {
    remove_post_type_support( CPT_TYPE, 'editor' );
}
add_action('init', 'efs_disable_editor');

/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function slider_link_add_meta_boxes( $post ){
  add_meta_box( 'slider_link_meta_box', __( 'Slider URL', 'efs_slider' ), 'slider_link_build_meta_box', CPT_TYPE, 'normal', 'low' );
}
add_action( 'add_meta_boxes_slider-image', 'slider_link_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function slider_link_build_meta_box( $post ){
  // make sure the form request comes from WordPress
  wp_nonce_field( basename( __FILE__ ), 'slider_link_meta_box_nonce' );

  // retrieve the _slider_link current value
  $slider_link = get_post_meta( $post->ID, '_slider_link', true );
  ?>
  <div class='inside'>
    <p><span class="field-prefix">http://</span>
      <input type="text" name="slider_link" value="<?php echo $slider_link; ?>" /> 
    </p>

  </div>
  <?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function slider_link_save_meta_box_data( $post_id ){
  // verify meta box nonce
  if ( !isset( $_POST['slider_link_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['slider_link_meta_box_nonce'], basename( __FILE__ ) ) ){
    return;
  }
  // return if autosave
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
    return;
  }
  // Check the user's permissions.
  if ( ! current_user_can( 'edit_post', $post_id ) ){
    return;
  }

  if ( isset( $_REQUEST['slider_link'] ) ) {
    update_post_meta( $post_id, '_slider_link', sanitize_text_field( $_POST['slider_link'] ) );
  }
}
add_action( 'save_post_slider-image', 'slider_link_save_meta_box_data' );

