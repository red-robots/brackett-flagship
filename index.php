<?php
/**
 * The main template file
 *
 *
 */

get_header(); ?>


<?php
// Query the Post type Slides
$querySlides = array(
	'post_type'      => 'slides',
	'posts_per_page' => '-1',
	'orderby'        => 'menu_order',
	'order'          => 'ASC'
);
// The Query
$the_query = new WP_Query( $querySlides );
?>
<?php
// The Loop
if ( $the_query->have_posts() ) : ?>

	<div class="flexslider">
		<ul class="slides">
			<?php while ( $the_query->have_posts() ) : ?>
				<?php $the_query->the_post();

				$image   = get_field( 'slide' );
				$url     = $image['url'];
				$title   = $image['title'];
				$alt     = $image['alt'];
				$caption = $image['caption'];
				$size    = 'slide';
				$thumb   = $image['sizes'][ $size ];
				$width   = $image['sizes'][ $size . '-width' ];
				$height  = $image['sizes'][ $size . '-height' ];
				?>

				<li>

					<img
						src="<?php echo $thumb; ?>"
						alt="<?php echo $alt; ?>"
						title="<?php echo $title; ?>"
						width="<?php echo $width; ?>"
						height="<?php echo $height; ?>"/>

				</li>

			<?php endwhile; ?>
		</ul><!-- slides -->
	</div><!-- .flexslider -->


<?php endif; // end loop ?>

<?php wp_reset_postdata(); ?>

	<?php
	/* FEATURED VIDEO */
	$featVideoLink = get_field("featured_video_url",505);
	if($featVideoLink) {
		$parts = parse_url($featVideoLink);
		if(isset($parts['query']) && $parts['query']) {
			$query = $parts['query'];
			$params = array_filter(explode("v=",$query));
			$vidPlaceholder = get_stylesheet_directory_uri() . "/images/rectangle.png";
			if($params) { $videoId = end($params);  ?>
			<div class="home-featured-video">
				<div class="wrap">
					<img src="<?php echo $vidPlaceholder ?>" alt="" aria-hidden="true" class="placeholder">
					<iframe width="1050" height="637" src="https://www.youtube.com/embed/<?php echo $videoId; ?>?feature=oembed&loop=0&rel=0&modestbranding=0&controls=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="display:block;margin:0 auto;"></iframe>
				</div>
			</div>
			<?php }
		}
	}
	?>

	<div class="main-home-content">
		<div class="wrapper">
			<div class="home-latest-news">
				<h2>Latest News</h2>
				<?php
				$wp_query = new WP_Query();
				$wp_query->query( array(
					'post_type'      => 'post',
					'posts_per_page' => 3
				) );
				if ( $wp_query->have_posts() ) : ?>
                    <div class="home-latest-news-wrapper">
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="news-item">
							<a href="<?php the_permalink(); ?>">
								<div class="date"><?php echo get_the_date( 'm.d.y' ); ?></div>

								<?php the_excerpt(  ); ?>
							</a>
						</div><!-- news item -->
					<?php endwhile;?>
                    </div><!--.home-latest-news-wrapper-->
                <?php endif; ?>
			</div><!-- home latest news-->

			<?php
			// pull homepage
			$post = get_post( 505 );
			setup_postdata( $post );

			$title = get_field( 'title' );
			//$content = get_the_content();
			$link = get_field( 'page_link' );
			?>
			<div class="home-summary clear-bottom">
				<div class="home-summary-wrapper">
                    <h2><?php echo $title; ?></h2>
                    <div class="home-summary-content"><?php the_content(); ?></div><!-- home summary content -->
                </div><!--.home-summary-wrapper-->
				<?php if ( $link != '' ) { ?>
					<div class="seemore"><a href="<?php echo $link; ?>">Meet Our Team</a></div><!-- seemore -->
				<?php } ?>
			</div><!-- home summary -->
			<?php wp_reset_postdata();
			wp_reset_query(); ?>
		</div><!-- wrapper -->
	</div><!-- main-home-content -->


<?php
// Let's get in homepage mode.
$post = get_post( 505 ); // My home "page" id = 505
setup_postdata( $post );
/*
	Reverse Query on the Post Object Field 
*/
$testimonials = get_posts( array(
	'post_type'  => 'testimonial',
	'meta_query' => array(
		array(
			'key'     => 'pages_to_show_testimonial', // name of custom field
			'value'   => '"' . get_the_ID() . '"', // matches exaclty "123",
			'compare' => 'LIKE'
		)
	)
) );
// now get out of homepage mode now that we have our testimonials.
wp_reset_postdata();
if ( $testimonials ): ?>
	<section class="the-testis">
		<div class="wrapper">
			<div class="testimonial testimonial-home">
				<ul class="slides">
					<?php foreach ( $testimonials as $testimonial ):
						// get those id's for the fields
						$ID = $testimonial->ID;
						$job_title = get_field( 'job_title', $ID );
						$company = get_field( 'company', $ID );
						$testimonial = get_field( 'testimonial', $ID );
						$title = get_the_title( $ID );
						?>

						<li>
							<div class="the-testimonial"><?php echo $testimonial; ?></div>
							<div class="testi-creds">
								<div class="the-testimonial-name"><?php echo $title; ?></div>
								<?php if ( $job_title != '' ) {
									echo '<div class="the-testimonial-jt">, ' . $job_title . '</div>';
								} ?>
								<?php if ( $company != '' ) {
									echo '<div class="the-testimonial-company">, ' . $company . '</div>';
								} ?>
							</div><!-- creds -->
						</li>

					<?php endforeach; ?>
				</ul><!-- slides -->
			</div><!-- .testimonial -->
		</div><!-- wrapper -->
	</section>
<?php endif;
wp_reset_postdata(); ?>


<?php get_footer(); ?>