<?php
/**
 * Template Name: Services
 *
 * 
 */

get_header(); ?>
<div class="wrapper">

<?php 
// Query the Post type Slides
$querySlides = array(
	'post_type' => 'slides',
	'posts_per_page' => '-1',
	'orderby' => 'menu_order',
	'order' => 'ASC'
);
// The Query
$the_query = new WP_Query( $querySlides );
?>
<?php 
// The Loop
 if ( $the_query->have_posts()) : ?>
 
<div class="flexslider">
        <ul class="slides">
        <?php while ( $the_query->have_posts() ) : ?>
			<?php $the_query->the_post(); 
			
				$image = get_field('slide'); 
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
				$caption = $image['caption'];
				$size = 'slide';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			?>
            
            <li> 
              
             <img 
                 src="<?php echo $thumb; ?>" 
                 alt="<?php echo $alt; ?>" 
                 title="<?php echo $title; ?>" 
                 width="<?php echo $width; ?>" 
                 height="<?php echo $height; ?>" />
                
            </li>
            
           <?php endwhile; ?>
      	 </ul><!-- slides -->
</div><!-- .flexslider -->
 
 
         <?php endif; // end loop ?>

         


	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
			
			
			
			?>
				<div class="entry-content">
                	<h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    
                    
                    <?php if( have_rows('faqs') ): ?>
                    <div class="faqs">
                    <?php while( have_rows('faqs') ): the_row(); 
					
							$question = get_sub_field('question');
							$answer = get_sub_field('answer');
							
					?>
                    <div class="faqrow">
                    	<div class="question">
                        <div class="question-image"></div><!--question-image-->
							<?php the_sub_field('question'); ?>
                        </div><!--question-->
               		<div class="answer"><?php the_sub_field('answer'); ?></div><!--answer-->
                    </div><!-- faqrow -->
                    
                    <?php endwhile; ?>
                    </div><!-- faqs -->
                    <?php endif; ?>
                </div><!-- entry content -->
                
<?php 

/*
	Reverse Query on the Post Object Field 
*/
$testimonials = get_posts(array(
	'post_type' => 'testimonial',
	'meta_query' => array(
		array(
			'key' => 'pages_to_show_testimonial', // name of custom field
			'value' => '"' . get_the_ID() . '"', // matches exaclty "123", 
			'compare' => 'LIKE'
		)
	)
));
// now get out of homepage mode now that we have our testimonials.

if( $testimonials ): ?>                
<div class="testimonial testimonial-page">
    <ul class="slides">
		<?php foreach( $testimonials as $testimonial ): 
        // get those id's for the fields
        $ID = $testimonial->ID;
        $job_title = get_field( 'job_title', $ID ); 
        $company = get_field( 'company', $ID ); 
        $testimonial = get_field( 'testimonial', $ID); 
        $title = get_the_title($ID); 
        ?>
        
            <li> 
                <div class="the-testimonial"><?php echo $testimonial; ?></div>
                <div class="testi-creds">
                <div class="the-testimonial-name"><?php echo $title; ?></div>
                <?php if($job_title != '' ) { echo '<div class="the-testimonial-jt">, '.$job_title.'</div>'; }?>
                <?php if($company != '' ) { echo '<div class="the-testimonial-company">, '.$company.'</div>'; }?>
                </div><!-- creds -->  
            </li>
        
        <?php endforeach; ?>
    </ul><!-- slides -->
</div><!-- .testimonial -->
<?php endif; wp_reset_postdata(); ?>                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
    
    <div class="service-list">
        
         <div class="viewlistings-map">
       		<a href="<?php bloginfo('url'); ?>/our-properties">Search Listings</a>
       </div><!-- view listings -->
       
    	<div class="property-list-content">
        	<h3>Other Services</h3>
            <ul class="listings">
            <?php $args = array(
				'authors'      => '',
				'title_li'     => __(''), 
				'child_of'     => 5,
				'depth'        => 0,
				'post_type'    => 'page',
				'sort_column'  => 'menu_order, post_title',
				'sort_order'   => '',
				'walker'       => new Walker_Page
			); ?>
             <?php wp_list_pages( $args ); ?>
            </ul>
    </div><!--property-list content -->
    
    </div><!--property-list -->
    
    
<div class="person-list">
 <?php
	$people = get_posts(array(
	'post_type' => 'team',
	'posts_per_page'   => -1,
	'orderby'          => 'menu_order',
	'order'            => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'service_category', // name of custom field
			'value' => '"' . get_the_ID() . '"', // matches exaclty "123", 
			'compare' => 'LIKE'
		)
	)
));
 
			
	/*echo '<pre>';
	print_r($people);
	echo '</pre>';*/
	
	if( $people ):
	
	foreach( $people as $post):
	setup_postdata($post);
	
	$image = get_field('team_photo'); 
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
 	$size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];
	
	?>   
    
    <div class="sideperson">
        <a href="<?php the_permalink(); ?>">
                <div class="sideperson-thumb">
                	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                </div><!--sideperson-->
                <div class="sideperson-title">
                    <?php the_title(); ?>
                </div><!--sideperson-->
         </a>
    </div><!--sideperson-->
    
    <div class="clear"></div>
    
 <?php endforeach; ?>
 <?php wp_reset_postdata(); ?>
 <?php endif; ?>  
 
</div><!--person list-->
    
    
</div><!-- wrapper -->
<?php get_footer(); ?>