<?php $gmt_timestamp = get_post_time('U', true); ?>
<ul class="newsletters nav"><?php previous_post_link('<li class="pull-left icon-lg-arrow text-hide">%link</li>', '', ''); ?><li class="active"><a><img src="<?php the_field('thumbnail_image');?>"></a></li><?php
    global $post;
    $current_post = $post;

    for($i = 1; $i <= 3; $i++):
	    $post = get_next_post();
		if($post):
	    setup_postdata($post); 
	    $img = get_field('thumbnail_image');
	    $url = get_permalink(); ?><li>
			<a href="<?php echo $url; ?>">
				<img src="<?php echo $img; ?>">
			</a>
	    </li><?php endif; endfor;
    $post = $current_post; 

?><?php next_post_link('<li class="pull-right icon-lg-arrow text-hide">%link</li>', '', ''); ?>
</ul>