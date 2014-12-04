<?php
    $current_post = $post;
    $workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs"));
    $image = get_field('header_thumbnail_nav_image');
    if($image == ''):
    	$image = 'http://placehold.it/86x81';
    endif;


if ($workSlug[0] == 'places') { ?>

	<ul class="newsletters bg-color sub-nav nav"><?php previous_post_link('<li class="pull-left icon-lg-arrow text-hide">%link</li>', '', ''); ?>
		<li class="active"><a class="resize-thumb"><?php the_field('name_abbreviation'); ?></a></li><?php
		for($i = 1; $i <= 3; $i++):
		    $post = get_next_post();
			if(!$post): $post = get_previous_post(); endif;
			if($post):
		    setup_postdata($post);
		    $url = get_permalink(); ?><li>
				<a href="<?php echo $url; ?>" class="resize-thumb">
					<?php the_field('name_abbreviation'); ?>
				</a>
		    </li><?php endif; endfor;

} else { ?>

	<p class="sidenav-title bg-color section-intro-title"><?php echo $workSlug[0]; ?>.</p>
	<ul class="newsletters bg-color sub-nav nav"><?php previous_post_link('<li class="pull-left icon-lg-arrow text-hide">%link</li>', '', ''); ?>
		<li class="active"><a class="resize-thumb"><img src="<?php echo $image; ?>"></a></li><?php
	    for($i = 1; $i <= 3; $i++):
		    $post = get_next_post();
			if(!$post): $post = get_previous_post(); endif;
			if($post):
		    setup_postdata($post); 
			$image = get_field('header_thumbnail_nav_image');
		    $url = get_permalink(); ?><li>
				<a href="<?php echo $url; ?>" class="resize-thumb">
					<img src="<?php echo $image; ?>">
				</a>
		    </li><?php endif; endfor;
	}
	
	$post = $current_post; 

	?><?php next_post_link('<li class="pull-right icon-lg-arrow text-hide">%link</li>', '', ''); ?>
</ul>

<h1 class="text-center heading-font page-secondary-title caps"><strong><?php the_title(); ?></strong></h1>