<header id="fixed" class="banner" role="banner">
  <div class="container">
  
    <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo img_dir(); ?>/svg/logo-v2.svg"></a>

    <div class="pull-right">
      <?php get_search_form();?>
      <div class="nav-collapse-wrap">
        <a class="js-nav-open-trigger nav-collapse">menu</a>
      </div>
    </div>

  </div>
</header>

<div class="nav-full-screen">
  <div class="container">
    <div class="row nav-full-screen-branding">
        <div class="col-xs-3">
          <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo img_dir(); ?>/svg/logo-v2-white.svg"></a>
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
          <?php wp_nav_menu( array('menu' => 'Learning','menu_class' => 'nav-list youth-in-action' )); ?>
      </div>
    </div><!-- .row -->

  </div><!-- .container -->

  <div class="secondary-nav">

    <div class="container">

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

    </div><!-- .container -->

  </div><!-- .secondary-nav -->

  <div class="utility-nav">

      <div class="container">

        <div class="row">
          <div class="col-sm-4">
              <?php wp_nav_menu( array('menu' => 'Green Left','menu_class' => 'nav-list' )); ?>
          </div>
          <div class="col-sm-4">

            <?php wp_nav_menu( array('menu' => 'Green Center','menu_class' => 'nav-list' )); ?>

          </div>
          <div class="col-sm-4">
              <?php the_field('contact_information','options'); ?>
          </div>
        </div><!-- .row -->

      </div><!-- .container -->

  </div><!-- .utility-nav -->

</div><!-- .nav-full-screen -->