<div class="searchform">
    <form action="<?php bloginfo('url'); ?>" method="get">
			<?php
            $search = $_GET['s'];
            $search= ($search != "") ? $search: "Search...";
            ?>
			
			<fieldset>
			<input id="s" type="text" name="s" value="<?php echo $search; ?>" onfocus="this.value= (this.value == 'Search...') ?  '' : this.value;" onblur="this.value='Search...';" />
			<input id="x" type="submit" value="Go" />
			</fieldset>
		
            <!--<div class="texts"> <input type="text"  name="s" class="txt"  id="s"  value="<?php echo $search; ?>" onfocus="this.value= (this.value == 'Search...') ?  '' : this.value;" onblur="this.value='Search...';"/></div>
    		<div class="btn"><input type="image" src="<?= bloginfo('stylesheet_directory');?>/images/search_img.jpg" alt="SEARCH" class="submit" /></div>-->
     </form>
</div>