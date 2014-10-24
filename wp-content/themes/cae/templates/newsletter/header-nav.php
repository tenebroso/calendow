<?php $gmt_timestamp = get_post_time('U', true); ?>
<ul class="newsletters nav">
	<li class="pull-left"><a href="#" class="icon-lg-arrow text-hide">Previous</a></li>
	<?php
    global $post;
    $current_post = $post;

    for($i = 1; $i <= 3; $i++):
    $post = get_next_post();
    setup_postdata($post); 
    $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
    $url = get_permalink(); 
    if($img): ?><li>
		<a href="<?php echo $url; ?>">
			<img src="<?php echo $img[0]; ?>">
		</a>
    </li><?php endif; endfor;
    $post = $current_post; 

?>
	<li class="pull-right"><a href="#" class="icon-lg-arrow text-hide">Next</a></li>
</ul>