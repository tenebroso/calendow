<nav class="side-nav-container side-nav-share affix">
	<h3 class="sidenav-title bg-color">Share This.</h3>
		<ul class="side-nav">
		<li class="share-icon share-icon-twitter">
			<?php $twitter = get_field('twitter_text'); ?>
			<?php if($twitter): ?>
			<a class="popup" href="http://twitter.com/home?status=<?php echo $twitter; ?> <?php the_permalink();?>">Twitter</a>
			<?php else: ?>
			<a class="popup" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink();?>">Twitter</a>
			<?php endif; ?>
		</li>
		<li class="share-icon share-icon-facebook">
			<a class="popup" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">Facebook</a>
		</li>
		<!--<li>
			<a href="sms:body=<?php the_title(); ?>">SMS</a>
		</li>-->
		<li class="cta"><a href="#">Take Action.</a></li>
	</ul>
</nav>