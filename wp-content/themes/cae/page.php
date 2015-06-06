<?php get_template_part('templates/sidebar','nav'); ?>

<?php

	if( have_rows('cae_content_builder') ):

	    while ( have_rows('cae_content_builder') ) : the_row();

	        if( get_row_layout() == 'full_width_image' ): ?>

				<?php get_template_part('templates/content/full-image'); ?>

			<?php elseif( get_row_layout() == 'content_anchor_section' ): ?>

				<?php get_template_part('templates/content/anchor-section'); ?>

			<?php elseif( get_row_layout() == 'standard_content' ): ?>

				<?php get_template_part('templates/content/standard-content'); ?>

			<?php elseif( get_row_layout() == 'places_grid'): ?>

				<?php get_template_part('templates/content','places-grid'); ?>

			<?php elseif( get_row_layout() == 'accordion'): ?>

				<?php get_template_part('templates/content','accordion'); ?>

	        <?php endif; endwhile; ?>
	        
	            <div class="container">
	            
	                <div class="row">
	                    
	                    <div class="col-sm-9 text-content col-sm-offset-2">
	                        
	                        <?php get_template_part('templates/content/author','byline'); ?>
	                        
	                    </div>
	                    
	                </div>

	            </div>

	<?php else :

		get_template_part('templates/content', 'page');

	endif;
?>