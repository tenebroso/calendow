<div class="container">
	<div class="row">
		<div class="col-sm-2">
			<p class="meta-date"><?php echo the_time('F j'); ?> <i><?php echo the_time('Y'); ?></i></p>
			<?php get_template_part('templates/sidebar-share'); ?>
		</div>
		<div class="col-sm-9">
			<?php get_template_part('templates/content', 'single'); ?>
		</div>
</div>