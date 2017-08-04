<?php
/**
 * Template Name: Services
 *
 *
 */

get_header(); ?>
    <div class="wrapper template-services">
        <div id="primary" class="site-content left-column">
            <div id="content" role="main">
				<?php if ( have_posts() ) : the_post(); ?>
                    <div class="entry-content">
                        <?php $post = get_post(5);
                        setup_postdata($post);
                        $rep_e_header = get_field("rep_e_header");
                        $faqs_header = get_field("faqs_header");
                        $learn_more_text = get_field("learn_more_text");
                        wp_reset_postdata();?>
                        <h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
                        <?php $args = array(
	                        'post_type'      => 'profile',
	                        'posts_per_page' => -1,
	                        'orderby'        => 'rand',
	                        'meta_query'     => array(
		                        array(
			                        'key'     => 'service_category', // name of custom field
			                        'value'   => ''.get_the_ID(), // matches exaclty "123",
			                        'compare' => 'LIKE',
		                        )
	                        )
                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()):?>
	                        <?php if($rep_e_header):?>
                                <h2><?php echo $rep_e_header;?></h2>
	                        <?php endif; ?>
                            <div class="representative-experience clear-bottom">
                                <?php $count = 0;
                                while($query->have_posts()):
                                    $query->the_post();
	                                $image   = get_field( 'featured_image' );
	                                $title   = $image['title'];
	                                $alt     = $image['alt'];
	                                $size    = 'rep-e';
	                                $url = $image['url'];
	                                $thumb   = $image['sizes'][ $size ];?>
                                    <?php if($image): ?>
                                        <div class="experience js-blocks count-<?php echo $count%3;?>">
                                            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"/>
                                            <div class="overlay">
                                                <a class="popup-link" href="<?php echo '#'.$post->post_name;?>">
                                                    <?php $square_footage = get_field("square_footage");
                                                    $address = get_field("address");
                                                    if($square_footage):?>
                                                        <div class="square-footage">
                                                            <?php echo $square_footage;?>
                                                        </div><!--.square-footage-->
                                                    <?php endif;?>
                                                    <?php if($address):?>
                                                        <div class="address">
                                                            <?php echo $address;?>
                                                        </div><!--.address-->
                                                    <?php endif;?>
                                                    <?php if($learn_more_text):?>
                                                        <div class="learn-more">
                                                                <?php echo $learn_more_text;?>
                                                        </div><!--.learn-more-->
                                                    <?php endif;?>
                                                </a>
                                            </div><!--.overlay-->
                                            <div class="hidden">
                                                <div id="<?php echo $post->post_name?>" class="rep-e-popup">
                                                    <?php $description = get_field("description");?>
                                                    <div class="title">
                                                        <h2><?php echo get_the_title();?></h2>
                                                    </div><!--.title-->
                                                    <?php if($address):?>
                                                        <div class="address">
                                                            <?php echo $address;?>
                                                        </div><!--.address-->
                                                    <?php endif;?>
                                                    <div class="featured-image">
                                                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"/>
                                                    </div><!--.featured-image-->
                                                    <?php if($description):?>
                                                        <div class="description copy">
                                                            <?php echo $description;?>
                                                        </div><!--.description .copy -->
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div><!--.experience-->
                                        <?php $count++;
                                    endif; //if for image
                                endwhile;?>
                            </div><!--.representative-experience-->
                        <?php wp_reset_postdata();
                        endif;?>
						<?php if ( have_rows( 'faqs' ) ): ?>
							<?php if($faqs_header):?>
                                <h2><?php echo $faqs_header;?></h2>
							<?php endif; ?>
                            <div class="faqs">
								<?php while ( have_rows( 'faqs' ) ): the_row();

									$question = get_sub_field( 'question' );
									$answer   = get_sub_field( 'answer' );

									?>
                                    <div class="faqrow">
                                        <div class="question">
                                            <div class="question-image"></div><!--question-image-->
											<?php the_sub_field( 'question' ); ?>
                                        </div><!--question-->
                                        <div class="answer"><?php the_sub_field( 'answer' ); ?></div><!--answer-->
                                    </div><!-- faqrow -->

								<?php endwhile; ?>
                            </div><!-- faqs -->
						<?php endif; ?>
                    </div><!-- entry content -->

				<?php endif; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <aside class="right-column">

            <div class="service-list">

                <div class="viewlistings-map">
                    <a href="<?php bloginfo( 'url' ); ?>/our-properties">Search Listings</a>
                </div><!-- view listings -->

                <div class="property-list-content">
                    <h3>Other Services</h3>
                    <ul class="listings">
						<?php $args = array(
							'authors'     => '',
							'title_li'    => __( '' ),
							'child_of'    => 5,
							'depth'       => 0,
							'post_type'   => 'page',
							'sort_column' => 'menu_order, post_title',
							'sort_order'  => '',
							'walker'      => new Walker_Page
						); ?>
						<?php wp_list_pages( $args ); ?>
                    </ul>
                </div><!--property-list content -->
            </div><!--property-list -->
            <div class="contact-text">
                <?php $contact_text = get_field("contact_sidebar_text");
                if($contact_text){
                    echo $contact_text;
                }?>
            </div><!--.contact-text-->
	            <?php
	            $people = get_posts( array(
		            'post_type'      => 'team',
		            'posts_per_page' => - 1,
		            'orderby'        => 'menu_order',
		            'order'          => 'ASC',
		            'meta_query'     => array(
			            array(
				            'key'     => 'featured_category', // name of custom field
				            'value'   => '"' . get_the_ID() . '"', // matches exaclty "123",
				            'compare' => 'LIKE'
			            )
		            )
	            ) );
	            if ( $people ):?>
		            <div class="person-list featured">
		            <?php foreach ( $people as $post ):
			            setup_postdata( $post );

			            $image = get_field( 'team_photo' );
			            $url   = $image['url'];
			            $title = $image['title'];
			            $alt   = $image['alt'];
			            $size  = 'thumbnail';
			            $thumb = $image['sizes'][ $size ];
			            $job_title = get_field('job_title');
			            $direct_phone = get_field('direct_phone');
			            $email = get_field('email');
			            ?>
                        <div class="sideperson featured clear-bottom">
                            <a href="<?php the_permalink(); ?>">
                                <div class="sideperson-thumb">
                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"
                                         title="<?php echo $title; ?>"/>
                                </div><!--sideperson-->
                                <div class="info">
                                    <div class="sideperson-title">
                                        <?php the_title(); ?>
                                    </div><!--sideperson-->
                                    <?php if($job_title): ?>
                                        <div class="sideperson-job-title"><?php echo $job_title; ?></div><!--.sideperson-job-title-->
                                    <?php endif; ?>
                                    <?php if($direct_phone): ?>
                                        <div class="sideperson-direct-phone">
                                            <?php echo $direct_phone; ?>
                                        </div><!--.sideperson-job-title-->
                                    <?php endif; ?>
                                    <?php if($email): ?>
                                        <div class="sideperson-email">
                                            <?php echo $email; ?>
                                        </div><!--.sideperson-job-title-->
                                    <?php endif; ?>
                                </div><!--.info-->
                            </a>
                        </div><!--sideperson-->
                        <div class="clear"></div>
		            <?php endforeach; ?>
		            <?php wp_reset_postdata(); ?>
                    </div><!--person list featured-->
	            <?php endif; ?>
	            <?php
	            $people = get_posts( array(
		            'post_type'      => 'team',
		            'posts_per_page' => - 1,
		            'orderby'        => 'menu_order',
		            'order'          => 'ASC',
		            'meta_query'     => array(
			            array(
				            'key'     => 'service_category', // name of custom field
				            'value'   => '"' . get_the_ID() . '"', // matches exaclty "123",
				            'compare' => 'LIKE'
			            )
		            )
	            ) );
	            if ( $people ):?>

            <div class="person-list">
		            <?php foreach ( $people as $post ):
			            setup_postdata( $post );

			            $image = get_field( 'team_photo' );
			            $url   = $image['url'];
			            $title = $image['title'];
			            $alt   = $image['alt'];
			            $size  = 'thumbnail';
			            $thumb = $image['sizes'][ $size ];
			            $job_title = get_field('job_title');
			            ?>
                        <div class="sideperson clear-bottom">
                            <a href="<?php the_permalink(); ?>">
                                <div class="sideperson-thumb">
                                    <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"
                                         title="<?php echo $title; ?>"/>
                                </div><!--sideperson-->
                                <div class="info">
                                    <div class="sideperson-title">
                                        <?php the_title(); ?>
                                    </div><!--sideperson-->
                                    <?php if($job_title): ?>
                                        <div class="sideperson-job-title"><?php echo $job_title; ?></div><!--.sideperson-job-title-->
                                    <?php endif; ?>
                                </div><!--.info-->
                            </a>
                        </div><!--sideperson-->
                        <div class="clear"></div>
		            <?php endforeach; ?>
		            <?php wp_reset_postdata(); ?>
            </div><!--person list-->
	            <?php endif; ?>
			<?php

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

			if ( $testimonials ): ?>
                <div class="testimonial testimonial-page">
                    <ul class="slides">
						<?php foreach ( $testimonials as $testimonial ):
							// get those id's for the fields
							$ID = $testimonial->ID;
							$job_title = get_field( 'job_title', $ID );
							$company = get_field( 'company', $ID );
							$testimonial = get_field( 'testimonial', $ID );
							$title = get_the_title( $ID );
							$reviewer_name = get_field('name', $ID);
							$reviewer_title = get_field('title', $ID);
							?>

                            <li>
                                <div class="the-testimonial"><?php echo $testimonial; ?></div>
                                <div class="testi-creds">
                                    <?php if($reviewer_name): ?>
                                        <div class="the-testimonial-name">
                                            <div class="reviewer-name"><?php echo $reviewer_name; ?></div>
                                            <?php if($reviewer_title): ?>
                                                <div class="reviewer-title"><?php echo $reviewer_title; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="the-testimonial-name"><?php echo $title; ?></div>
									<?php endif;
									if ( $job_title != '' ) :
										echo '<div class="the-testimonial-jt">, ' . $job_title . '</div>';
									endif; ?>
									<?php if ( $company != '' ) :
										echo '<div class="the-testimonial-company">, ' . $company . '</div>';
									endif; ?>
                                </div><!-- creds -->
                            </li>

						<?php endforeach; ?>
                    </ul><!-- slides -->
                </div><!-- .testimonial -->
				<?php wp_reset_postdata();
			endif; ?>
        </aside><!--.sidebar-->
    </div><!-- wrapper -->
<?php get_footer(); ?>