<?php while (have_posts()) : the_post(); ?>
	<div class="container">

		<div class="row">

			<div class="col-xs-12">
					 <?php get_template_part('templates/content', 'page'); ?>
			</div>

		</div>

	</div>
 
<?php endwhile; ?>
