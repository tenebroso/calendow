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

<?php if(is_page(124)): ?>
<map name="Map">
  <area shape="rect" coords="105,0,228,103" href="#eastmont" class="js-popup">
  <area shape="rect" coords="1,103,87,223" href="#lake_merritt" class="js-popup">
  <area shape="rect" coords="1,223,93,337" href="#uptown" class="js-popup">
  <area shape="rect" coords="23,483,219,585" href="#laurel" class="js-popup">
  <area shape="rect" coords="222,483,284,596" href="#elmhurst" class="js-popup">
</map>
<?php endif; ?>

<div id="eastmont" class="mfp-hide white-popup conference-popup">
<?php the_field('eastmont','options'); ?>
</div>

<div id="lake_merritt" class="mfp-hide white-popup conference-popup">
<?php the_field('lake_merritt','options'); ?>
</div>

<div id="uptown" class="mfp-hide white-popup conference-popup">
<?php the_field('uptown','options'); ?>
</div>

<div id="laurel" class="mfp-hide white-popup conference-popup">
<?php the_field('laurel','options'); ?>
</div>

<div id="elmhurst" class="mfp-hide white-popup conference-popup">
<?php the_field('elmhurst','options'); ?>
</div>