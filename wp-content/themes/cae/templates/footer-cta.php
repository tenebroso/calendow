<div class="footer">

  <div class="footer-cta-wrap footer-light-blue-wrap">

    <div class="container">

      <div class="row">

        <div class="col-md-3 nb-cta">
          <h3 class="nb-cta-text">Count Me In</h3>
        </div>
        <div class="col-md-9 nb-cta-form">
<!--           <input type="email" placeholder="Email">
          <input type="text" placeholder="Zipcode">
          <input type="submit" value="Submit"> -->


        <form class="ajaxForm signup_form" method="POST" action="/forms/signups">
          <input name="authenticity_token" type="hidden" value="sEZWZCd+9bdcK/CUYy+gSH7/YmJuA9zLcXZcFf9ZPE8="/><input name="page_id" type="hidden" value="1"/>
          <input name="return_to" type="hidden" value="http://swellcreativegroup.nationbuilder.com/"/>
            <div class="email_address_form" style="display:none;">
              <p>
                <label for "email_address">Optional email code</label>
                <br/>
                <input name="email_address" type="text" class="text" id="email_address" autocomplete="off"/>
              </p>
            </div> 
          <div class="form-errors"></div>
          <input required=""  class="text" id="signup_email" name="signup[email]" placeholder="Email address" type="email" />  
          <input class="button" type="submit" name="commit" value="Submit" />
          <div class="form-submit"></div>
          </form>


        </div>

      </div>

      <div class="row">

        <div class="col-xs-12 text-center">
          
          <?php get_template_part('templates/footer/icons'); ?>

        </div>

      </div>

    </div>

  </div>

</div>