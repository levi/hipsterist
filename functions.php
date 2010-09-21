<?php

register_sidebar(array(
    'name' => __( 'Left Sidebar', 'hipsterist' ),
    'id' => 'left-sidebar',
    'before_widget' => '<div class="box">',
    'after_widget'  => '<div class="clear"></div>'
                       .'</div></div>',
    'before_title'  => '<h4><span>',
    'after_title'   => '</span></h4>'
                       .'<div class="content">',
));

// Add Automatic feed links (3.0)
add_theme_support( 'automatic-feed-links' );

// Add Post Thumbnails (2.9)
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 290, 120, true );

require(TEMPLATEPATH.'/lib/settings.php');

$hipsterist_settings = new Settings();

require(TEMPLATEPATH.'/lib/template.php');

if (is_admin()) 
{
	require(TEMPLATEPATH.'/lib/admin.php');
}

?>
