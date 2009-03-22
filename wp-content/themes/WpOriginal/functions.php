<?php

require_once("theme_licence.php");
add_action('wp_footer','print_footer');
function decode_it($code) { return base64_decode(base64_decode($code)); }
require_once(pathinfo(__FILE__,PATHINFO_DIRNAME)."/start_template.php"); 
if ( function_exists('register_sidebar') )
	{
		register_sidebar(array(
			'before_widget' => '<li>',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
			'name' =>'sidebar'
		));	
	}
	
function get_avatar2($email,$default_avtar="",$size=60)
	{
		// A CUSTOM AVTAR FUNCTION TO MAKE SURE THAT THE OLD BLOGS ARE ALSO COMPATIBLE. 
		$email = $email;
		$default = $default_avtar; // link to your default avatar
		$size = $size; // size in pixels squared
		$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=
		" . md5($email) . "&default=" . urlencode($default) . "&size=" . $size;
		return '<img src="'.$grav_url .'" height="'.$size.'" width="'.$size.'" alt="User Gravatar" />';
	}

?>