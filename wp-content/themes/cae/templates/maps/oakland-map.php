<map name="Map">
  <area shape="rect" coords="105,0,228,103" href="#eastmont" class="js-popup">
  <area shape="rect" coords="1,103,87,223" href="#lake_merritt" class="js-popup">
  <area shape="rect" coords="1,223,93,337" href="#uptown" class="js-popup">
  <area shape="rect" coords="23,483,219,585" href="#laurel" class="js-popup">
  <area shape="rect" coords="222,483,284,596" href="#elmhurst" class="js-popup">
</map>

<div id="eastmont" class="mfp-hide white-popup conference-popup">
<?php the_field('eastmont','options'); ?>
</div>

<div id="lake_merritt" class="mfp-hide white-popup conference-popup">
<?php the_field('lake_merritt','options'); ?>
</div>

<div id="uptown" class="mfp-hide white-popup conference-popup">
<?php the_field('uptown','options'); ?>
</div>

<div id="laurel" class="mfp-hide white-popup conference-popup">
<?php the_field('laurel','options'); ?>
</div>

<div id="elmhurst" class="mfp-hide white-popup conference-popup">
<?php the_field('elmhurst','options'); ?>
</div>