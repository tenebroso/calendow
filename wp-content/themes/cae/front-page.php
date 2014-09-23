<?php while (have_posts()) : the_post(); ?>
	<div class="hero-container">

		<ul class="hero-nav">

			<li class="hero-nav-intro">Building Healthy <br />Communities</li>
			<li class="neighborhoods"><a href="#">Neighborhoods. <span class="hero-nav-color-block">Neighborhoods.</span></a></li>
			<li class="prevention"><a href="#">Prevention. <span class="hero-nav-color-block">Prevention.</span></a></li>
			<li class="schools"><a href="#">School. <span class="hero-nav-color-block">School.</span></a></li>
			<li class="places"><a href="#">Places. <span class="hero-nav-color-block">Places.</span></a></li>
			<li class="grants"><a href="#">Grants. <span class="hero-nav-color-block">Grants.</span></a></li>
			<li class="action"><a href="#">Action. <span class="hero-nav-color-block">Action.</span></a></li>

		</ul>

		<div class="hero-container-text">

			<a href="#">

				<h2 class="hero-lead">Health and <br />Justice for All.</h2>
				<p class="hero-subtitle"><span class="hero-subtitle-text">Donec luctur vitae libero sit amet <br />finibus. Lorem ipsum dolor sit amet.</span> <span class="hero-subtitle-arrow icon-lg-arrow"></span></p>

			</a>

		</div>

		

	</div>

	



				<div id="container">
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

					<div id="filters">

					  <div class="ui-group">
					    <h3>Color</h3>
					    <div class="button-group js-radio-button-group" data-filter-group="color">
					      <button class="button is-checked" data-filter="">any</button>
					      <button class="button" data-filter=".red">red</button>
					      <button class="button" data-filter=".blue">blue</button>
					      <button class="button" data-filter=".yellow">yellow</button>
					    </div>
					  </div>

					  <div class="ui-group">
					    <h3>Size</h3>
					    <div class="button-group js-radio-button-group" data-filter-group="size">
					      <button class="button is-checked" data-filter="">any</button>
					      <button class="button" data-filter=".small">small</button>
					      <button class="button" data-filter=".wide">wide</button>
					      <button class="button" data-filter=".big">big</button>
					      <button class="button" data-filter=".tall">tall</button>
					    </div>
					  </div>

					  <div class="ui-group">
					    <h3>Shape</h3>
					    <div class="button-group js-radio-button-group" data-filter-group="shape">
					      <button class="button is-checked" data-filter="">any</button>
					      <button class="button" data-filter=".round">round</button>
					      <button class="button" data-filter=".square">square</button>
					    </div>
					  </div>

					</div>

					<div class="isotope">
					  <div class="color-shape small round red"></div>
					  <div class="color-shape small round blue"></div>
					  <div class="color-shape small round yellow"></div>
					  <div class="color-shape small square red"></div>
					  <div class="color-shape small square blue"></div>
					  <div class="color-shape small square yellow"></div>
					  <div class="color-shape wide round red"></div>
					  <div class="color-shape wide round blue"></div>
					  <div class="color-shape wide round yellow"></div>
					  <div class="color-shape wide square red"></div>
					  <div class="color-shape wide square blue"></div>
					  <div class="color-shape wide square yellow"></div>
					  <div class="color-shape big round red"></div>
					  <div class="color-shape big round blue"></div>
					  <div class="color-shape big round yellow"></div>
					  <div class="color-shape big square red"></div>
					  <div class="color-shape big square blue"></div>
					  <div class="color-shape big square yellow"></div>
					  <div class="color-shape tall round red"></div>
					  <div class="color-shape tall round blue"></div>
					  <div class="color-shape tall round yellow"></div>
					  <div class="color-shape tall square red"></div>
					  <div class="color-shape tall square blue"></div>
					  <div class="color-shape tall square yellow"></div>
					</div>
					
				</div>


<?php endwhile; ?>


<?php echo do_shortcode( '[facetwp facet="campaigns"]' ); ?>
<?php echo do_shortcode( '[facetwp facet="places"]' ); ?>

<?php echo do_shortcode( '[facetwp template="default"]' ); ?>