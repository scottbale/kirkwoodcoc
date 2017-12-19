<?php get_header(); ?>

<?php if ( function_exists( 'get_sermon_banner' ) ) get_sermon_banner(); ?>

<div id="content">
    <img class="home" src="<?php bloginfo('stylesheet_directory'); ?>/images/bldgSmallMarshall.jpg" />
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>