<?php
/**
 * The Template for displaying all single posts
 *
 * 
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
			
            $image = get_field('team_photo');
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];
            $caption = $image['caption'];
            $size = 'large';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ];
            $jobTitle = get_field('job_title');
            $dPhone = get_field('direct_phone');
            $mPhone = get_field('mobile_phone');
            $oPhone = get_field('office_phone');
            $email = get_field('email');
            $obfsc = antispambot($email);
            $vcard = get_field('vcard');
            $experience = get_field('professional_experience');
            $affiliations = get_field('affiliations_accreditations_and_interests');
            $education = get_field('education');
            $fact = get_field('funfact');
			
			?>

				<div class="entry-content">
                <h1><?php the_title(); ?></h1>
                
                <div class="single-profile-image">
                	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                </div><!-- signel profile pic -->
                
                <div class="single-profile-details">
                	
        
					<?php if( $jobTitle != '' ) {echo '<div class="single-profile-name">'.$jobTitle.'</div>';} ?>
                    
                    <?php if( $dPhone != '' ) {echo '<div class="single-profile-phone">D.'.$dPhone.'</div>';} ?>
                    <?php if( $mPhone != '' ) {echo '<div class="single-profile-phone">M.'.$mPhone.'</div>';} ?>
                    <?php if( $oPhone != '' ) {echo '<div class="single-profile-phone">O.'.$oPhone.'</div>';} ?>
                    
                    <?php if( $email != '' ) {
                            echo '<div class="single-profile-email"><a href="mailto:'.$obfsc.'">'.$obfsc.'</a></div>';
                        } ?>
                        
                     <?php if( $vcard != '' ) {
                            echo '<div class="single-profile-card"><a href="'.$vcard.'">download vcard</a></div>';
                        } ?>
                </div><!-- single profile details -->
                
                <div class="clear"></div>
                
                <?php if( $experience != '' ) { ?>
                    <div class="single-profile-extras">
                    	<h3>Professional Experience</h3>
                        <?php echo $experience; ?>
                    </div><!-- signel profile extras -->
                <?php } ?>
                
                <?php if( have_rows('affiliations_accreditations_and_interests') ) : ?>
                	<div class="single-profile-extras">
                    	<h3>Affiliatons, Accreditations, and Interests</h3>
                        <ul>
                        <?php while( have_rows('affiliations_accreditations_and_interests') ) : the_row(); ?>
                        		<li><?php the_sub_field('bullet'); ?></li>
                        <?php endwhile; ?>
                        </ul>
                    </div><!-- signel profile extras -->
                <?php endif; ?>
                
                <?php if( $education != '' ) { ?>
                    <div class="single-profile-extras">
                    	<h3>Education</h3>
                        <?php echo $education; ?>
                    </div><!-- signel profile extras -->
                <?php } ?>
                
                <?php if( $fact != '' ) { ?>
                    <div class="single-profile-extras">
                    	<h3>Fun Fact</h3>
                        <?php echo $fact; ?>
                    </div><!-- signel profile extras -->
                <?php } ?>
                
                
                <?php //the_content(); ?>
                </div><!-- tentru contetn -->

				

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
    <div class="teamlist">
    	
        	<h3>Our Team</h3>
            <?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'team',
				'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
				));
				if ($wp_query->have_posts()) : ?>
                <ul class="ourteam-list">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                
                	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                
                <?php endwhile; ?>
                </ul>
                <?php endif; ?>
        
    </div><!-- widget area -->
    
</div><!-- wrapper -->
<?php get_footer(); ?>