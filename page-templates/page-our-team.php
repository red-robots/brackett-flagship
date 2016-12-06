<?php
/**
 * Template Name: Our Team
 *
 * 
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="entry-content">
                	<h1><?php the_title(); ?></h1>
               </div><!-- entry content -->
			<?php endwhile; // end of the loop. ?>
            
<?php
$i=0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : $wp_query->the_post();
	$i++;
	$image = get_field('team_photo');
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];
	$size = 'profile';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
	$jobTitle = get_field('job_title');
	$dPhone = get_field('direct_phone');
	$mPhone = get_field('mobile_phone');
	$oPHone = get_field('office_phone');
	$email = get_field('email');
	$obfsc = antispambot($email);
	$vcard = get_field('vcard');
	
	if( $i == 4 ) {
		$profileClass = 'profile-last';
		$i = 0;
	} else {
		$profileClass = 'profile-first';
	}
	?>
  
    
    <div class="profile-wrapper <?php echo $profileClass; ?>">
    <div class="profile blocks">
    	 <div class="profile-image">
         <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
    	</div><!-- profile image -->
        
        <div class="profile-title"><?php the_title(); ?></div>
        
        <?php if( $jobTitle != '' ) {echo '<div class="profile-name">'.$jobTitle.'</div>';} ?>
        
        <?php if( $dPhone != '' ) {echo '<div class="profile-phone">D.'.$dPhone.'</div>';} ?>
        <?php if( $mPhone != '' ) {echo '<div class="profile-phone">M.'.$mPhone.'</div>';} ?>
        <?php if( $oPhone != '' ) {echo '<div class="profile-phone">O.'.$oPhone.'</div>';} ?>
        
        <?php if( $email != '' ) {
				echo '<div class="profile-email"><a href="mailto:'.$obfsc.'">'.$obfsc.'</a></div>';
			} ?>
            
         <?php if( $vcard != '' ) {
				echo '<div class="profile-card"><a href="'.$vcard.'">download vcard</a></div>';
			} ?>
            
            <div class="clear"></div>
            
            <div class="seemore-team"><a href="<?php the_permalink(); ?>">Full Bio</a></div><!-- seemore -->
    </div><!-- profile -->
    </div><!-- profile wrapper  -->
    
    <?php endwhile; ?>
    <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php get_footer(); ?>