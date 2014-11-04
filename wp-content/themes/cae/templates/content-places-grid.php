<?php $x = 1; ?>

<ul class="place-grid list-inline grid-5-up reset-margins">

<li>
	<a class="center-block placemarker">
		<div class="v-centered">
			<div class="icon-places-placemarker"></div>
		</div>
	</a>	
</li><?php
	$args = array('hide_empty' => false);
	$terms = get_terms('place', $args);
	 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
	     foreach ( $terms as $term ) { 
			$abbr = get_field('name_abbreviation', $term);
		?><li>
		<a class="center-block" href="/places/<?php echo $term->slug; ?>">
			<div class="place-grid-spacer">
				<h2><strong><?php echo $abbr; ?></strong></h2>
				<p><?php echo $term->name; ?></p>
				<p class="temperature light-thin-text" id="<?php echo strtolower($abbr); ?>"></p>
			</div>
		</a>
	</li><?php }
}  
?>

</ul>