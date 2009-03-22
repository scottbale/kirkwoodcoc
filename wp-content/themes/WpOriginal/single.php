<?php get_header();?>
<div class="topText">
	<div class="main">
		<div style="display: table; height: 93px; #position: relative; overflow: hidden;">
			<div style=" #position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
				<div style="#position: relative; #top: -50%; ">
					<h2 class="fullPost"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>					
				</div>
			</div>
		
		</div>
		
	</div>
</div>	
<div class="main">	
		<div class="content">
<div class="content_column">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="story">
				<div class="story_content">
						<div class="author" style="background:#eeeeee;border:solid 1px #cccccc;padding:2px;padding-left:5px;margin-bottom:10px;">posted by <?php the_author() ?> in <?php the_category(', ') ?> on <?php the_time('j') ?>th <?php the_time('F') ?> <?php edit_post_link('Edit','&nbsp;  | &nbsp;'); ?></div>
						<div style="clear:both;"></div>
					
				 	<div class="inner_content">
						<?php the_content(); ?> 
					</div>
				 </div>
			</div>
		</div>
		 <div style="padding: 10px">
		  <?php comments_template(); // Get wp-comments.php template ?>
		 </div>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	
			
</div>
<?php get_sidebar();?>
<?php get_footer(); ?>