<?php $x = 1; ?>

<ul class="place-grid list-inline grid-5-up reset-margins">

	<?php while($x<16) { 
		if($x == 1): ?><li>
		<a class="center-block placemarker">
			<div class="v-centered">
				<div class="icon-places-placemarker"></div>
			</div>
		</a>	
	</li><?php else: ?><li>
			<a class="center-block" href="#">
				<div class="v-centered">
					<h2><strong>BH</strong></h2>
					<p>Boyle Heights</p>
					<p class="temperature light-thin-text" id="weather-boyle-heights"></p>
				</div>
			</a>
		</li><?php endif; $x++; } ?>

</ul>