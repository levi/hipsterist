<?php
/**
 * @package Wordpress
 * @subpackage Hipsterist
 */
?>
<!DOCTYPE html>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	
	<title><?php bloginfo('name'); ?> <?php wp_title('&mdash;', true, 'left'); ?></title>
	
	<!--[if lt IE 8]>
	<script src="<?php bloginfo('template_url'); ?>/js/ie.js" type="text/javascript"></script>
	<![endif]-->
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php if ($color): ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/<?php echo $color; ?>.css" type="text/css" media="screen" />
	<?php endif ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Article Feed" href="<?php bloginfo('rss2_url'); ?>" />
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