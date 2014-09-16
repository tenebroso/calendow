<footer class="content-info footer" role="contentinfo">

  <div class="footer-cta-wrap">

    <div class="container">

      <div class="row">

        <div class="col-md-3 nb-cta">
          <h3 class="nb-cta-text">Count Me In</h3>
        </div>
        <div class="col-md-9 nb-cta-form">
          <input type="email" placeholder="Email">
          <input type="text" placeholder="Zipcode">
          <input type="submit" value="Submit">
        </div>

      </div>

      <div class="row">

        <div class="col-xs-12">
          
          <ul class="nav footer-social-icons">
            <li class="icon-twitter"> </li>
            <li class="icon-facebook"> </li>
            <li class="icon-youtube"> </li>
            <li class="icon-instagram"> </li>
          </ul>

        </div>

      </div>

    </div>

  </div>

  <div class="container">
    <div class="col-md-4 footer-logo">
      <img src="<?php echo img_dir(); ?>/svg/logo-footer.svg">
      <p class="footer-copyright">&copy; Copyright <?php echo date('Y'); ?> <?php bloginfo('title'); ?></p>
    </div>
    <div class="col-md-8">
		
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
