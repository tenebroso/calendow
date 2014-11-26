<div class="panel-group" id="accordion">

<?php $i = 1; if( have_rows('accordion_builder') ):

    while ( have_rows('accordion_builder') ) : the_row(); 
    
      $title = get_sub_field('accordion_title');
      $sub = get_sub_field('accordion_sub-title');
      $aContent = get_sub_field('accordion_content'); 
      $aImage = get_sub_field('accordion_image'); ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?php echo $i; ?>" class="collapsed">
          <span><?php echo $title; ?><?php if($sub): ?><br /><i><?php echo $sub; ?></i><?php endif; ?></span>
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="container text-content">
        <?php if($aImage): ?>
          <div class="row">
            <div class="col-sm-3">
              <img src="<?php echo $aImage; ?>">
              <a href="#top" class="btn btn-default">Back to Top</a>
            </div>
            <div class="col-sm-9">
              <?php echo $aContent; ?>
            </div>
          </div>
        <?php else: ?>
          <?php echo $aContent; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php $i++; endwhile; else : endif; ?>

</div>