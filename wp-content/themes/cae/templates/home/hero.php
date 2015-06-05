<div class="hero-container">

	<ul class="hero-nav">
        
<?php $count = 1; if( have_rows('hero_navigation_builder') ):
    while ( have_rows('hero_navigation_builder') ) : the_row(); ?>
        
        <?php $label = get_sub_field('label'); ?>
        <?php $url = get_sub_field('url'); ?>
        <?php $modal = get_field('popup'); ?>
        <?php $modalContent = get_field('modal_content'); ?>
        <?php $color = get_sub_field('color_scheme'); ?>
        <?php $term = get_term( $color, 'work' ); ?>
        <?php $slug = $term->slug; ?>
        
        <?php if($count == 1): ?>
        
        <li class="hero-nav-intro"><a href="<?php echo $url; ?>"><?php echo $label; ?></a></li>

        <?php else: ?>
        
        <li class="<?php echo $slug; ?>"><a href="<?php echo $url; ?>"><span><?php echo $label; ?></span> <span class="hero-nav-color-block"><?php echo $label; ?></span></a></li>
       
       <?php endif; ?>
        

    <?php $count++; endwhile;

        else :

            echo '<p>Please add hero nav items in the homepage editor</p>';

        endif; ?>

	</ul>

	<div class="hero-container-text">

		<a href="<?php the_field('hero_url'); ?>"<?php if($modal): ?> class="js-popup"<?php endif; ?>>

			<h2 class="hero-lead"><?php the_field('hero_image_headline'); ?></h2>
			<p class="hero-subtitle"><span class="hero-subtitle-text"><?php the_field('hero_image_text'); ?></span> <span class="hero-subtitle-arrow icon-lg-arrow"></span></p>

		</a>

	</div>

	

</div>

<?php if($modalContent): ?>
<div id="modal" class="mfp-hide white-popup">
    <?php echo $modalContent; ?>
</div>
<?php endif; ?>