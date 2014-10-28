<ul class="newsletters bg-color sub-nav nav"><?php previous_post_link('<li class="pull-left icon-lg-arrow text-hide">%link</li>', '', ''); ?><?php
    $current_post = $post;
    $workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs"));


if ($workSlug[0] == 'places') { ?>
	<li class="active"><a class="resize-thumb">FPO</a></li>
<?php
	$url = get_permalink();
	$args = array(
		'hide_empty' => false,
		);
	$terms = get_terms('place', $args);
	 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
	     foreach ( $terms as $term ) { 
	     	$abbr = get_field('name_abbreviation', $term);?><li>
			<a href="<?php echo $url; ?>" class="resize-thumb">
				<?php echo $abbr; ?>
			</a>
		</li><?php }
	}
} else { ?>
	<li class="active"><a class="resize-thumb"><?php the_post_thumbnail('thumbnail');?></a></li>
<?php
    for($i = 1; $i <= 3; $i++):
	    $post = get_next_post();
		if($post):
	    setup_postdata($post); 
	    $url = get_permalink(); ?><li>
			<a href="<?php echo $url; ?>" class="resize-thumb">
				<?php the_post_thumbnail('thumbnail'); ?>
			</a>
	    </li><?php endif; endfor;
	}
    $post = $current_post; 

?><?php next_post_link('<li class="pull-right icon-lg-arrow text-hide">%link</li>', '', ''); ?>
</ul>

<h1 class="text-center heading-font page-secondary-title caps"><strong><?php the_title(); ?></strong></h1>