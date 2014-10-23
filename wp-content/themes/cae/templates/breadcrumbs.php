<?php $work = wp_get_post_terms($post->ID,'work', array("fields" => "names"));
		$campaign = wp_get_post_terms($post->ID,'campaign', array("fields" => "names"));
		$workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs")); ?>

<div class="breadcrumbs">
	<?php if($work): ?><span class="color"><?php echo $work[0]; ?></span> > <?php endif; ?><?php if($campaign): echo $campaign[0]; endif; ?> > <?php echo get_post_type( get_the_ID() ); ?>
</div>