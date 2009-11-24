<?php
/*
Template Name: Topics
*/
?>

<?php $color = "red"; include 'header.php'; ?>

<div class="wrapper">
	<?php $active = "topics"; include 'sidebar.php' ?>
	
	<div id="right-content">
		<h2 class="topic">Topics</h2>
		<div id="topic-cloud">
			<?php wp_list_categories('orderby=count&order=DESC&hierarchical=0&exclude=1&title_li='); ?> 
		</div>
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