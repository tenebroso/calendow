<div id="nav-anchor"></div>
<nav class="affix">
	<h3 class="color sidenav-title"><?php the_title(); ?>.</h3>
    <ul class="side-nav">
    	<?php if( have_rows('cae_content_builder') ): while ( have_rows('cae_content_builder') ) : the_row(); 
    	$sectionTitle = get_sub_field('section_title'); 
    	$htmlSectionTitle = strtolower(str_replace(' ', '-', $sectionTitle)); if($sectionTitle): ?>
        <li>
        	<a href="#<?php echo $htmlSectionTitle; ?>" class="bg-color">
        		<?php the_sub_field('section_title'); ?>
        	</a>
        </li>
    <?php endif; endwhile; else : endif; ?>
    </ul>
</nav>

<?php 
	// Page.php Used by /places, /our-story

	// check if the flexible content field has rows of data
	if( have_rows('cae_content_builder') ):

	    while ( have_rows('cae_content_builder') ) : the_row();

	        if( get_row_layout() == 'full_width_image' ): ?>

			<div class="stripe bg-image">
	        	<div data-stellar-background-ratio="0.5" class="parallax-image" style="background-image:url(<?php the_sub_field('full_width_image'); ?>);"></div>
	        </div>

	        <?php elseif( get_row_layout() == 'content_anchor_section' ): 
	        	$sectionTitle = get_sub_field('section_title'); 
	        	$htmlSectionTitle = strtolower(str_replace(' ', '-', $sectionTitle)); ?>

		        <div class="stripe" id="<?php echo $htmlSectionTitle; ?>">
		        	<div class="container">
		        		<div class="row">
		        			<div class="col-sm-2">
		        				<h3 class="section-title color"><?php echo $sectionTitle; ?></h3>
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
