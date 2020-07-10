<?php
$categories = get_experience_categories(); 
$parentId = get_page_id_by_template('page-experience');
if ($categories && $parentId) { ?>
<aside id="sidebarr" class="widget widget-experience">
	<h3>Service Categories</h3>
	<ul class="listings">
		<?php foreach ($categories as $c) {
			$id = $c['ID'];
			$name = $c['post_title']; 
			$link = get_permalink($parentId) . '?svc=' . $id;
		?>
		<li class="cat-item cat-item-<?php echo $id?>"><a href="<?php echo $link ?>"><?php echo $name; ?></a></li>	
		<?php } ?>
	</ul>
</aside>
<?php } ?>