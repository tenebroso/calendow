<?php //get_template_part('templates/sidebar','nav'); ?>

<?php while (have_posts()) : the_post(); ?>
  <article class="hentry content-page text-content">
     <div class="container">

	    <div class="row">
          <div class="col-sm-4">
              <?php wp_nav_menu( array('menu' => 'Neighborhoods','menu_class' => 'nav-list neighborhoods' )); ?>
          </div>
          <div class="col-sm-4">
              <?php wp_nav_menu( array('menu' => 'Prevention','menu_class' => 'nav-list prevention' )); ?>
          </div>
          <div class="col-sm-4">
             <?php wp_nav_menu( array('menu' => 'Schools','menu_class' => 'nav-list schools' )); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4">
              <?php wp_nav_menu( array('menu' => 'Places','menu_class' => 'nav-list places' )); ?>
          </div>
          <div class="col-sm-4">
              <?php wp_nav_menu( array('menu' => 'Grants and Funding','menu_class' => 'nav-list grants-and-funding' )); ?>
          </div>
          <div class="col-sm-4">
              <?php wp_nav_menu( array('menu' => 'Learning','menu_class' => 'nav-list youth-in-action' )); ?>
          </div>
        </div><!-- .row -->

	    <div class="row">
            <div class="col-sm-4">
                <?php wp_nav_menu( array('menu' => 'Grey Left','menu_class' => 'nav-list secondary' )); ?>
            </div>
            <div class="col-sm-4">
                <?php wp_nav_menu( array('menu' => 'Grey Center','menu_class' => 'nav-list secondary' )); ?>
            </div>
            <div class="col-sm-4">
                <?php wp_nav_menu( array('menu' => 'Grey Right','menu_class' => 'nav-list secondary' )); ?>
            </div>
          </div><!-- .row -->

	      <div class="row">
              <div class="col-sm-6">
                  <?php wp_nav_menu( array('menu' => 'Green Left','menu_class' => 'nav-list' )); ?>
              </div>
              <div class="col-sm-6">

                <?php wp_nav_menu( array('menu' => 'Green Center','menu_class' => 'nav-list' )); ?>

              </div>
              <div class="col-sm-4">
                  <?php //the_field('contact_information','options'); ?>
              </div>
            </div><!-- .row -->

	</div>


  </article>
<?php endwhile; ?>