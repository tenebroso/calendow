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
        <div class="col-sm-3">
          <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo img_dir(); ?>/svg/logo-white.svg"></a>
        </div>
        <div class="col-sm-7 text-right">
          <?php get_template_part('templates/footer/icons'); ?>
        </div>
        <div class="col-sm-2 text-right">
          <a class="js-nav-close-trigger nav-collapse"></a>
        </div>
    </div>

    <div class="row">
      <div class="col-md-4">
          <ul class="nav-list neighborhoods">
            <li class="heading"><a href="#">Neighborhoods</a></li>
            <li><a href="#">Safe Streets</a></li>
            <li><a href="#">Junk Drinks/Food</a></li>
            <li><a href="#">Place to Walk</a></li>
            <li><a href="#">Neighborhood Campaigns</a></li>
          </ul>
      </div>
      <div class="col-md-4">
          <ul class="nav-list prevention">
            <li class="heading"><a href="#">Prevention</a></li>
            <li><a href="#">Safe Streets</a></li>
            <li><a href="#">Junk Drinks/Food</a></li>
            <li><a href="#">Place to Walk</a></li>
            <li><a href="#">Neighborhood Campaigns</a></li>
          </ul>
      </div>
      <div class="col-md-4">
          <ul class="nav-list schools">
            <li class="heading"><a href="#">Schools</a></li>
            <li><a href="#">Safe Streets</a></li>
            <li><a href="#">Junk Drinks/Food</a></li>
            <li><a href="#">Place to Walk</a></li>
            <li><a href="#">Neighborhood Campaigns</a></li>
          </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
          <ul class="nav-list places">
            <li class="heading"><a href="#">Neighborhoods</a></li>
            <li><a href="#">Safe Streets</a></li>
            <li><a href="#">Junk Drinks/Food</a></li>
            <li><a href="#">Place to Walk</a></li>
            <li><a href="#">Neighborhood Campaigns</a></li>
          </ul>
      </div>
      <div class="col-md-4">
          <ul class="nav-list grants-and-funding">
            <li class="heading"><a href="#">Prevention</a></li>
            <li><a href="#">Safe Streets</a></li>
            <li><a href="#">Junk Drinks/Food</a></li>
            <li><a href="#">Place to Walk</a></li>
            <li><a href="#">Neighborhood Campaigns</a></li>
          </ul>
      </div>
      <div class="col-md-4">
          <ul class="nav-list action">
            <li class="heading"><a href="#">Schools</a></li>
            <li><a href="#">Safe Streets</a></li>
            <li><a href="#">Junk Drinks/Food</a></li>
            <li><a href="#">Place to Walk</a></li>
            <li><a href="#">Neighborhood Campaigns</a></li>
          </ul>
      </div>
    </div><!-- .row -->

  </div><!-- .container -->

  <div class="secondary-nav">

    <div class="container">

      <div class="row">
        <div class="col-md-4">
            <ul class="nav-list secondary">
              <li class="heading"><a href="#">Neighborhoods</a></li>
              <li><a href="#">Safe Streets</a></li>
              <li><a href="#">Junk Drinks/Food</a></li>
              <li><a href="#">Place to Walk</a></li>
              <li><a href="#">Neighborhood Campaigns</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="nav-list secondary">
              <li class="heading"><a href="#">Prevention</a></li>
              <li><a href="#">Safe Streets</a></li>
              <li><a href="#">Junk Drinks/Food</a></li>
              <li><a href="#">Place to Walk</a></li>
              <li><a href="#">Neighborhood Campaigns</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="nav-list secondary">
              <li class="heading"><a href="#">Schools</a></li>
              <li><a href="#">Safe Streets</a></li>
              <li><a href="#">Junk Drinks/Food</a></li>
              <li><a href="#">Place to Walk</a></li>
              <li><a href="#">Neighborhood Campaigns</a></li>
            </ul>
        </div>
      </div><!-- .row -->

    </div><!-- .container -->

  </div><!-- .secondary-nav -->

  <div class="utility-nav">

      <div class="container">

        <div class="row">
          <div class="col-md-4">
              <ul class="nav-list">
                <li class="heading"><a href="#">Careers</a></li>
                <li><a href="#">Safe Streets</a></li>
                <li><a href="#">Junk Drinks/Food</a></li>
                <li><a href="#">Place to Walk</a></li>
                <li><a href="#">Neighborhood Campaigns</a></li>
              </ul>
          </div>
          <div class="col-md-4">
              <ul class="nav-list">
                <li class="heading"><a href="#">Conferences</a></li>
                <li><a href="#">Safe Streets</a></li>
                <li><a href="#">Junk Drinks/Food</a></li>
                <li><a href="#">Place to Walk</a></li>
                <li><a href="#">Neighborhood Campaigns</a></li>
              </ul>
          </div>
          <div class="col-md-4">
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


    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
      endif;
    ?>