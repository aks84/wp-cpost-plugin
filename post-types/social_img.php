<?php

/**
 * Registers the `social_img` post type.
 */
function social_img_init() {
	register_post_type( 'social_img', array(
		'labels'                => array(
			'name'                  => __( 'Social imgs', 'social_images' ),
			'singular_name'         => __( 'Social img', 'social_images' ),
			'all_items'             => __( 'All Social imgs', 'social_images' ),
			'archives'              => __( 'Social img Archives', 'social_images' ),
			'attributes'            => __( 'Social img Attributes', 'social_images' ),
			'insert_into_item'      => __( 'Insert into social img', 'social_images' ),
			'uploaded_to_this_item' => __( 'Uploaded to this social img', 'social_images' ),
			'featured_image'        => _x( 'Featured Image', 'social_img', 'social_images' ),
			'set_featured_image'    => _x( 'Set featured image', 'social_img', 'social_images' ),
			'remove_featured_image' => _x( 'Remove featured image', 'social_img', 'social_images' ),
			'use_featured_image'    => _x( 'Use as featured image', 'social_img', 'social_images' ),
			'filter_items_list'     => __( 'Filter social imgs list', 'social_images' ),
			'items_list_navigation' => __( 'Social imgs list navigation', 'social_images' ),
			'items_list'            => __( 'Social imgs list', 'social_images' ),
			'new_item'              => __( 'New Social img', 'social_images' ),
			'add_new'               => __( 'Add New', 'social_images' ),
			'add_new_item'          => __( 'Add New Social img', 'social_images' ),
			'edit_item'             => __( 'Edit Social img', 'social_images' ),
			'view_item'             => __( 'View Social img', 'social_images' ),
			'view_items'            => __( 'View Social imgs', 'social_images' ),
			'search_items'          => __( 'Search social imgs', 'social_images' ),
			'not_found'             => __( 'No social imgs found', 'social_images' ),
			'not_found_in_trash'    => __( 'No social imgs found in trash', 'social_images' ),
			'parent_item_colon'     => __( 'Parent Social img:', 'social_images' ),
			'menu_name'             => __( 'Social imgs', 'social_images' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_rest'          => true,
		'rest_base'             => 'social_img',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'social_img_init' );

/**
 * Sets the post updated messages for the `social_img` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `social_img` post type.
 */
function social_img_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['social_img'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Social img updated. <a target="_blank" href="%s">View social img</a>', 'social_images' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'social_images' ),
		3  => __( 'Custom field deleted.', 'social_images' ),
		4  => __( 'Social img updated.', 'social_images' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Social img restored to revision from %s', 'social_images' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Social img published. <a href="%s">View social img</a>', 'social_images' ), esc_url( $permalink ) ),
		7  => __( 'Social img saved.', 'social_images' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Social img submitted. <a target="_blank" href="%s">Preview social img</a>', 'social_images' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Social img scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview social img</a>', 'social_images' ),
		date_i18n( __( 'M j, Y @ G:i', 'social_images' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Social img draft updated. <a target="_blank" href="%s">Preview social img</a>', 'social_images' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'social_img_updated_messages' );
