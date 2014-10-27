<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="sr-only hidden"><?php _e('Search for:', 'roots'); ?></label>
	<input type="search" value="<?php echo get_search_query(); ?>" placeholder="Search" name="s" class="search-field js-expand-on-click">
	<button type="submit" class="search-submit"><?php _e('Search', 'roots'); ?></button>
</form>
