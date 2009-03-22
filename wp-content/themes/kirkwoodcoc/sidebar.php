	<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('Sidebar') ) : ?>

		<div class="block">
			<h3>Archives</h3>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
		</div>

		
		
	<?php endif; ?>
	</div>