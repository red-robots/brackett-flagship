<?php
/**
 * The Template for displaying all profile posts
 *
 */
if(get_post(1207)) {
	wp_redirect( get_the_permalink(1207));
}?>