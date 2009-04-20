<?php get_header(); ?>

	<div class="banner">
        <div class="bannerline">Please join us for our <a href="/2009/04/15/news/gospel-meeting-april-19-24/">Spring 2008 Gospel Meeting</a> April 19-24</div>
    </div>

	<div class="banner audiobanner bottomborder">
        
        
		<?php if (have_posts()) : ?>
			<?php $count = 0; ?>
			
			<?php while (have_posts() && $count<2) : the_post(); ?>
				
				<?php if ( in_category('3') ) : ?>
					<?php $count++; ?>
			
					<div class="bannerline">
						<?php echo get_post_meta( get_the_ID(), 'speaker', true); ?>:
						<a title="Download the sermon audio" href="<?php the_permalink() ?>"><?php the_title(); ?></a> -
						<?php echo get_post_meta( get_the_ID(), 'dateRecorded', true); ?>
					</div>
					
				<?php endif; ?>
			
			<?php endwhile; ?>
	
		<?php endif; ?>
	
	        

	</div>

	<div id="content">
	<img class="home" src="<?php bloginfo('stylesheet_directory'); ?>/images/bldgSmall.jpg" />

	</div>

	

<?php get_sidebar(); ?>

<?php get_footer(); ?>