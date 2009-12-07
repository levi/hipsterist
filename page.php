<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $post_name = $wpdb->get_var($wpdb->prepare("SELECT post_name FROM wp_posts WHERE id = %s", get_the_ID())); ?>
<?php include_header($post_name.'-'.get_the_ID()."-page") ?>

<div class="wrapper">
	<?php include_sidebar($post_name); ?>
	
	<div id="right-content">
		<div id="post">
			<h2><?php the_title(); ?></h2>
			<div id="context">
				<?php the_content(''); ?>
			</div>
		</div>				
		<?php endwhile; else: ?>
		<p>Sorry, but you're it the wrong place.</p>
		<?php endif; ?>
	</div>
	
	<div class="clear"></div>		
	
</div>

<?php get_footer(); ?>