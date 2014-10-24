<?php 	$x = 1; 
		$template = get_page_template_slug( $post->ID ); ?>

<?php if($template == 'page-campaign-detail.php'): ?>
<div class="footer-post-nav">
	<div class="container">
		<div class="row">
			<div class="footer-post-nav col-sm-9 col-sm-offset-2">
				<h2 class="text-center caps black-text"><strong>Read This.</strong></h2>
					<ul class="list-inline grid-3-up">

				<?php while($x<7) { ?><li>
						<a class="center-block" href="#">
							<p class="section-name">Healthy Communities</p>
							<h3><strong>Equality and Access in Health</strong></h3>
							<p class="small date">May 23, 2014</p>
						</a>
					</li><?php $x++; } ?>

				</ul>
			</div>
		</div>
	</div>
</div>

<?php else: ?>

<div class="footer-post-nav">
	<div class="container">
		<div class="row">
			<div class="footer-post-nav col-sm-9 col-sm-offset-2">
				<h2 class="text-center caps black-text"><strong>Read This.</strong></h2>
					<ul class="list-inline grid-3-up">

					<?php while($x<4) { ?><li>
							<a class="center-block" href="#">
								<p class="section-name">Healthy Communities</p>
								<h3><strong>Equality and Access in Health</strong></h3>
								<p class="small date">May 23, 2014</p>
							</a>
						</li><?php $x++; } ?>

					</ul>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>