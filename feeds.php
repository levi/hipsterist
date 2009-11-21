<?php
/*
Template Name: Feeds
*/
?>

<?php $color = "orange"; include 'header.php'; ?>

<div class="wrapper">
	<?php $active = "feeds"; include 'sidebar.php' ?>
	
	<div id="right-content">
		<h2 class="feeds">Feeds</h2>
		
		<ul id="feed-list">
			<li><a href="http://feeds.feedburner.com/hipsterist/">Grab Our Article Feed</a></li>
			<li><a href="http://feeds.feedburner.com/hipsterist-comments/">Grab Our Comments Feed</a></li>
		</ul>
	</div>
	
	<div class="clear"></div>		
	
</div>

<?php if (next_posts_link('Older &raquo;') || previous_posts_link('&laquo; Newer')): ?>
<div class="whitey">
	<div id="pagination">
		<a href="" class="previous">&laquo; Previous</a>
		<a href="" class="next">Next &raquo;</a>
		<div class="clear"></div>
	</div>
</div>
<?php endif ?>

<?php get_footer(); ?>