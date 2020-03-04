<?php
get_header(); 
$postId = get_the_ID();
$nav = next_and_previous_experience($postId);
?>
<div class="wrapper profile-single-page">
	<div id="primary" class="main-content property-content">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
			$image  = get_field( 'featured_image' ); 
			$square_footage = get_field("square_footage");
            $address = get_field("address");
            $description = get_field("description"); 
            $hasInfo = ($address || $square_footage) ? true : false;
			?>
		<div id="content" role="main">

			<div class="entry-content">
				<h1><?php the_title(); ?></h1>
				
				<?php if ($image) { ?>
				<div class="single-property-image">
					<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" />
				</div>
				<?php } ?>

				<div class="single-property-details details">
					<div class="single-property-header">
                        <?php if($address) { ?>
                            <div class="address sph-address">
                                <?php echo $address;?>
                            </div><!--.address-->
                        <?php } ?>
                        <?php if($square_footage) { ?>
	                        <div class="square-footage sph-address">
	                            <?php echo $square_footage;?>
	                        </div><!--.square-footage-->
	                    <?php } ?>
					</div>
					<?php if($description) { ?>
	                    <div class="description copy">
	                        <?php echo $description;?>
	                    </div><!--.description .copy -->
	                <?php } ?>
				</div>
				

			</div>
	
			
			<?php if ($nav) { ?>

				<div class="experience-navi">

				<?php if ( isset($nav['prev_id']) && $nav['prev_id'] ) { ?>
				<a href="<?php echo get_permalink($nav['prev_id']); ?>" class="prev">&laquo; Previous</a>	
				<?php } ?>

				<?php if ( isset($nav['next_id']) && $nav['next_id'] ) { ?>
				<a href="<?php echo get_permalink($nav['next_id']); ?>" class="next">Next &raquo;</a>	
				<?php } ?>

				</div>
				
			<?php } ?>

		</div>
		<?php endwhile; // end of the loop. ?>
	</div>
	<?php get_sidebar('profile'); ?>
</div>
<?php get_footer(); ?>