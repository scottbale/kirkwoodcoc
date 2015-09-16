	<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('Sidebar') ) : ?>


        <!-- TODO hours should be a custom tag or plugin -->
        <div class="block">
			<h3>Times</h3>
            <h4>Sunday</h4>
            <ul>
        <li class="nolink">9:30 a.m. bible class</li>
        <li class="nolink">10:20 a.m. morning worship</li>
        <li class="nolink">6:00 p.m. evening worship</li>
            </ul>
            <h4>Wednesday</h4>
            <ul>
        <li class="nolink">7:00 p.m. bible class</li>
            </ul>
        </div>
       
		<div class="block">
			<h3>Contact Us</h3>
			<ul>
				<li><a href="mailto:<?php bloginfo('admin_email'); ?>">Email: <b> <?php bloginfo('admin_email'); ?> </b></a></li>
				<li class="nolink">Phone: <b>(314) 821-4910</b></li>
				<li><a href=http://maps.google.com/maps?ie=UTF8&hl=en&cid=4773445581001786915&ll=38.571413,-90.414906&spn=0.009982,0.022745&z=16&iwloc=A" target="_google">Address: <b> 948 S. Geyer Road </b></a></li>
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
				<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
				<?php wp_get_archives('type=monthly&format=option'); ?>
				</select>
		</div>
		
		<div class="block">
			<h3></h3>
				<ul>
					<?php wp_register(); ?>
                    <li><a href="https://www.facebook.com/kirkwoodcoc"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/fb.png" /> Facebook</a></li>
                    <li><a href="https://www.twitter.com/kirkwoodcoc"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png" /> Twitter</a></li>
					<li><a title="Subscribe to all updates" href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/04.png" /> Subscribe</a></li>
                    <?php $url = get_bloginfo("wpurl"); ?>
                    <li><a title="Subscribe to Sermons Podcast" href="<?php $url; ?>/category/sermon/feed"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/17.png" /> Podcast </a></li>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
		</div>
		
	<?php endif; ?>
	</div>