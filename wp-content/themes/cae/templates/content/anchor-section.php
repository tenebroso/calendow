<?php 	$sectionTitle = get_sub_field('section_title');
		$htmlSectionTitle = strtolower(str_replace(' ', '-', $sectionTitle)); ?>

<div class="stripe<?php if($sectionTitle): echo ' scrollto'; endif; ?>" id="<?php echo $htmlSectionTitle; ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<h3 class="section-title color"><?php echo $sectionTitle; ?></h3>
				<?php if($sectionTitle == 'Solutions'): ?>
					<div class="health-block icon-health-placemarker-neighborhoods">
						<p class="placemarker-block caps">Health <br />Happens <br />Here <br /><span class="color">in Neighborhoods</p>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-9 text-content">
				<?php the_sub_field('section_content'); ?>
			</div>
		</div>
	</div>
</div>