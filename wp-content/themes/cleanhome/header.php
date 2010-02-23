<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> All updates" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Sermons" href="<?php bloginfo('wpurl'); ?>/category/sermon/feed" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Articles" href="<?php bloginfo('wpurl'); ?>/category/article/feed" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> News" href="<?php bloginfo('wpurl'); ?>/category/news/feed" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

</head>



<body>



<div id="wrapper">



	<div id="header">

		<div id="logo">
		<h1>

		<a href="<?php echo get_option('home'); ?>">
		<?php bloginfo('name'); ?></a>
		</h1>
		
		<h2><?php bloginfo('description'); ?></h2>
		
		</div>

		<div id="nav">
		<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('Top Navigation') ) : ?>

			<ul>

				<?php wp_list_pages('title_li='); ?>
                <?php wp_list_categories( 'orderby=id&order=ASC&title_li' ); ?>

			</ul>
		<?php endif; ?>

		</div>

	</div>
	




