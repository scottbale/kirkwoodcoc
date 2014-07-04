<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

<?php wp_head(); ?>

</head>

<body>

	<div id="header">
		<div id="logo">

		<a href="<?php echo get_option('home'); ?>">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/header.gif" alt="Wordpress" />
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/address.gif" alt="Wordpress" />
		</a>

		</div>
		<div id="nav">
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
			<ul>
				<li>
				<a title="Sermon audio" href="?cat=4">Sermon audio</a>
				</li>
				<li>
				<a title="Bulletin Articles" href="?cat=3">Bulletin articles</a>
				</li>

			</ul>
		</div>
	</div>
	