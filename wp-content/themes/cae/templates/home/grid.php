<?php 	
		$className = '';
		$image_url = '';
		$work = wp_get_post_terms($post->ID,'work', array("fields" => "names"));
		$campaign = wp_get_post_terms($post->ID,'campaign', array("fields" => "names"));
		$workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs"));

		if( get_post_type() == 'video' ): 
		
			$className = 'grid-video';
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'homepage-thumb', true);

		else:
		
			$className = 'grid-'.get_post_type()."";
	
		endif; ?>


<div class="grid-item <?php echo $className; ?> <?php if($workSlug): echo strtolower($workSlug[0]); else: echo 'default'; endif; ?>">
	<a href="<?php the_permalink(); ?>"<?php if($image_url): ?> style="background-image:url(<?php echo $image_url[0]; ?>);"<?php endif; ?>>
		<?php if($className !== 'grid-video'): ?>
			<div class="breadcrumbs hover-white">
				<?php if($work): ?><span class="color hover-white"><?php echo $work[0]; ?></span> <span class="carrot hover-white">></span> <?php endif; ?><?php if($campaign): echo $campaign[0]; endif; ?><strong class="hover-white"><?php echo get_post_type( get_the_ID() ); ?></strong>
			</div>
			<h2 class="grid-title hover-white"><?php the_title(); ?></h2>
			<p class="date hover-white"><?php the_time('F j, Y'); ?></p>
		<?php elseif($className == 'grid-video'): ?>
			<div class="v-centered grid-play-button">Play Video</div>
		<?php endif; ?>
	</a>
</div>