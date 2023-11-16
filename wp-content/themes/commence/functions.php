<?php
//* Code goes here

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11 );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}

function year_shortcode() {
	$year = date('Y');
	return $year;
}
add_shortcode('year', 'year_shortcode');

//Redirect to home after logout

add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit;
}

//Redirect to dashboard after login

function custom_login_redirect($redirect_to, $request, $user) {
    // Check the user's role and redirect accordingly
    if (isset($user->roles) && is_array($user->roles)) {
        // Replace 'subscriber' with the user role you want to redirect
        if (in_array('subscriber', $user->roles) || in_array('administrator', $user->roles)) {
            // Replace 'your-custom-url' with the URL you want to redirect subscribers to
            return home_url('/dashboard');
        } else {
            // Redirect other user roles to the default dashboard
            return admin_url();
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);



function my_register_cpt() {
	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', '1fix' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', '1fix' ),
		'menu_name'             => __( 'Courses', '1fix' ),
		'name_admin_bar'        => __( 'Courses', '1fix' )
	);
	$args = array(
		'label'                 => __( 'Course', '1fix' ),
		'labels'                => $labels,
		'hierarchical'          => true,
		'public'                => true
	);
	register_post_type( 'course', $args );
	$labels = array(
		'name'                  => _x( 'Lesons', 'Post Type General Name', '1fix' ),
		'singular_name'         => _x( 'Leson', 'Post Type Singular Name', '1fix' ),
		'menu_name'             => __( 'Lesons', '1fix' ),
		'name_admin_bar'        => __( 'Lesons', '1fix' )
	);
	$args = array(
		'label'                 => __( 'Leson', '1fix' ),
		'labels'                => $labels,
		'hierarchical'          => false,
		'public'                => true
	);
	register_post_type( 'Leson', $args );
}
add_action( 'init', 'my_register_cpt' );

function my_add_meta_boxes() {
	add_meta_box( 'Leson-parent', 'Course', 'Leson_attributes_meta_box', 'Leson', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'my_add_meta_boxes' );

function Leson_attributes_meta_box( $post ) {
	$post_type_object = get_post_type_object( $post->post_type );
	$pages = wp_dropdown_pages( array( 'post_type' => 'course', 'selected' => $post->post_parent, 'name' => 'parent_id', 'show_option_none' => __( '(no parent)' ), 'sort_column'=> 'menu_order, post_title', 'echo' => 0 ) );
	if ( ! empty( $pages ) ) {
		echo $pages;
	}
}

function my_add_rewrite_rules() {
	add_rewrite_tag('%leson%', '([^/]+)', 'leson=');
	add_permastruct('leson', '/dashboard/%course%/%leson%', false);
	add_rewrite_rule('^leson/([^/]+)/([^/]+)/?','index.php?leson=$matches[2]','top');
}
add_action( 'init', 'my_add_rewrite_rules' );

function my_permalinks($permalink, $post, $leavename) {
	$post_id = $post->ID;
	if($post->post_type != 'leson' || empty($permalink) || in_array($post->post_status, array('draft', 'pending', 'auto-draft')))
	 	return $permalink;

	$parent = $post->post_parent;
	$parent_post = get_post( $parent );

	$permalink = str_replace('%course%', $parent_post->post_name, $permalink);

	return $permalink;
}
add_filter('post_type_link', 'my_permalinks', 10, 3);

