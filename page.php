<?php $color = "pink"; include "header.php"; ?>

<div class="wrapper">
	<?php $active = "none"; include "sidebar.php"; ?>
	
	<div id="right-content">
		<div id="post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div id="context">
				<?php the_content(''); ?>
			</div>
		</div>
		<?php endwhile; else: ?>
		<p>Sorry, but you're in the wrong place.</p>
		<?php endif; ?>
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