<?php /* Template Name: Media Download */ ?>
<script type="text/javascript">

$(function() {

	$("a[title='download']").click(function(e) {
		e.preventDefault();
		
		var $modalBg = $("<div id=\"downloadModalBg\" style=\"background-color: #333333; opacity: .5; z-index: 100; position: fixed; left: 0; top: 0;\"></div>");

		var $body = $("body");

		$modalBg.width($(window).width()).height($(window).height());
		
		

		var $iframe = $("<div class=\"close\" style=\"z-index: 111; position: fixed;width: 28px; margin: auto; height: 28px; top: 38.55%; left:24.5%; right:0; \"><img src=\"http://mytce.net/images/close.png\" id=\"downloadModalClose\" style=\"cursor:pointer;\"  /></div><iframe id=\"downloadModalIframe\" src=\"https://mytce.net/media-download?resource=" + $(this).attr("data-resource") + "\" style=\"border: 0px; z-index: 101; position: fixed; background-color: #ffffff; width: 470px; margin: auto; height: 330px; top: 40%; left:0; right:0; \" scollbars=\"no\"></iframe>");

		$body.append($modalBg).append($iframe);
		$("#downloadModalClose").click(function() {
        	$("#downloadModalBg").remove();
        	$("#downloadModalIframe").remove();
			$(this).parent().remove();
    	});
		
	});
	

	

});

		window.addEventListener("message",
          function (e) {
                if(e.origin !== "https://mytce.net"){ return; } 
				$("#downloadModalClose").click();
                window.location.href = e.data;
          },
          false);


</script>
<?php get_template_part('templates/sidebar','nav'); ?>

<?php

	if( have_rows('cae_content_builder') ):

	    while ( have_rows('cae_content_builder') ) : the_row();

	        if( get_row_layout() == 'full_width_image' ): ?>

				<?php get_template_part('templates/content/full-image'); ?>

			<?php elseif( get_row_layout() == 'content_anchor_section' ): ?>

				<?php get_template_part('templates/content/anchor-section'); ?>

			<?php elseif( get_row_layout() == 'standard_content' ): ?>

				<?php get_template_part('templates/content/standard-content'); ?>

			<?php elseif( get_row_layout() == 'places_grid'): ?>

				<?php get_template_part('templates/content','places-grid'); ?>

			<?php elseif( get_row_layout() == 'accordion'): ?>

				<?php get_template_part('templates/content','accordion'); ?>

	        <?php endif; endwhile; ?>
	        
	            <div class="container">
	            
	                <div class="row">
	                    
	                    <div class="col-sm-9 text-content col-sm-offset-2">
	                        
	                        <?php get_template_part('templates/content/author','byline'); ?>
	                        
	                    </div>
	                    
	                </div>

	            </div>

	<?php else :

		get_template_part('templates/content', 'page');

	endif;
?>