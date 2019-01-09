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
				<?php //gravity_form( 1, false, false, false, '', false );?>
				<!-- Begin Constant Contact Active Forms -->
				<script> var _ctct_m = "9c3822df0b3a391dd4fa42a1f1b95cc9"; </script>
				<script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
				<!-- End Constant Contact Active Forms -->
			</div><!--.news-contact-form-->
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>