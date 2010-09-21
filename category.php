<?php $color = "red"; include 'header.php'; ?>
<?php get_header(); ?>

<div class="wrapper">
	<?php include_sidebar('topics'); ?>
	
	<div id="right-content">
		<h2 class="title-header"><?php single_cat_title(); ?></h2>
		<div id="posts">
			<?php $x=0; ?>
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="shallow-post<?php if ($x % 2) : ?> alt<?php endif; ?>">
				<?php if (has_post_thumbnail()): ?>
					<div class="shallow-image">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<span class="shallow-overlay"></span>
							<?php the_post_thumbnail(); ?>
						</a>
					</div>
				<?php endif ?>
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<span class="date"><?php the_time('l, F jS, Y'); ?><?php edit_post_link('edit',' &bull; ',''); ?></span>
				<?php the_excerpt(); ?>
				<span class="perma"><a href="<?php the_permalink(); ?>">Keep Reading &raquo;</a></span>
				<span class="comment"><?php comments_popup_link('0', '1', '%'); ?></span>
				<div class="clear"></div>
			</div>
			<?php $x++;?>
			<?php endwhile;?>
			<?php else : ?>

				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>

			<?php endif; ?>
			<div class="clear"></div>
		</div>
		
		<?php
			$next = get_next_posts_link('Next &raquo;');
			$previous = get_previous_posts_link('&laquo; Previous');
		?>
		<?php if ($next != '' || $previous != ''): ?>
		<div class="whitey-pagination">
			<div id="pagination">
				<div class="left">
					<?php previous_posts_link('&laquo; Previous'); ?>
				</div>
				<div class="right">
					<?php next_posts_link('Next &raquo;'); ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php endif ?>
	</div>
	
	<div class="clear"></div>		
	
</div>

<?php get_footer(); ?>