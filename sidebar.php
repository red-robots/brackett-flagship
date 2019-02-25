<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php 

	if( get_post_type() == 'knowledge_center' ) : ?>

	
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
		<div class="widget">
			<div class="news-contact-form">
				<?php //gravity_form( 1, false, false, false, '', false );?>
				<!-- Begin Constant Contact Inline Form Code -->
				<div class="ctct-inline-form" data-form-id="47bcc169-a8a7-4405-b058-90e3f12e7595"></div>
				<!-- End Constant Contact Inline Form Code -->
			</div><!--.news-contact-form-->
		</div>
	</div>


<?php else: ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
		<?php $news_sidebar_text = get_field("news_sidebar_text",25);
			if($news_sidebar_text):?>
				<div class="news-text">
					<?php echo $news_sidebar_text;?>
				</div><!--.news-text-->
			<?php endif;?>
			<div class="news-contact-form">
				<?php //gravity_form( 1, false, false, false, '', false );?>
				<!-- Begin Constant Contact Inline Form Code -->
				<div class="ctct-inline-form" data-form-id="47bcc169-a8a7-4405-b058-90e3f12e7595"></div>
				<!-- End Constant Contact Inline Form Code -->
			</div><!--.news-contact-form-->
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>

<?php endif; ?>