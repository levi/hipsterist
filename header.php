<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	
	<title><?php bloginfo('name'); ?> <?php wp_title('&mdash;', true, 'left'); ?></title>
	
	<!--[if lt IE 8]>
	<script src="<?php bloginfo('template_url'); ?>/js/ie.js" type="text/javascript"></script>
	<![endif]-->
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php echo hipsterist_page_color($page); ?>
	<?php echo hipsterist_tag_color(); ?>
	<?php echo hipsterist_search_color(); ?>
	<?php echo hipsterist_post_link_color(); ?>
	<?php echo hipsterist_link_color(); ?>
	<?php echo hipsterist_category_link_color(); ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="header">
		<div id="long">
			<div id="sub">
				<span><?php bloginfo('description'); ?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div id="header-corner"></div>
	</div>