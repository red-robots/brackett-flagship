<?php
/**
 * Template Name: Signup
 *
 * 
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                <h1><?php the_title(); ?></h1>
				<div class="news-contact-form">
				<?php //gravity_form( 1, false, false, false, '', false );?>
				<!-- Begin Constant Contact Inline Form Code -->
				<div class="ctct-inline-form" data-form-id="47bcc169-a8a7-4405-b058-90e3f12e7595"></div>
				<!-- End Constant Contact Inline Form Code -->
			</div><!--.news-contact-form-->

			</div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>