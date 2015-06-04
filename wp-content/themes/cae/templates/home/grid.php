<?php 	
		$className = '';
		$image_url = get_field('tile_image');
		if($image_url):
            list($width, $height, $type, $attr) = getimagesize($image_url);
        endif;
		$work = wp_get_post_terms($post->ID,'work', array("fields" => "names"));
		$campaign = wp_get_post_terms($post->ID,'campaign', array("fields" => "names"));
		$workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs"));
		$className = 'grid-'.get_post_type().""; 
        $postType = get_post_type( get_the_ID() ); 
        $customLink = get_field('custom_url');
        
            if($postType == 'post'): $postType = 'Blog'; endif; ?>


<div class="grid-item <?php echo $className; ?> <?php if($workSlug): echo strtolower($workSlug[0]); else: echo 'default'; endif; ?>"
    <?php if($image_url):?>style="height:<?php echo $height; ?>px;" <?php endif; ?>>
	
	<a href="<?php if($customLink): echo $customLink; else: the_permalink(); endif; ?>"<?php if($image_url): ?> 
	    class="bg-color hover-trigger" 
	    style="background-image:url(<?php echo $image_url; ?>);"<?php endif; ?>>
		
            <?php if($className !== 'grid-video'): ?>

			    <?php if(!$image_url): ?>
				    <div class="breadcrumbs hover-white">
                        <?php if($work): ?>
                                <span class="color hover-white"><?php echo $work[0]; ?></span> 
                                <span class="carrot hover-white">></span> <?php endif; ?>
                                <?php if($campaign): echo $campaign[0]; endif; ?>
                                <strong class="hover-white"><?php echo $postType; ?></strong>
                            </div>
                            <h2 class="grid-title hover-white"><?php the_title(); ?></h2>
                            <p class="date hover-white"><?php the_time('F j, Y'); ?></p>
			            <?php else: ?>
                            <div class="bg-color show-on-hover">
                                <div class="breadcrumbs hover-white">
                                  <?php if($work): ?>
                                      <span class="color hover-white"><?php echo $work[0]; ?></span> <span class="carrot hover-white">></span> 
                                  <?php endif; ?>
                                  <?php if($campaign): echo $campaign[0]; endif; ?>
                                  <strong class="hover-white"><?php echo $postType; ?></strong>
                                </div>
                                <h2 class="grid-title hover-white white-text"><?php the_title(); ?></h2>
                            </div>
			        <?php endif; ?>
			        
            <?php elseif($className == 'grid-video'): ?>
                <div class="v-centered grid-play-button">Play Video</div>
            <?php endif; ?>
	</a>
</div>