<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $ogImage = get_field('facebook_og_image'); 
  		$bgImage = get_field('background_images'); ?>
	<?php if($ogImage): ?>
		<meta property="og:image" content="<?php echo $ogImage; ?>"/>
	<?php elseif($bgImage): ?>
		<meta property="og:image" content="<?php echo $bgImage; ?>"/>
  <?php endif; ?>

  <?php wp_head(); ?>
  
	<!--[if IE 8]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
<script>
window.caeicons=function(e){if(e&&3===e.length){var t=window,n=!(!t.document.createElementNS||!t.document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect||!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")||window.opera&&-1===navigator.userAgent.indexOf("Chrome")),o=function(o){var r=t.document.createElement("link"),a=t.document.getElementsByTagName("script")[0];r.rel="stylesheet",r.href=e[o&&n?0:o?1:2],a.parentNode.insertBefore(r,a)},r=new t.Image;r.onerror=function(){o(!1)},r.onload=function(){o(1===r.width&&1===r.height)},r.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}};
caeicons( [ "/assets/icons.data.svg.css", "/assets/icons.data.png.css", "/assets/icons.fallback.css" ] );
</script>
<noscript><link href="/assets/icons.fallback.css" rel="stylesheet"></noscript>
<?php if(is_front_page()): ?>
	<style type="text/css">
		.home {
			background-image:url(<?php the_field('hero_image'); ?>);
		}
	</style>
<?php endif; ?>
<?php if(is_singular('report') && $bgImage):  ?>
<style type="text/css">
@media (min-width:1200px) {
	.single-report {
		background-image: url(<?php echo $bgImage; ?>);
	}
}
</style>

<?php endif; ?>
<style type="text/css">
@media (max-width:481px) {
	.footer .ui-group {
		line-height: 1.2;
		margin: 1em auto;
		max-width: 80%;
	}
	.divider {
		display: none;
	}
}
</style>
</head>
