<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

    <![endif]-->
    <script src="https://use.fontawesome.com/4945cee666.js"></script>
<?php wp_head(); ?>

<script> var _ctct_m = "9c3822df0b3a391dd4fa42a1f1b95cc9"; </script>
                <script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
                <!-- End Constant Contact Active Forms -->

<link rel='stylesheet' id='twentytwelve-style-css'  href='<?php bloginfo('template_url'); ?>/style.css?ver=5' type='text/css' media='all' />  
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<div class="top">
    <div class="top-wrapper clear-bottom">
        <div class="top-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
        </div><!-- top nav -->
    </div><!-- wrapper -->
</div><!-- top -->

	<header id="masthead" class="site-header" role="banner">
    <div class="wrapper clear-bottom">
		<?php if(is_home()) { ?>
            <h1 class="logo">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
            </h1>
        <?php } else { ?>
            <div class="logo">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
            </div>
        <?php } ?>
        
       <div class="header-right"> 
			<?php acc_social_links(); ?>
        	<div class="phone"><?php the_field('phone_number','option'); ?></div>
        </div><!-- header-right -->

        </div><!-- wrapper -->
        
		

        <nav id="site-navigation" class="main-navigation" role="navigation">
        
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
               
            </nav><!-- #site-navigation -->



        <div class="red-border"></div>
	
	</header><!-- #masthead -->

	<div id="main" class="">