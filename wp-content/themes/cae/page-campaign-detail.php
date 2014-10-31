<?php /* Template Name: Campaign Detail */ ?>

<div class="row">
<div class="col-sm-2">
	<?php get_template_part('templates/sidebar-share'); ?>
</div>
<div class="col-sm-9">
	<?php get_template_part('templates/content', 'page'); ?>
	<?php if( has_term( 'neighborhoods', 'work' ) ) { ?>
		<div class="health-block icon-health-placemarker-neighborhoods">
			<p class="placemarker-block caps">Health <br />Happens <br />Here <br /><span class="color">in Neighborhoods</p>
		</div>
	<?php } else { ?>
		<div class="health-block icon-health-placemarker-places">
			<p class="placemarker-block caps">Health <br />Happens <br />Here <br /><span class="color">in Places</p>
		</div>
	<?php } ?>
</div>
</div>