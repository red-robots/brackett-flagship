<?php
/**
 * Template Name: Contact
 * 
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                <h1><?php the_title(); ?></h1>
                
                <div class="contact-left">
                	 <?php the_content(); ?>
                 </div><!-- contact left -->
                 
                 <div class="contact-right">
                 	<?php the_field('map'); ?>
                 </div>
                            
                </div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


</div><!-- wrapper -->
<?php get_footer(); ?>