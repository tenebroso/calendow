<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
  ?>

    <div id="page" class="wrapper" role="document">
      <?php get_template_part('templates/header'); ?>
        <main class="main" role="main">
          <div class="container">
            <?php include roots_template_path(); ?>
          </div>
        </main>
        <?php get_template_part('templates/footer'); ?>
    </div>

  
   

</body>
</html>