<?php
/**
 * The template for displaying Archive pages
 *
 *
 */

get_header(); ?>
<div class="wrapper">
	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">Knowledge Center Topics</h1>
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

	<div id="secondary" class="widget-area" role="complementary">

	<div class="widget">
		<h3>Search by Topic</h3>
		<?php 

		$args = array( 'hide_empty=0' );
 
		$terms = get_terms( 'topic', $args );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		    $count = count( $terms );
		    $i = 0;
		    $term_list = '<ul>';
		    foreach ( $terms as $term ) {
		        $i++;
		        $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a></li>';
		        if ( $count != $i ) {
		            $term_list .= ' &middot; ';
		        }
		        else {
		            $term_list .= '</ul>';
		        }
		    }
		    echo $term_list;
		}

		// echo '<pre>';
		// print_r($terms);
		// echo '</pre>';

 		?>
		</div>
	</div>

</div><!-- wrapper -->
<?php get_footer(); ?>