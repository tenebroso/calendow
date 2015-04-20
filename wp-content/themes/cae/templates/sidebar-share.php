<?php $takeAction = get_field('take_action_url'); ?>
<nav class="side-nav-container side-nav-share affix">
	<h3 class="sidenav-title bg-color">Share This.</h3>
		<ul class="side-nav">
		<li class="share-icon share-icon-twitter">
			<?php 
			$twitterText = get_field('twitter_text');
			$twitter = urlencode(html_entity_decode($twitterText, ENT_COMPAT, 'UTF-8')); ?>
			<?php if($twitter): ?>
			<a class="popup" href="http://twitter.com/home?status=<?php echo $twitter; ?> <?php echo wp_get_shortlink(); ?>">Twitter</a>
			<?php else: ?>
			<a class="popup" href="http://twitter.com/home?status=<?php the_title(); ?> <?php echo wp_get_shortlink(); ?>">Twitter</a>
			<?php endif; ?>
		</li>
		<li class="share-icon share-icon-facebook">
			<a class="popup" href="http://www.facebook.com/sharer.php?u=<?php echo wp_get_shortlink(); ?>" target="_blank">Facebook</a>
		</li>
		<!--<li>
			<a href="sms:body=<?php the_title(); ?>">SMS</a>
		</li>-->
		<?php if($takeAction): ?>
		    <li class="cta"><a href="<?php echo $takeAction; ?>">Take Action.</a></li>
        <?php endif; ?>
	</ul>
</nav>