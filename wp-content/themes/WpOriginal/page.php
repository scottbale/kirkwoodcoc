<?php get_header();?>
<div class="topText">
	<div class="main">
		<h3 class="page_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	</div>
</div>	
<div class="main">	
		<div class="content">
<div class="content_column">
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
               	 	<div class="story">
						<div class="story_content">
					
						
					
							<div class="inner_content">
								<?php the_content(); ?> 
							</div>
					 	</div>
				</div>			
		</div>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
		
	
	
</div>
	

<?php get_sidebar();?>
<?php get_footer(); ?>