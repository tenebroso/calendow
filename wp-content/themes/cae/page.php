<?php if( have_rows('cae_content_builder') ): ?>
	<nav class="side-nav-container affix">
		<h3 class="color sidenav-title"><?php the_title(); ?>.</h3>
   		<ul class="side-nav">
		<?php while ( have_rows('cae_content_builder') ) : the_row();
    	$sectionTitle = get_sub_field('section_title');
    	$htmlSectionTitle = strtolower(str_replace(' ', '-', $sectionTitle)); if($sectionTitle): ?>
		<li>
        	<a href="#<?php echo $htmlSectionTitle; ?>" class="bg-color"><?php the_sub_field('section_title'); ?></a>
        </li>
    <?php endif; endwhile; ?>
		</ul>
	</nav>
<?php else : endif; ?>

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

	        <?php endif; endwhile;

	else :

		get_template_part('templates/content', 'page');

	endif;
?>