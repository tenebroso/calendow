<div class="row">
<div class="col-sm-2">
	<?php get_template_part('templates/sidebar-share'); ?>
</div>
<div class="col-sm-9 text-content resources-container">

	<div class="row">
	<?php if( have_rows('logos') ): ?>
		<div class="col-md-4">
			<h3>Logos</h3>
			<?php while ( have_rows('logos') ) : the_row(); ?>    
		        <?php the_sub_field('logo'); ?>
			<?php endwhile; ?>
		</div>
	<?php else : endif; ?>
	<?php if( have_rows('videos') ): ?>
		<div class="col-md-4">
			<h3>Videos</h3>
			<?php while ( have_rows('videos') ) : the_row(); ?>    
		        <?php the_sub_field('video'); ?>
			<?php endwhile; ?>
		</div>
	<?php else : endif; ?>
	<?php if( have_rows('documents') ): ?>
		<div class="col-md-4">
			<h3>Videos</h3>
			<?php while ( have_rows('documents') ) : the_row(); ?>    
		        <?php the_sub_field('document'); ?>
			<?php endwhile; ?>
		</div>
	<?php else : endif; ?>
	</div>
</div>
</div>