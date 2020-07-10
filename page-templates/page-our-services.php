<?php
/**
 * Template Name: Our Services Page
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
                    <?php the_content(); ?>
                </div><!-- entry content -->
			<?php 
			$id = get_the_ID(); 
			endwhile; // end of the loop. ?>
            
            
<?php
$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'page',
	'post_parent' => $id
));
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 
	$image = get_field('team_photo'); 
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
 	$size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];
	$i++;
	
	if( $i == 3 ) {
		$class = 'service-last';
		$i = 0;
	} else {
		$class = 'service-first';
	}
	
	?>
    
    <div class="service-page <?php echo $class; ?> ">
    <a class="blocks" href="<?php the_permalink(); ?>">
    	<div class="service-page-content">
        	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('property');
			} ?>
            <h2><?php the_title(); ?></h2>
        </div><!-- service page content -->
        </a>
    </div><!-- service page -->


<?php endwhile; endif; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php get_footer(); ?>