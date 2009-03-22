<?php get_header(); ?>

	<div class="audioBanner">

        
		<?php if (have_posts()) : ?>
			<?php $count = 0; ?>
			
			<?php while (have_posts() && $count<2) : the_post(); ?>
				<?php $count++; ?>
				
			
				<?php if ( in_category('4') ) : ?>
			
					<div class="headline">
						<?php echo get_post_meta( get_the_ID(), 'preacher', true); ?>:
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a> -
						<?php echo get_post_meta( get_the_ID(), 'dateRecorded', true); ?>
					</div>
					
				<?php endif; ?>
			
			<?php endwhile; ?>
	
		<?php endif; ?>
	
	        

	</div>

	<div id="content">
	<img class="home" src="<?php bloginfo('stylesheet_directory'); ?>/images/bldgSmall.jpg"
	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>