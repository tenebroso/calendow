<?php 	$sectionTitle = get_sub_field('section_title');
		$htmlSectionTitle = strtolower(str_replace(' ', '-', $sectionTitle)); ?>

<div class="stripe<?php if($sectionTitle): echo ' scrollto'; endif; ?>" id="<?php echo $htmlSectionTitle; ?>">
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