<?php
/**
 * @package efs_slider
 * @version 1.0
 */

/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function food_add_meta_boxes( $post ){
  add_meta_box( 'slider_link_meta_box', __( 'Slider URL', 'efs_slider' ), 'food_build_meta_box', CPT_TYPE, 'normal', 'low' );
}
add_action( 'add_meta_boxes_slider-image', 'food_add_meta_boxes' );
/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function food_build_meta_box( $post ){
  // make sure the form request comes from WordPress
  wp_nonce_field( basename( __FILE__ ), 'slider_link_meta_box_nonce' );

  // retrieve the _food_carbohydrates current value
  $current_carbohydrates = get_post_meta( $post->ID, '_food_carbohydrates', true );
  ?>
  <div class='inside'>

    <p><span class="field-prefix">http://</span>
      <input type="text" name="carbohydrates" value="<?php echo $current_carbohydrates; ?>" /> 
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
function food_save_meta_box_data( $post_id ){
  // verify meta box nonce
  if ( !isset( $_POST['slider_link_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['slider_link_meta_box_nonce'], basename( __FILE__ ) ) ){
    echo 'hello world';
    return;
  }
  // return if autosave
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
    echo 'hello world111';
    return;
  }
  // Check the user's permissions.
  if ( ! current_user_can( 'edit_post', $post_id ) ){
    echo 'hello 222';
    return;
  }

  if ( isset( $_REQUEST['carbohydrates'] ) ) {
    echo 'hello 333';
    update_post_meta( $post_id, '_food_carbohydrates', sanitize_text_field( $_POST['carbohydrates'] ) );
  }
}
add_action( 'save_post_slider-image', 'food_save_meta_box_data' );
