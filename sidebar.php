<div id="left-content">
	<div class="box" id="navigation">
		<ul>
			<?php
			
			$pages = $wpdb->get_results( "SELECT id, post_title, post_name, guid FROM wp_posts WHERE post_type = 'page' AND post_status = 'publish' AND post_parent = '0' ORDER BY menu_order, post_date DESC" );
						
			foreach ($pages as $page) {
				echo '<li class="'.$post->post_name.'">';
				echo '<a href="">'.$page->post_title.'</a>';
				echo '<div class="corner"></div>';
				echo '</li>';
			}
			
			?>
			<li class="home">
				<a href="/" <?php if (!$active): ?> class="active"<?php endif ?>>home</a>
				<div class="corner"></div>
			</li>
			<li class="topics">
				<a href="/topics/"<?php if ($active == "topics"): ?> class="active"<?php endif ?>>topics</a>
				<div class="corner"></div>
			</li>
			<li class="last feeds">
				<a href="/feeds/"<?php if ($active == "feeds"): ?> class="active"<?php endif ?>>feeds</a>
				<div class="corner"></div>
			</li>
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
		<div class="box" id="category-list">
			<h4><span>POPULAR TOPICS</span></h4>
			<ul>
				<?php wp_list_categories('orderby=count&order=DESC&number=10&hierarchical=0&exclude=1&title_li='); ?> 
			</ul>
			<div class="clear"></div>
		</div>
		<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar() ) : ?>
		<?php endif; ?>
	</div>
</div>
