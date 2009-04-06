	<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('Sidebar') ) : ?>

		<div class="block">
			<h3>Contact Us</h3>
			<ul>
				<li><a href="mailto:<?php bloginfo('admin_email'); ?>">Email: <b> <?php bloginfo('admin_email'); ?> </b></a></li>
				<li class="nolink">Phone: <b>(314) 821-4910</b></li>
				<li><a href=http://maps.google.com/maps?ie=UTF8&hl=en&cid=4773445581001786915&ll=38.571413,-90.414906&spn=0.009982,0.022745&z=16&iwloc=A" target="_google">Address: <b> 928 Geyer Road </b></a></li>
			</ul>
		</div>

		<div class="block">
			<h3>Recent</h3>
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
					<li><a title="Subscripe to RSS updates" href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed-icon-14x14.png" /> Subscribe</a></li>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
		</div>
		
	<?php endif; ?>
	</div>