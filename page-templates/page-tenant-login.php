<?php
/**
 * Template Name: Tenant Login
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
    				<?php the_content();?>  
					<div class="tenant-login">
						<form id="loginForm" accept-charset="UTF-8" action="http://brackettflagship.buildingengines.com/geofire/servlet/login" method="post"><input id="bldgconnect" name="bldgconnect" type="hidden" value="true" /><input class="required modern" maxlength="60" name="j_username" type="text" placeholder="Username" data-error="Username is required." />
							<input class="required modern" maxlength="60" name="j_password" type="password" placeholder="Password" data-error="Password is required." />
							<input name="info_checkbox" type="hidden" value="1" />
							<a class="txttheme" href="http://brackettflagship.buildingengines.com/geofire/BDPW?tsp=FPW">Forgot Password?</a>
							<button class="secondarybg txttheme modern ui-login" type="submit">Login</button>
						</form>
					</div><!-- tenant login -->          
                </div><!-- entry content -->                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>