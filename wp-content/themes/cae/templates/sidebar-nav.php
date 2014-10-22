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