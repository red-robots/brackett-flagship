<?php
/**
 * Template Name: Properties
 *
 *
 */

get_header();
?>
    <div class="wrapper">
        <div id="primary" class="property-content">
            <div id="content" role="main">

				<?php //while ( have_posts() ) : the_post(); ?>
                <div class="entry-content">
                    <h1><?php the_title(); ?></h1>
					<?php //the_content(); ?>
                </div><!-- entry content -->
				<?php //endwhile; wp_reset_query(); // end of the loop. ?>

                <div class="mobile-filter">
                    <div class="toggle"><h3 class="viewlistings-map"><a href="#">Filter Listings By</a></h3></div>
                    <ul class="mobile-listings listings property-list-content">
						<?php
						$args = array(
							'show_option_all'    => '',
							'orderby'            => 'name',
							'order'              => 'ASC',
							'style'              => 'list',
							'show_count'         => 0,
							'hide_empty'         => 1,
							'use_desc_for_title' => 0,
							'child_of'           => 0,
							'feed'               => '',
							'feed_type'          => '',
							'feed_image'         => '',
							'exclude'            => '',
							'exclude_tree'       => '',
							'include'            => '',
							'hierarchical'       => 1,
							'title_li'           => __( '' ),
							'show_option_none'   => __( '' ),
							'number'             => null,
							'echo'               => 1,
							'depth'              => 0,
							'current_category'   => 0,
							'pad_counts'         => 0,
							'taxonomy'           => 'markets',
							'walker'             => null
						);
						wp_list_categories( $args );

						?>
                    </ul>
                </div><!-- list -->
				<?php
				$i        = 0;
				$wp_query = new WP_Query();
				$wp_query->query( array(
					'post_type'      => 'property',
					'posts_per_page' => - 1,
					'paged'          => $paged,
					'orderby'        => 'rand',
					/*'order' => 'ASC'*/
				) );
				if ( $wp_query->have_posts() ) : ?>
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
						// image
						$image   = get_field( 'image_of_property' );
						$url     = $image['url'];
						$title   = $image['title'];
						$alt     = $image['alt'];
						$caption = $image['caption'];
						$size    = 'property';
						$thumb   = $image['sizes'][ $size ];
						$width   = $image['sizes'][ $size . '-width' ];
						$height  = $image['sizes'][ $size . '-height' ];
						// other variables
						$address  = get_field( 'address' );
						$location = $address['address'];
						if ( strpos( $location, 'United States' ) !== false ) {
							$us = ', United States';
						} else if ( strpos( $location, 'USA' ) !== false ) {
							$us = ', USA';
						}
						$trimmedAdd = str_replace( $us, '', $location );
						$addYourAdd = get_field( 'add_your_own_address' );
						$customAdd  = get_field( 'custom_address' );
						$i ++;
						// set float class
						if ( $i == 2 ) {
							$profileClass = 'property-last';
							$i            = 0;
						} else {
							$profileClass = 'property-first';
						}
						?>

                        <div class="property-wrapper <?php echo $profileClass; ?>">
                            <div class="property blocks">

								<?php if ( $image != '' ) : ?>
                                    <div class="property-image">
                                        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"
                                             title="<?php echo $title; ?>"/>
                                    </div><!-- profile image -->
								<?php endif; ?>

                                <div class="property-title"><?php the_title(); ?></div>

								<?php if ( $image != '' ) : ?>
                                    <div class="property-address">
										<?php
										if ( $addYourAdd == 'Yes' ) {
											echo $customAdd;
										} else {
											echo $trimmedAdd;
										}
										?>
                                    </div><!--property-address-->
								<?php endif; ?>


                                <div class="seemore"><a href="<?php the_permalink(); ?>">Details</a></div>
                                <!-- seemore -->

                            </div><!-- property -->
                        </div><!-- property-wrapper -->

					<?php endwhile; ?>
                    <div class="clear"></div>
					<?php pagi_posts_nav(); ?>
                    <div class="clear"></div>
				<?php endif; ?>

            </div><!-- #content -->
        </div><!-- #primary -->

        <div class="property-list">

            <div class="viewlistings-map">
                <a href="<?php bloginfo( 'url' ); ?>/map">View listings by Map</a>
            </div><!-- view listings -->


			<?php get_template_part( 'inc/property-search' ); ?>

            <div class="property-list-content">
                <h3>Filter Listings By</h3>
                <ul class="listings">
					<?php
					$args = array(
						'show_option_all'    => '',
						'orderby'            => 'name',
						'order'              => 'ASC',
						'style'              => 'list',
						'show_count'         => 0,
						'hide_empty'         => 1,
						'use_desc_for_title' => 0,
						'child_of'           => 0,
						'feed'               => '',
						'feed_type'          => '',
						'feed_image'         => '',
						'exclude'            => '',
						'exclude_tree'       => '',
						'include'            => '',
						'hierarchical'       => 1,
						'title_li'           => __( '' ),
						'show_option_none'   => __( '' ),
						'number'             => null,
						'echo'               => 1,
						'depth'              => 0,
						'current_category'   => 0,
						'pad_counts'         => 0,
						'taxonomy'           => 'markets',
						'walker'             => null
					);
					wp_list_categories( $args );

					?>
                </ul>
            </div><!-- list -->
        </div><!-- list -->


    </div><!-- wrapper -->
<?php get_footer(); ?>