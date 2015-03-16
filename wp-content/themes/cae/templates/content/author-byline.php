<?php 
    $aPhoto = get_field('author_photo'); 
    $aTitle = get_field('author_title');
    $aName = get_field('author_name');
    $aUrl = get_field('author_url');
?>


<?php if($aName): ?>
    
    <?php if($aUrl): ?>
        <a class="author_byline" href="<?php echo $aUrl; ?>">
    <?php else: ?>
        <div class="author_byline">
    <?php endif; ?>

    <?php if($aPhoto): ?>
        <img src="<?php echo $aPhoto; ?>" class="author_byline--photo img-circle">
    <?php endif; ?>
    
    <div class="author_byline--details">
        <p class="author_byline--name"><?php echo $aName; ?></p>
        <?php if($aTitle): ?><p class="author_byline--title"><?php echo $aTitle; ?></p><?php endif; ?>
    </div>

    <?php if($aUrl): ?>
        </a>
    <?php else: ?>
        </div>
    <?php endif; ?>

<?php endif; ?>