<?php $x = 1; ?>

<ul class="place-grid list-inline grid-7-up reset-margins">

<?php
	$args = array('hide_empty' => false);
	$terms = get_terms('place', $args);
	 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
	     foreach ( $terms as $term ) { 
			$abbr = get_field('name_abbreviation', $term);
		?><li>
		<a class="center-block" href="/place/<?php echo $term->slug; ?>">
			<div class="v-centered">
				<h2><strong><?php echo $abbr; ?></strong></h2>
				<p><?php echo $term->name; ?></p>
				<p class="temperature light-thin-text" id="<?php echo strtolower($abbr); ?>"></p>
			</div>
		</a>
	</li><?php }
}  
?>

</ul>