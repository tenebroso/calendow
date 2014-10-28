<ul class="newsletters bg-color sub-nav nav"><?php previous_post_link('<li class="pull-left icon-lg-arrow text-hide">%link</li>', '', ''); ?><li class="active"><a class="resize-thumb"><?php the_post_thumbnail('thumbnail');?></a></li><?php
    $current_post = $post;

    for($i = 1; $i <= 3; $i++):
	    $post = get_next_post();
		if($post):
	    setup_postdata($post); 
	    $url = get_permalink(); ?><li>
			<a href="<?php echo $url; ?>" class="resize-thumb">
				<?php the_post_thumbnail('thumbnail');?>
			</a>
	    </li><?php endif; endfor;
    $post = $current_post; 

?><?php next_post_link('<li class="pull-right icon-lg-arrow text-hide">%link</li>', '', ''); ?>
</ul>

<h1 class="text-center heading-font page-secondary-title caps"><strong><?php the_title(); ?></strong></h1>