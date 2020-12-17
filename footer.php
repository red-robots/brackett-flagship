<?php
/**
 * The template for displaying the footer
 *
 *
 */
 wp_reset_query();
?>
	</div><!-- #main .wrapper -->
    <?php if( is_front_page()) {
			$adClass = 'address-home';
		} else {
			$adClass = 'address-page';
		} ?>

       <!--  <div class="wrapper">
			<div class="footer-address address-page<?php //echo $adClass; ?>">
			<?php //the_field('address', 'option'); ?>
            </div>
         </div> -->


	<footer id="colophon" role="contentinfo">
		<div class="wrapper">
			<div class="col-1 bottom-nav">
    	        <?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
			</div><!--.col-1-->
		<?php
			$sitemap = get_field('sitemap_link', 'option');
			$bw = 'http://bellaworksweb.com?site=bracketflagship';

			//echo '<a href="'.$sitemap.'">sitemap</a> | site by <a target="_blank" href="'.$bw.'">Bellaworks</a>';
		?>
			<div class="col-2">
	        	<?php the_field('address', 'option'); ?>
			</div><!--.col-2-->
			<div class="clear"></div>
		</div><!-- .wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php //the_field('google_analytics', 'option'); ?>
<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69717110-1', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>