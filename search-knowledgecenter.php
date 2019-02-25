<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="wrapper">
	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php 
		$i =0;
		if ( have_posts() ) : ?>
        
        <div class="entry-content">
                	<h1><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php //the_content(); ?>
                </div><!-- entry content -->

		

			<?php //twentytwelve_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
                
        
     
     
     <div class="news-wrapper">
        <div class="news">
        
            <h2><?php the_title(); ?></h2>
            
            <div class="entry-content">
            	<?php the_excerpt(); ?>
            </div><!-- entry content -->
            
            <div class="seemore"><a href="<?php the_permalink(); ?>">Read Full Article</a></div><!-- seemore -->
            
         </div><!-- property -->
     </div><!-- property-wrapper -->
     
    
                
                
			<?php endwhile; ?>

	<div class="clear"></div>
    <?php pagi_posts_nav(); ?>
    <div class="clear"></div>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->
    
    
    
      
</div><!-- wrapper -->
<?php get_footer(); ?>