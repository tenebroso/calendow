<nav class="side-nav-container side-nav-share affix">
	<h3 class="sidenav-title bg-color">Share This.</h3>
		<ul class="side-nav">
		<li>
			<a class="popup" href="http://twitter.com/home?status=Currently reading <?php the_permalink();?>">Twitter</a>
		</li>
		<li>
			<a class="popup" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">Facebook</a>
		</li>
		<!--<li>
			<a href="sms:body=<?php the_title(); ?>">SMS</a>
		</li>-->
		<li class="cta"><a href="#">Take Action.</a></li>
	</ul>
</nav>