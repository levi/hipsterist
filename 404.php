<?php $color = "purple"; include 'header.php'; ?>

<div class="wrapper">
	<?php $active = "none"; include 'sidebar.php' ?>
	
	<div id="right-content">
			<h2 class="search center">Sorry, we couldn't find what you were looking for.</h2>
			<div class="clear"></div>		
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