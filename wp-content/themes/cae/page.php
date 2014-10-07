<?php 
	// Page.php Used by /places, /our-story

	// check if the flexible content field has rows of data
	if( have_rows('cae_content_builder') ):

	    while ( have_rows('cae_content_builder') ) : the_row();

	        if( get_row_layout() == 'full_width_image' ): ?>

			<div class="stripe bg-image">
	        	<div data-stellar-background-ratio="0.5" class="parallax-image" style="background-image:url(<?php the_sub_field('full_width_image'); ?>);"></div>
	        </div>

	        <?php elseif( get_row_layout() == 'content_anchor_section' ): ?>

		        <div class="stripe">
		        	<div class="container">
		        		<div class="row">
		        			<div class="col-sm-2">
		        				<h3 class="section-title"><?php the_sub_field('section_title'); ?></h3>
		        			</div>
		        			<div class="col-sm-10">
		        				<?php the_sub_field('section_content'); ?>
		        			</div>
		        		</div>
		        	</div>
		        </div>

	        <?php endif;

	    endwhile;

	else :

	    // show default page content
	    get_template_part('templates/content', 'page');

	endif;

?>
