<?php 
    
    $cUrl = get_sub_field('credit_url');
    $cAuthor = get_sub_field('credit_author');

    $maincAuthor = get_field('credit_author');
    $maincUrl = get_field('credit_url');
?>
   

<?php if($cAuthor): ?>
    <div class="photo_credit">
        <?php if($cUrl): ?>
           <a href="<?php echo $cUrl; ?>" class="photo_credit--link">
        <?php else: ?>
           <span class="photo_credit--author">
        <?php endif; ?>
            
                <?php echo $cAuthor; ?>
        
        <?php if($cUrl): ?>
            </a>
        <?php else: ?>
            </span>
        <?php endif; ?>
    </div>
    
<?php elseif($maincAuthor): ?>
     <div class="photo_credit photo_credit--header">
        <?php if($maincUrl): ?>
           <a href="<?php echo $maincUrl; ?>" class="photo_credit--link">
        <?php else: ?>
           <span class="photo_credit--author">
        <?php endif; ?>
            
                <?php echo $maincAuthor; ?>
        
        <?php if($maincUrl): ?>
            </a>
        <?php else: ?>
            </span>
        <?php endif; ?>
    </div>
<?php endif; ?>