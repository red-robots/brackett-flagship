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
					<?php if ( have_rows( 'faqs' ) ): 
						$jobs_header = get_field("jobs_header");?>
						<?php if($jobs_header):?>
							<h2><?php echo $jobs_header;?></h2>
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
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php get_footer(); ?>