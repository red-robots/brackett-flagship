<?php
/**
 * Template Name: Representative Experience
 *
 *
 */

get_header(); ?>
    <div class="wrapper template-rep-e">
        <div id="primary" class="site-content">
            <div id="content" role="main">
				<?php if ( have_posts() ) : the_post(); ?>
                    <div class="entry-content">
                        <?php $post = get_post(5);
                        setup_postdata($post);
                        $learn_more_text = get_field("learn_more_text");
                        wp_reset_postdata();?>
                        <h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
                        <?php $args = array(
	                        'post_type'      => 'profile',
	                        'posts_per_page' => -1,
	                        'orderby'        => 'rand',
                        );
                        $query = new WP_Query($args);
                        if($query->have_posts()):?>
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
                                        <div class="experience js-blocks count-<?php echo $count%4;?> countmod3-<?php echo $count%3;?>">
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
                    </div><!-- entry content -->
				<?php endif; // end of the loop. ?>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- wrapper -->
<?php get_footer(); ?>