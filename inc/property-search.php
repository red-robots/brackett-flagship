<div class="prop-search">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="property-search-field" placeholder="<?php echo esc_attr_x( 'Search Property', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search Property:', 'label' ) ?>" />
	</label>
    <input type="hidden" name="post_type" value="property" />
	<input type="submit" class="property-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
</div>