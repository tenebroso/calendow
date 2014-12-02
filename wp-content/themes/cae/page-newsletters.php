

	<ul class="filters newsletter-filters" id="filters">
		<li class="selector-group">
			<a data-filter-group="color" class="filter-key">Filter by <span>Neighborhood</span></a>
			<ul class="sub-filter">
				<li><a class="selector" data-filter="">Any</a></li>
				<li><a class="selector" data-filter=".red">Red</a></li>
				<li><a class="selector" data-filter=".blue">Blue</a></li>
			</ul>

		</li>
		<li><a data-filter-group="campaigns" class="filter-key">Filter by <span>Prevention</span></a></li>
		<li><a data-filter-group="campaigns" class="filter-key">Filter by <span>Schools</span></a></li>
		<li><a data-filter-group="places" class="filter-key">Filter by <span>Communities</span></a>
			<ul class="sub-filter">
				<?php
					$args = array(
					'post_type'=>'place',
					'title_li'=> ''
					);
					wp_list_pages( $args );
				?>
			</ul>
		</li>
	</ul>

	


<div class="newsletter-wrapper">
<?php get_template_part('templates/newsletter/newsletters', 'archive'); ?>
</div>