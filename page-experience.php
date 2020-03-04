<?php
/**
 * Template Name: Experience (Single Page)
 *
 *
 */
get_header(); 
$serviceCat = ( isset($_GET['svc']) && $_GET['svc'] && is_numeric($_GET['svc']) ) ? $_GET['svc'] : '';
?>
    <div class="wrapper template-rep-e">
        <div id="primary" class="site-content">
            <div id="content" role="main">

                <?php if ($serviceCat) { ?>

                    <div class="entry-content">
                        <h1>Service Category: <?php echo get_the_title($serviceCat); ?></h1>
                        <?php get_template_part("page-templates/experience-bycat"); ?>
                    </div>

                    <?php  } else { ?>
    				
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
    	                        'post_status'      => 'publish',
    	                        'orderby' => 'menu_order', 
    							'order' => 'ASC', 
                            );
                            $query = new WP_Query($args);
                            if($query->have_posts()):?>
                                <div class="representative-experience clear-bottom">
                                    <?php $count = 0;
                                    while($query->have_posts()):
                                        $query->the_post();
                                        $post_title = get_the_title();
                                        $image = get_field( 'featured_image' );
    	                                if($image) { 
                                            $title   = $image['title'];
                                            $alt     = $image['alt'];
                                            $size    = 'rep-e';
                                            $url = $image['url'];
                                            $thumb   = $image['sizes'][ $size ]; ?>
                                            <div data-title="<?php echo $post_title ?>" class="experience js-blocks count-<?php echo $count%4;?> countmod3-<?php echo $count%3;?>">
                                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"/>
                                                <div class="overlay">
                                                    <a class="pageLink" href="<?php echo get_permalink();?>">
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

                                                        <?php //if($learn_more_text):?>
                                                            <!-- <div class="learn-more"> -->
                                                                    <?php //echo $learn_more_text;?>
                                                           <!--  </div> -->
                                                        <?php //endif;?>

                                                    </a>
                                                </div><!--.overlay-->
                                            
                                            </div><!--.experience-->
                                            <?php $count++;
                                        } //if for image
                                    endwhile;?>
                                </div><!--.representative-experience-->
                                <?php wp_reset_postdata();
                            endif;?>
                        </div><!-- entry content -->
    				<?php endif; // end of the loop. ?>

                <?php } ?>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- wrapper -->
<?php get_footer(); ?>