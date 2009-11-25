<?php

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="box">',
        'after_widget' => '<div class="clear"></div></div></div>',
        'before_title' => '<h4><span>',
        'after_title' => '</span></h4><div class="content">',
));

if (is_admin()) {
	require(TEMPLATEPATH.'/lib/admin.php');
}

?>
