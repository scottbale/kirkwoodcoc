
	<div id="footer">	
	<p>&copy; Copyright <?php echo date("Y") ?> | <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a> 
	
	| powered by
		<a href="http://wordpress.org/">WordPress</a>
	|
	<a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
	
		
		
	</p>
	<p><?php wp_footer() ?></p>
	</div>

	<div>
		<h3>Meta</h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
				<?php wp_meta(); ?>
			</ul>
	</div>

</div>

<!-- Can put web stats code here -->

</body>

</html>