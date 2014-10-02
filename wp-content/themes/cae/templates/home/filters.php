<ul class="filters" id="filters">
	<li class="selector-group">
		<a data-filter-group="color">Filter by <span>Our Work</span></a>
		<ul class="sub-filter">
			<li><a class="selector" data-filter="">Any</a></li>
			<li><a class="selector" data-filter=".red">Red</a></li>
			<li><a class="selector" data-filter=".blue">Blue</a></li>
		</ul>

	</li>
	<li><a data-filter-group="campaigns">Filter by <span>Campaigns</span></a></li>
	<li><a data-filter-group="places">Filter by <span>Places</span></a>
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

<div class="clearfix"></div>