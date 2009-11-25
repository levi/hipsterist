<?php

/**
 * Checks if a page has a certain color chosen by the theme administrator.
 *
 * @return String
 * @author Levi McCallum
 */
function hipsterist_page_color()
{
	global $hipsterist_settings;
	
	$color = 'blue';

	if (is_front_page() === TRUE) {
		$color = $hipsterist_settings->settings->homepage_color;
	}
		
	$ret = '<link rel="stylesheet" href="'.get_bloginfo('stylesheet_directory').'/css/'.$color.'.css" type="text/css" media="screen" />'."\n";
	
	return $ret;
}