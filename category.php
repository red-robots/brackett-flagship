<?php
/**
 * The template for displaying Category pages
 *
 *
 */

get_header(); ?>
<div class="wrapper">
	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
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

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>