<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
		body.home {
			background-image:url(<?php the_field('hero_image'); ?>);
		}
	</style>
<?php endif; ?>
<?php $bgImage = get_field('background_images'); if(is_singular('report') && $bgImage):  ?>
<style type="text/css">
@media (min-width:1200px) {
	.single-report {
		background-image: url(<?php echo $bgImage; ?>);
	}
}
</style>
<?php endif; ?>
<?php if(is_singular('report')): ?>
	<?php

	$params = array();
	if(count($_GET) > 0) {
	    $params = $_GET;
	} else {
	    $params = $_POST;
	}
	// defaults
	if($params['type'] == "") $params['type'] = "restaurant";
	if($params['locale'] == "") $params['locale'] = "en_US";
	if($params['title'] == "") $params['title'] = "default title";
	if($params['image'] == "") $params['image'] = "thumb";
	if($params['description'] == "") $params['description'] = "default description";

	?>

	<!-- Open Graph meta tags -->
    <meta property="fb:app_id" content="MY_APP_ID" />
    <meta property="og:site_name" content="meta site name"/>
    <meta property="og:url" content="http://mysite.com/index.php?type=<?php echo $params['type']; ?>&locale=<?php echo $params['locale']; ?>&title=<?php echo $params['title']; ?>&image=<?php echo $params['image']; ?>&description=<?php echo $params['description']; ?>"/>
    <meta property="og:type" content="MY_APP_NAME_SPACE:<?php echo $params['type']; ?>"/>
    <meta property="og:locale" content="<?php echo $params['locale']; ?>"/>
    <meta property="og:title" content="<?php echo $params['title']; ?>"/>
    <meta property="og:image" content="http://caendow.herokuapp.com/assets/<?php echo $params['image']; ?>.png"/>
    <meta property="og:description" content="<?php echo $params['description']; ?>"/>
<?php endif; ?>
</head>
