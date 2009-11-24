<div id="left-content">
	<div id="logo">
		<a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>
		<div class="corner"></div>
	</div>
	
	<div class="box" id="navigation">
		<ul>
			<li class="home">
				<a href="<?php echo get_option('home'); ?>" <?php if (!$active): ?> class="active"<?php endif ?>>home</a>
				<div class="corner"></div>
			</li>
			<?php
			
			$pages = $wpdb->get_results( "SELECT id, post_title, post_name, guid FROM wp_posts WHERE post_type = 'page' AND post_status = 'publish' AND post_parent = '0' ORDER BY menu_order, post_date DESC" );
			$x = 1;
			foreach ($pages as $page) {
				$count = ($x == count($pages)) ? 'last' : '';
				echo '<li class="'.$count.' '.$post->post_name.'">';
				echo '<a href="'.$page->guid.'">'.strtolower($page->post_title).'</a>';
				echo '<div class="corner"></div>';
				echo '</li>';
				$x++;
			}
			
			?>
		</ul>
	</div>
	<div class="box" id="search">
		<h4><span>SEARCH</span></h4>
		<form method="get" id="searchform" action="<?php bloginfo('wpurl') ?>">
				<input type="text" name="s" id="s" value="Search Here" onClick="this.value=''" class="text" />
				<input type="submit" name="submit" value="SEARCH" id="submit" class="button" />
				<div class="clearfix"></div>
		</form>
	</div>
	<div id="widgets">
		<?php if ( !function_exists('dynamic_sidebar') OR !dynamic_sidebar() ) : ?>
		<?php endif; ?>
	</div>
</div>
