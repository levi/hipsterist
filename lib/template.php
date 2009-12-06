<?php

/**
 * Checks if a page has a certain color chosen by the theme administrator.
 *
 * @return String
 * @author Levi McCallum
 */

$hipsterist_colors = array(
	'blue' => '#318df2',
	'green' => '#8FBE00',
	'orange' => '#f26731',
	'pink' => '#ff0066',
	'purple' => '#c331f2',
	'red' => '#EE280B',
);

function hipsterist_page_color($current_page)
{
	global $hipsterist_settings;
	
	$settings = $hipsterist_settings->settings;
	$color = $settings->default_color;

	if (is_front_page() === TRUE) {
		$color = $settings->homepage_color;
	}
	
	if (is_single() === TRUE) {
		$color = $settings->post_color;
	}
	
	switch ($current_page) {
		case 'tags':
			$color = $settings->tags_color;
		break;
		
		case 'category':
			$color = $settings->category_color;
		break;
		
		case 'search':
			$color = $settings->search_color;
		break;
		
		default:
			if (preg_match('/(.+)-page$/', $current_page, $matches)) 
			{
				$color = ( isset($settings->{$matches[1].'-page_color'}) ) ? $settings->{$matches[1].'-page_color'} : $settings->page_color;
			}
		break;
	}
			
	$ret = '<link rel="stylesheet" href="'.get_bloginfo('stylesheet_directory').'/css/'.$color.'.css" type="text/css" media="screen" />'."\n";
	
	return $ret;
}

function hipsterist_tag_color()
{
	global $hipsterist_settings, $hipsterist_colors;
	
	$color = $hipsterist_settings->settings->tags_color;
		
	$ret = '<style type="text/css" media="screen">#left-content div#category-list li.cat-item, #left-content div.box div.content > div > a:hover { background: '.$hipsterist_colors[$color].' url('.get_bloginfo('stylesheet_directory').'/images/'.$color.'-fold.png) no-repeat 100% 100%; color:#fff; }</style>';
	
	return $ret;
}

function hipsterist_search_color()
{
	global $hipsterist_settings, $hipsterist_colors;
	
	$color = $hipsterist_settings->settings->search_color;
		
	$ret = '<style type="text/css" media="screen">#left-content div.box form#searchform input.button:hover { background: '.$hipsterist_colors[$color].' url('.get_bloginfo('stylesheet_directory').'/images/'.$color.'-fold.png) no-repeat 100% 100%; }</style>';
	
	return $ret;
}

function hipsterist_post_link_color()
{
	global $hipsterist_settings, $hipsterist_colors;
	
	$color = $hipsterist_settings->settings->post_color;
	
	$ret = '<style type="text/css" media="screen">#posts div.shallow-post h3 a:hover, #posts div.shallow-post span a:hover { color: '.$hipsterist_colors[$color].'; } #posts div.shallow-post span.perma a:hover { background: '.$hipsterist_colors[$color].' url('.get_bloginfo('stylesheet_directory').'/images/'.$color.'-fold.png) no-repeat 100% 100%; color:#fff;} #posts div.shallow-post span.comment a:hover { background: url('.get_bloginfo('stylesheet_directory').'/images/'.$color.'-comment.png) no-repeat 0% 50%; color:'.$hipsterist_colors[$color].'; }</style>';
	
	return $ret;
}

function hipsterist_link_color()
{
	global $hipsterist_settings, $hipsterist_colors;
	
	$color = $hipsterist_settings->settings->hover_color;
	
	$ret = '<style type="text/css" media="screen">#post span.meta a.author:hover, #footer p a:hover, #post div#context a:hover, #post span.meta a:hover { color:'.$hipsterist_colors[$color].'; } #post div#context a:hover { border-bottom-color: '.$hipsterist_colors[$color].' !important; }</style>';
	
	return $ret;
}

function hipsterist_category_link_color()
{
	global $hipsterist_settings, $hipsterist_colors;
	
	$color = $hipsterist_settings->settings->category_color;
	
	$ret = '<style type="text/css" media="screen">#left-content li.cat-item a:hover { background: '.$hipsterist_colors[$color].' url('.get_bloginfo('stylesheet_directory').'/images/'.$color.'-fold.png) no-repeat 100% 100% !important; }</style>';
	
	return $ret;
}

function include_header($page = '')
{
	include_once(TEMPLATEPATH.'/header.php');
}

function include_sidebar($active = '')
{
	global $wpdb;
	
	include_once(TEMPLATEPATH.'/sidebar.php');
}

function hipsterist_navigation($active)
{
	global $wpdb, $hipsterist_settings, $hipsterist_colors;
	?>
	<div class="box" id="navigation">
		<ul>
			<li class="home <?php echo $hipsterist_settings->settings->homepage_color; ?>">
				<a href="<?php echo get_option('home'); ?>"<?php if ($active == 'home'): ?> class="active"<?php endif ?>>home</a>
				<div class="corner"></div>
			</li>
	<?php
			
			$pages = $wpdb->get_results( "SELECT id, post_title, post_name, guid FROM wp_posts WHERE post_type = 'page' AND post_status = 'publish' AND post_parent = '0' ORDER BY menu_order, post_date DESC" );
			$x = 1;
			
			foreach ($pages as $page) {
				$count = ($x == count($pages)) ? 'last' : '';
				$color = ( isset($hipsterist_settings->settings->{$page->post_name.'-page_color'}) ) ? $hipsterist_settings->settings->{$page->post_name.'-page_color'} : $hipsterist_settings->settings->page_color;
?>
				<li class="<?php echo $count ?> <?php echo $page->post_name; ?> <?php echo $color ?>">
					<a href="<?php echo $page->guid ?>"<?php if ($active == $page->post_name): ?> class="active"<?php endif ?>><?php echo strtolower($page->post_title)?></a>
					<div class="corner"></div>
				</li>				
<?php
			$x++;
			}
?>
		</ul>
	</div>
<?php
}