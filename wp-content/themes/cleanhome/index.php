<?php get_header(); ?>

	<div id="content">
	<?php if (have_posts()) : ?>

		<?php $url = get_bloginfo("wpurl"); ?>
		<?php $itunesurl = str_replace('http', 'itpc', $url); ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<?php if ( in_category('3') ) : ?>
			<div class="post">
				<div class="audio">
					<div class="audioline">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					</div>

				<small><b>Recorded:</b> <?php echo get_post_meta( get_the_ID(), 'dateRecorded', true); ?> | <b>Speaker:</b> <?php echo get_post_meta( get_the_ID(), 'speaker', true); ?> 
				| <a title="Download mp3 file" href="<?php echo get_post_meta( get_the_ID(), 'URL', true) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/audio-icon-s.png" /> Download</a>
				| <a title="Subscribe to sermons" href="<?php $url; ?>/category/sermon/feed"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed-icon-28x28.png" /> Subscribe</a>
				| <a title="Subscribe to sermons in iTunes" href="<?php echo $itunesurl; ?>/category/sermon/feed"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/podcast_icon_30.jpg" /> iTunes</a>
				<?php if ( $user_ID ) : ?> | <b>Modify:</b> <?php edit_post_link(); ?> <?php endif; ?>
				</small>
				 <hr/>

				</div>		
			</div>
		<?php else : ?>
			<div class="post">
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<small><b>Posted:</b> <?php the_time('F jS, Y') ?> | <b>Author:</b> <?php the_author_posts_link(); ?> | <b>Filed under:</b> <?php the_category(', ') ?> <?php the_tags(' | <b>Tags:</b> ', ', ', ''); ?> 
		        <?php if ( $user_ID ) : ?> | <b>Modify:</b> <?php edit_post_link(); ?> <?php endif; ?>
		        </small>
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				 <hr/>
			</div>
		<?php endif; ?>
		
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>