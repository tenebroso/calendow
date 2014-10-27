<div class="row">


<?php
    $args = array(
        'post_type' => 'page',//it is a Page right?
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'page-campaign-overview.php', // template name as stored in the dB
            )
        )
    );
$navList = new WP_Query($args); 
?>

<?php if ( $navList->have_posts() ) : while ( $navList->have_posts() ) : ?>
<?php $navList->the_post(); ?>
<div class="col-md-4">
  <ul class="nav-list <?php $title = get_the_title(); $str = strtolower($title); echo $str; ?>">
  <li class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php
  $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

  foreach( $mypages as $page ) {    
    $content = $page->post_content;
    if ( ! $content ) // Check for empty page
      continue;

    $content = apply_filters( 'the_content', $content );
  ?>
    <li><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>
  <?php
  } 
?>
</ul>
</div>
  <?php endwhile; endif; wp_reset_postdata(); ?>
  
</div>