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

function my_add_meta_boxes() {
	add_meta_box( 'lesson-parent', 'Unit', 'lesson_attributes_meta_box', 'lesson', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'my_add_meta_boxes' );

function lesson_attributes_meta_box( $post ) {
	$post_type_object = get_post_type_object( $post->post_type );
	$pages = wp_dropdown_pages( array( 'post_type' => 'unit', 'selected' => $post->post_parent, 'name' => 'parent_id', 'show_option_none' => __( '(no parent)' ), 'sort_column'=> 'menu_order, post_title', 'echo' => 0 ) );
	if ( ! empty( $pages ) ) {
		echo $pages;
	}
}

function my_add_rewrite_rules() {
	add_rewrite_tag('%lesson%', '([^/]+)', 'lesson=');
	add_permastruct('lesson', '/lesson/%unit%/%lesson%', false);
	add_rewrite_rule('^lesson/([^/]+)/([^/]+)/?','index.php?lesson=$matches[2]','top');
}
add_action( 'init', 'my_add_rewrite_rules' );

