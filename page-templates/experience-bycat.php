<?php  
$serviceCat = ( isset($_GET['svc']) && $_GET['svc'] && is_numeric($_GET['svc']) ) ? $_GET['svc'] : '';
$posts = get_experience_by_service_cat($serviceCat);
?>
<?php if ($posts) { ?>
<div class="representative-experience clear-bottom">
	<?php $count = 0; foreach ($posts as $post_id) {
		$post_title = get_the_title($post_id);
		$image   = get_field( 'featured_image', $post_id );
		if($image) { 
			$title   = $image['title'];
			$alt     = $image['alt'];
			$size    = 'rep-e';
			$url = $image['url'];
			$thumb   = $image['sizes'][ $size ];
			?>
		<div data-title="<?php echo $post_title ?>" class="experience js-blocks count-<?php echo $count%4;?> countmod3-<?php echo $count%3;?>">
            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>"/>
            <div class="overlay">
                <a class="pageLink" href="<?php echo get_permalink($post_id);?>">
                    <?php 
                    $square_footage = get_field("square_footage",$post_id);
                    $address = get_field("address",$post_id);
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
            
                </a>
            </div><!--.overlay-->
        
        </div><!--.experience-->
		<?php $count++; } ?>

	<?php } ?>
</div><!--.representative-experience-->
<?php } ?>