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

function custom_post_type_permalink_structure() {
    global $wp_rewrite;

    // Define the tag for the unit
    $wp_rewrite->add_rewrite_tag('%unit%', '([^/]+)', 'unit=');

    // Define the tag for the lesson
    $wp_rewrite->add_rewrite_tag('%lesson%', '([^/]+)', 'lesson=');

    // Define the custom permalink structure
    $wp_rewrite->add_permastruct('unit_lesson', '/%unit%/%lesson%/', false);
}

add_action('init', 'custom_post_type_permalink_structure');



