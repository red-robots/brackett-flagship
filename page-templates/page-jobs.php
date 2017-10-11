<?php
/**
 * Template Name: Jobs
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
					<?php $args = array(
						'posts_per_page'=>-1,
						'post_type'=>'job',
					);
					$query = new WP_Query($args);
					if ( $query->have_posts() ): 
						$jobs_header = get_field("jobs_header");?>
						<?php if($jobs_header):?>
							<h2><?php echo $jobs_header;?></h2>
						<?php endif; ?>
						<div class="faqs">
							<?php while ( $query->have_posts() ): $query->the_post();?>
								<div class="faqrow">
									<div class="question">
										<div class="question-image"></div><!--question-image-->
										<?php the_title(); ?>
									</div><!--question-->
									<div class="answer"><?php the_content(); ?></div><!--answer-->
								</div><!-- faqrow -->
							<?php endwhile; ?>
						</div><!-- faqs -->
					<?php endif; ?>
                </div><!-- entry content -->
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php get_footer(); ?>