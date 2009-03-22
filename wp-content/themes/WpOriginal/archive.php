<?php get_header();?>
<div class="topText">
	<div class="main">
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>
	</div>
</div>	
<div class="main">	
		<div class="content">
<div class="content_column">
	
<?php is_tag(); ?>
		

		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
				<div class="story">
				<div class="story_content">
					
						<h3 class="story_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<div class="author">posted by <?php the_author() ?> in <?php the_category(', ') ?> on <?php the_time('j') ?>th <?php the_time('F') ?> <?php edit_post_link('Edit','&nbsp;  | &nbsp;'); ?></div>
						<div class="comments"><?php comments_popup_link(__('0 Comments'), __('1 Comments'), __('% Comments'));?></div>
						<div style="clear:both;"></div>
					
				 	<div class="inner_content">
						<?php the_excerpt(); ?> 
					</div>
				 </div>
			</div>
		</div>
		<?php endwhile; ?>
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

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		

	<?php endif; ?>

	
		
</div>

<?php get_sidebar();?>
<?php get_footer(); ?>