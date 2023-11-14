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

/**
 * Hide 'units' and 'lessons' custom post types for 'Member' role
 */
function hide_custom_post_types_for_member_role() {
    // Define your custom post types
    $custom_post_types = array('units', 'lessons');

    // Define the role for which the post types should be hidden
    $role_to_hide = 'member'; // Replace with your actual role

    // Check if the current user has the specified role
    $user = wp_get_current_user();
    if (in_array($role_to_hide, $user->roles)) {
        // If the user has the role that should hide the post types, remove post type support
        foreach ($custom_post_types as $post_type) {
            remove_post_type_support($post_type, 'show_ui');
        }
    }
}
add_action('admin_init', 'hide_custom_post_types_for_member_role');

