<div class="panel-group" id="accordion">

<?php $i = 1; 

    if( have_rows('accordion_builder') ):
    while ( have_rows('accordion_builder') ) : the_row(); 
    
      $title = get_sub_field('accordion_title');
      $sub = get_sub_field('accordion_sub-title');
      $aRow = get_sub_field('accordion_repeater_content');
      $titleClean = str_replace(' ', '-', $title); 
      $aLink = strtolower($titleClean); ?>

  <div class="panel panel-default" id="<?php echo $aLink; ?>">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?php echo $i; ?>" class="collapsed" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
          <span><?php echo $title; ?><?php if($sub): ?><br /><i><?php echo $sub; ?></i><?php endif; ?></span>
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="container text-content">
        <?php 
          if( have_rows('accordion_repeater_content') ): 
          while ( have_rows('accordion_repeater_content') ) : the_row();
          $aContent = get_sub_field('accordion_content'); 
          $aImage = get_sub_field('accordion_image');  ?>

        <?php if($aImage): ?>
          <div class="row">
            <div class="col-sm-3">
              <img src="<?php echo $aImage; ?>">
              <a href="#top" class="btn btn-default hidden-xs">Back to Top</a>
            </div>
            <div class="col-sm-9">
              <?php echo $aContent; ?>
              <a href="#top" class="btn btn-default visible-xs-inline-block">Back to Top</a>
            </div>
          </div>
        <?php else: ?>
          <?php echo $aContent; ?>
        <?php endif; ?>

      <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php $i++; endwhile; else : endif; ?>

</div>