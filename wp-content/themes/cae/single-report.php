<div class="report-sidebar">
	<a href="<?php the_permalink(); ?>" class="report-sidebar-title">
		<h3><?php the_title(); ?></h3>
		<p class="time"><?php the_time('F j, Y'); ?></p>
	</a>
	<ul class="report-nav">
		<?php $i = 1; if( have_rows('section_builder') ): while ( have_rows('section_builder') ) : the_row(); 
			$title = get_sub_field('section_title'); ?>

			<li data-id="<?php echo $i; ?>"><a href="#report-panel-<?php echo $i; ?>"><?php echo $title; ?></a></li>

		<?php $i++; endwhile; $total = count( get_field('section_builder') ); else : endif; ?>
		<li class="full-report"><?php the_field('full_report_download'); ?></li>
	</ul>
</div>

<div class="report-container">
	<span class="clearfix"></span>

	<?php $i = 1; if( have_rows('section_builder') ): while ( have_rows('section_builder') ) : the_row(); ?>

	<div class="report-single<?php if($i == 1):?> current<?php endif; ?>" id="report-panel-<?php echo $i; ?>" data-id="<?php echo $i; ?>">
		<ul class="report-lr-nav report-nav-top">
			<li class="report-prev"><a class="icon-sm-arrow" href="#report-panel-<?php echo $i - 1; ?>"></a></li><li class="report-current"><span><?php echo $i; ?></span> of <?php echo $total; ?></li><li class="report-next"><a class="icon-sm-arrow" href="#report-panel-<?php echo $i + 1; ?>"></a></li>
		</ul>
		<div class="report-content">
			<?php the_sub_field('section_content'); ?>
		</div>
		<ul class="report-lr-nav">
			<li class="report-prev"><a class="icon-sm-arrow" href="#report-panel-<?php echo $i - 1; ?>"></a></li><li class="report-current report-share">

			<span class="inline-block">Share this Card</span> 

			<?php $twitter = get_sub_field('section_twitter_text'); ?>
			<?php if($twitter): ?>
			<a class="inline-block popup" href="http://twitter.com/home?status=<?php echo $twitter; ?> <?php echo wp_get_shortlink(); ?>%23<?php echo $i; ?>">Twitter</a>
			<?php else: ?>
			<a class="inline-block popup" href="http://twitter.com/home?status=<?php the_title(); ?> <?php echo wp_get_shortlink(); ?>%23<?php echo $i; ?>">Twitter</a>
			<?php endif; ?>

			<a class="inline-block popup" href="http://www.facebook.com/sharer.php?u=<?php echo wp_get_shortlink(); ?>%23<?php echo $i; ?>" target="_blank"> Facebook </a>

			</li><li class="report-next"><a class="icon-sm-arrow" href="#report-panel-<?php echo $i + 1; ?>"></a></li>
		</ul>
	</div>

	<?php $i++; endwhile; else : endif; ?>
	<span class="clearfix"></span>

</div>