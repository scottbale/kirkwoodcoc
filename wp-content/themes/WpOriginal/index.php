<?php get_header();?>
<div class="topText">
	<div class="main">
		<h2 class="center"><?php bloginfo('description'); ?></h2>
	</div>
</div>	
<div class="main">	
		<div class="content">
<div class="content_column">
	
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="story">
							<div class="story_content">
								
									<h3 class="story_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
									<div class="author">posted by <?php the_author() ?> in <?php the_category(', ') ?> on <?php the_time('j') ?>th <?php the_time('F') ?> <?php edit_post_link('Edit','&nbsp;  | &nbsp;'); ?></div>
									<div class="comments"><?php comments_popup_link(__('0 Comments'), __('1 Comments'), __('% Comments'));?></div>
									<div class="clearer"></div>
								
								<div class="inner_content">
									<?php the_excerpt(); ?> 
								</div>
							 </div>
						</div>	
					</div>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
					
					<div class="navigation">
						<?php
							if (function_exists('wp_pagebar'))
							  wp_pagebar();
							else
								{
						
						?>
							<div class="alignleft"><?php next_posts_link('Older Entries &raquo; ') ?></div>
							<div class="alignright"><?php previous_posts_link('&laquo; Newer Entries') ?></div><div style="clear:both;"></div>
							<? } ?>
		
					</div>
	
	
</div>
<?php get_sidebar();?>
<?php get_footer(); ?>