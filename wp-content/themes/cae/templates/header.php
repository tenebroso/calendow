<header id="fixed" class="banner" role="banner">
  <div class="container">
  
    <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo img_dir(); ?>/svg/logo.svg"></a>

    <div class="pull-right">
      <?php get_search_form();?>
      <a class="js-nav-open-trigger nav-collapse"></a>
    </div>

  </div>
</header>

<div class="nav-full-screen">
  <div class="container">
    <div class="row nav-full-screen-branding">
        <div class="col-xs-3">
          <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo img_dir(); ?>/svg/logo-white.svg"></a>
        </div>
        <div class="col-xs-7 text-right">
          <?php get_template_part('templates/footer/icons'); ?>
        </div>
        <div class="col-xs-2 text-right">
          <a class="js-nav-close-trigger nav-collapse"></a>
        </div>
    </div>

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
          <?php wp_nav_menu( array('menu' => 'Action','menu_class' => 'nav-list youth-in-action' )); ?>
      </div>
    </div><!-- .row -->

  </div><!-- .container -->

  <div class="secondary-nav">

    <div class="container">

      <div class="row">
        <div class="col-sm-4">
            <?php wp_nav_menu( array('menu' => 'Our Story','menu_class' => 'nav-list secondary' )); ?>
        </div>
        <div class="col-sm-4">
            <?php wp_nav_menu( array('menu' => 'Youth in Action','menu_class' => 'nav-list secondary' )); ?>
        </div>
        <div class="col-sm-4">
            <?php wp_nav_menu( array('menu' => 'Newsletters','menu_class' => 'nav-list secondary' )); ?>
        </div>
      </div><!-- .row -->

    </div><!-- .container -->

  </div><!-- .secondary-nav -->

  <div class="utility-nav">

      <div class="container">

        <div class="row">
          <div class="col-sm-4">
              <?php wp_nav_menu( array('menu' => 'Careers','menu_class' => 'nav-list' )); ?>
          </div>
          <div class="col-sm-4">

            <?php wp_nav_menu( array('menu' => 'Conferences','menu_class' => 'nav-list' )); ?>

          </div>
          <div class="col-sm-4">
              <ul class="nav-list">
                <li class="heading"><a href="#">Contact Us</a></li>
                <li><a href="#">Safe Streets</a></li>
                <li><a href="#">Junk Drinks/Food</a></li>
                <li><a href="#">Place to Walk</a></li>
                <li><a href="#">Neighborhood Campaigns</a></li>
              </ul>
          </div>
        </div><!-- .row -->

      </div><!-- .container -->

  </div><!-- .utility-nav -->

</div><!-- .nav-full-screen -->