<?php
$categories = get_experience_categories(); 
if ($categories) { ?>
<aside id="sidebarr" class="widget widget-experience">
	<h3>Service Categories</h3>
	<ul class="listings">
		<?php foreach ($categories as $c) {
			$id = $c['ID'];
			$name = $c['post_title']; 
			$link = get_site_url() . '/representative-experience/?svc=' . $id;
		?>
		<li class="cat-item cat-item-<?php echo $id?>"><a href="<?php echo $link ?>"><?php echo $name; ?></a></li>	
		<?php } ?>
	</ul>
</aside>
<?php } ?>