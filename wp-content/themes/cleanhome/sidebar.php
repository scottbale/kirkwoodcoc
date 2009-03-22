	<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('Sidebar') ) : ?>

		<div class="block">
			<h3>Contact Us</h3>
			<ul>
				<li><a href="mailto:<?php bloginfo('admin_email'); ?>">Email: <b> <?php bloginfo('admin_email'); ?> </b></a></li>
				<li class="nolink">Phone: <b>(314) 821-4910</b></li>
			</ul>
		</div>

		<div class="block">
			<h3>Recent Posts</h3>
				<?php query_posts('showposts=5'); ?>
				<ul>
					<?php while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
					<?php endwhile;?>
				</ul>
		</div>
		
		<div class="block">
			<h3>Archives</h3>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
		</div>
		
		<div class="block">
			<h3>Meta</h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
					<?php wp_meta(); ?>
				</ul>
		</div>
		
	<?php endif; ?>
	</div>