<?php if( have_rows('cae_content_builder') ): ?>
	<nav class="side-nav-container affix">
		<h3 class="color sidenav-title"><?php the_title(); ?>.</h3>
   		<ul class="side-nav">
		<?php while ( have_rows('cae_content_builder') ) : the_row();
    	$sectionTitle = get_sub_field('section_title');
    	$htmlSectionTitle = strtolower(str_replace(' ', '-', $sectionTitle)); if($sectionTitle): ?>
		<li>
        	<a href="#<?php echo $htmlSectionTitle; ?>" class="bg-color"><?php the_sub_field('section_title'); ?></a>
        </li>
    <?php endif; endwhile; ?>
    	<li class="share bg-color"><span class="caps">Share</span><?php $twitterText = get_field('twitter_text');
            $twitter = urlencode(html_entity_decode($twitterText, ENT_COMPAT, 'UTF-8')); if($twitter): ?><a class="popup" href="http://twitter.com/home?status=<?php echo $twitter; ?> <?php the_permalink();?>">Twitter</a><?php else: ?><a class="popup" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink();?>">Twitter</a><?php endif; ?><a class="popup" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">Facebook</a></li>
		</ul>
	</nav>
<?php else : endif; ?>