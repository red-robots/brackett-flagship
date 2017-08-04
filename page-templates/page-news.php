<?php
/**
 * Template Name: News
 *
 * 
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">
	<div class="entry-content">
    	<h1><?php the_title(); ?></h1>
    </div><!-- entry content -->
			<?php 	
			$wp_query = new WP_Query();
			$wp_query->query(array(
			'post_type'=>'post',
			'posts_per_page' => 10,
			'paged' => $paged,
		));
			if ($wp_query->have_posts()) : ?>
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			
                
     <div class="news-wrapper">
        <div class="news">
        
            <h2><?php the_title(); ?></h2>
            
            <div class="entry-content">
				<?php the_post_thumbnail("large");?>
            	<?php the_excerpt(); ?>
            </div><!-- entry content -->
            
            <div class="seemore"><a href="<?php the_permalink(); ?>">Read Full Article</a></div><!-- seemore -->
            
         </div><!-- property -->
     </div><!-- property-wrapper -->
                
                
			<?php endwhile; // end of the loop. ?>
            <div class="clear"></div>
             <?php pagi_posts_nav(); ?>
             <div class="clear"></div>
            <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    <?php get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>