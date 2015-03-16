<?php $pin = get_field('pin_graphic'); ?>
<?php $color = get_field('color'); ?>
<?php $text = get_field('text'); ?>
                    
                <?php if($pin): ?>

                    <div class="health-block" style="background-image:url(<?php echo $pin; ?>);">
						<p class="placemarker-block caps">Health <br />Happens <br />Here <br />
						    <span style="color:<?php echo $color; ?>"><?php echo $text; ?>
				        </p>
					</div>
					
				<?php endif; ?>