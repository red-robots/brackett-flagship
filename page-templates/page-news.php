<?php
/**
 * Template Name: News
 *
 * 
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="site-content-full">
		<div id="content" role="main">
	<div class="entry-content">
    	<h1><?php the_title(); ?></h1>
    	<div class="search">
    		<?php //get_search_form(); ?>
    		<form role="search" action="<?php echo home_url('/'); ?>" method="get" id="searchform">
	    		<input type="text" name="s" placeholder="Search the News" id="s" />
	    		<input type="hidden" name="post_type" value="post" />
	    		<input type="submit" alt="Search" value="Search" id="searchsubmit" />
    		</form>
    	</div>
    </div><!-- entry content -->
			<?php 	
			$wp_query = new WP_Query();
			$wp_query->query(array(
			'post_type'=>'post',
			'posts_per_page' => 12,
			'paged' => $paged,
		));
			if ($wp_query->have_posts()) : ?>
	<section class="newsroll">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			
                
			     <div class="news-wrapper js-blocks">
			        <div class="news">
			        	<?php the_post_thumbnail("large");?>
			            <h2><?php the_title(); ?></h2>
			            
			            <div class="entry-content">
							
			            	<?php the_excerpt(); ?>
			            </div><!-- entry content -->
			            
			            <div class="seemore">
			           	 <a href="<?php the_permalink(); ?>">Read Full Article</a>
			            </div>
			            
			         </div><!-- property -->
			     </div><!-- property-wrapper -->
                
                
			<?php endwhile; // end of the loop. ?>
            <div class="clear"></div>
             <?php pagi_posts_nav(); ?>
             <div class="clear"></div>
    </section>
            <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    <?php //get_sidebar("news"); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>