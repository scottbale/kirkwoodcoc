<?php
/*
Plugin Name: sermon banner
*/

function get_sermon_banner() {

    if ( function_exists('dynamic_sidebar')  && is_dynamic_sidebar('Blurb') ) {

        echo '<div class="banner">';
        echo '<div class="bannerline">';
	    dynamic_sidebar('Blurb');
	    echo '</div>';
	    echo '</div>';

	}

    echo '<div class="banner audiobanner bottomborder">';
    if (have_posts()) {
        $count = 0;

        while (have_posts() && $count<2) {

            the_post();

            if ( in_category('3') ) {

                $count++;

				echo '<div class="bannerline">';
                echo get_post_meta( get_the_ID(), 'speaker', true);
                echo ' <a title="Download the sermon audio" href="' . get_the_permalink() . '">' . get_the_title() . '</a> - ';
                echo get_post_meta( get_the_ID(), 'dateRecorded', true);
				echo '</div>';
            }
        }
    }

    echo '</div>';
}

?>