<?php include_header('post') ?>

<div class="wrapper">
	<?php include_sidebar('post') ?>
	
	<div id="right-content">
		<div id="post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div id="context">
				<?php the_content(''); ?>
			</div>
			<span class="meta">posted on <?php strtolower( the_time('l, F jS, Y') ); ?> by <a href="<?php the_author_url(); ?>" class="author"><?php the_author(); ?></a> in <span class='cat-item'><?php the_category(', ') ?></span><?php edit_post_link('edit',' &bull; ',''); ?></span>
		</div>
				
		<div id="comments">
			<div id="respond"></div>
			<?php $comments = get_approved_comments($id);?>				
			<h2><?php comments_number('0 Comments', '1 Comment', '% Comments' );?></h2>

			<?php foreach ($comments as $comment): ?>
				<div class="comment" id="comment-<?php comment_ID() ?>">
					<div class="comment-context">
						<?php comment_text() ?>
					</div>
					<div class="comment-details">
						<span>posted by <strong><?php comment_author_link() ?></strong> &bull; <?php comment_date('F j, Y') ?><?php edit_comment_link('edit',' &bull; ',''); ?></span>
					</div>
				</div>
			<?php endforeach ?>
			
			<div id="comment-form">
				<h3>Leave Comment</h3>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					<p>
						<label for="author">Name</label>
						<input type="text" name="author" value="" id="author" />
					</p>
					<p>
						<label for="email">Email</label>
						<input type="text" name="email" value="" id="email" />
					</p>
					<p>
						<label for="url">Website</label>
						<input type="text" name="url" value="" id="url" />
					</p>
					<p>
						<label for="comment">Comment</label>
						<textarea name="comment" rows="8" cols="40"></textarea>
					</p>
					<p>
						<input type="submit" value="Post Comment" class="submit" />
					</p>
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				</form>
			</div>
		</div>
		<?php endwhile; else: ?>
		<p>Sorry, but you're it the wrong place.</p>
		<?php endif; ?>
	</div>
	
	<div class="clear"></div>		
	
</div>

<?php get_footer(); ?>