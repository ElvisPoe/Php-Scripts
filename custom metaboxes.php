
/* Custom Meta Boxes */

# Main Function
function add_private_content_fields() {
    $screens = array('wppcp-private-user-page');
    foreach ($screens as $screen) {
        add_meta_box(
            'add_private_fields',
            __('Layout'),
            'add_private_content_fields',
            $screen,
            'side',
            'core'
        );
    }
}

# Meta Callback Render Functions
function add_private_fields($post) {
    wp_nonce_field( basename(__FILE__), 'add_private_fields' );
    if ( metadata_exists( 'post', $post->ID, 'date_time' ) )
        $date_time = esc_attr( get_post_meta( $post->ID, 'date_time', true ) );
    else
        $date_time = 'default';
    ?>
    <div>
        <label for="private_date_time"><?php echo __('Datetime'); ?></label><br />
        <input type="datetime-local" id="private_date_time" name="private_date_time"/>
    </div>
    <?php
}

# Meta Field Save
function theme_meta_box_save($post_id) {
    if ( isset($_POST['add_private_fields']) && ! wp_verify_nonce( $_POST['add_private_fields'], basename(__FILE__) ) )
        return $post_id;

    if (isset($_POST['post_type']) && $_POST['post_type'] == 'page') {
        if (! current_user_can('edit_page', $post_id))
            return $post_id;
    }
    else {
        if (! current_user_can('edit_post', $post_id))
            return $post_id;
    }

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    if ( isset($_POST['post_type']) ) {
        // meta defaults
        /*if ($_POST['post_type'] == 'page') {
            $container_width = $_POST['container_width'];
            $page_title = $_POST['page_title'];
            $hero_image = $_POST['hero_image'];

            // Sanitize and save meta values
            update_post_meta( $post_id, 'container_width', sanitize_text_field( wp_unslash( $container_width ) ) );
            update_post_meta( $post_id, 'page_title', sanitize_text_field( wp_unslash( $page_title ) ) );
            update_post_meta( $post_id, 'hero_image', sanitize_text_field( wp_unslash( $hero_image ) ) );
        }
        elseif ($_POST['post_type'] == 'post') {
            $post_page_title = $_POST['post_page_title'];
            $post_page_author = $_POST['post_page_author'];

            // Sanitize and save meta values
            update_post_meta( $post_id, 'post_page_title', sanitize_text_field( wp_unslash( $post_page_title ) ) );
            update_post_meta( $post_id, 'post_page_author', sanitize_text_field( wp_unslash( $post_page_author ) ) );
        }*/

        $sidebars = $_POST['sidebars'];

        // Sanitize and save meta values
        update_post_meta( $post_id, 'sidebars', sanitize_text_field( wp_unslash( $sidebars ) ) );
    }
}