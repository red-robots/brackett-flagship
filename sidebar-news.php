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

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php $news_sidebar_text = get_field("news_sidebar_text",25);
			if($news_sidebar_text):?>
				<div class="news-text">
					<?php echo $news_sidebar_text;?>
				</div><!--.news-text-->
			<?php endif;?>
			<div class="news-contact-form">
				<?php gravity_form( 1, false, false, false, '', false );?>
			</div><!--.news-contact-form-->
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>