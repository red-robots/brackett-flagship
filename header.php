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

    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '253750215575184');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=253750215575184&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<?php
wp_head();

?>

<script> var _ctct_m = "9c3822df0b3a391dd4fa42a1f1b95cc9"; </script>
                <script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
                <!-- End Constant Contact Active Forms -->

<!-- <link rel='stylesheet' id='twentytwelve-style-css'  href='<?php bloginfo('template_url'); ?>/style.css?ver=5' type='text/css' media='all' />   -->
</head>

<body <?php body_class(); ?>>
<?php
$banner = get_field('message', 'option');
$bannerLink = get_field('message_link', 'option');
$turnOn = get_field('turn_on', 'option');
$img = get_field('his_photo', 'option');
$msg = get_field('popup_message', 'option');
$smallText = get_field('small_text', 'option');
// echo '<pre>';
// print_r($turnOn);
// echo '</pre>';

if( $turnOn[0] == 'yes' ){ ?>
    <div class="banner">
        <?php if( $bannerLink ){echo '<a href="'.$bannerLink.'" class="popup">';} ?>
            <?php echo $banner; ?>
        <?php if( $bannerLink ){echo '</a>';} ?>
    </div>
<?php } ?>
<div style="display: none;">
    <div id="popup" class="popup-boxz">
        <div class="love">
            <div class="love-text ">
                <h2><span>In Loving Memory</span></h2>
            </div>
        </div>
        <div class="body">
            <img class="imgleft" src="<?php echo $img['url'] ?>" alt="">
            <span class="header">
                <span class="name">W. Charles Campbell</span>
                <span class="date">1966-2020</span>
            </span>
            <span class="justify"><?php echo $msg; ?></span>
            <span class="smalltext"><?php echo $smallText; ?></span>
        </div>
    </div>
</div>
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