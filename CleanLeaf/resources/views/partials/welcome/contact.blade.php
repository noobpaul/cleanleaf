<section id="contact">
  <div class="animatedParent animateOnce container" data-appear-top-offset='-400'>
    <div class="row animated fadeInDownShort">
      <div class="col-md-12 text-center">
        <h2 class="section-title">Contact Us</h2>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-3 offset-lg-1">
        <div class="animated fadeInLeftShort info">
          <div>
            <i class="fa fa-map-marker"></i>
            <p>397 M.H Del Pilar, Maysilo, Malabon City</p>
          </div>
          
          <div>
            <i class="fa fa-envelope"></i>
            <p>info@cleanleaf.com.ph</p>
          </div>
          
          <div>
            <i class="fa fa-phone"></i>
            <p>(02)990-6607/(02)961-6405<br>(02)962-8313</p>
          </div>

        <!-- Inquiry   -->
        <label>Quick Inquiry</label><br>

        <form action="{{ url('/') }}" method="POST">
          {{ csrf_field() }}
          <div style="padding-bottom: 5px;">
            <input type="text" name="name_inq" class="form-control input-sm"  placeholder="Name">
          </div>
          <div style="padding-bottom: 5px;">
            <input type="text" name="company_inq" class="form-control input-sm"  placeholder="Company">
          </div>
          <div style="padding-bottom: 5px;">
            <input type="text" name="contact_inq" class="form-control input-sm"  placeholder="Contact Number or E-mail address">
          </div>
          <div style="padding-bottom: 5px;">
            <textarea class="form-control input-sm" name="inq" placeholder="Inquiry"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-sm pull-left" id="send_inq"><span class="fa fa-paper-plane"></span> Send Inquiry</button><br>
        </form> <br>

        </div>
      </div>
            
      
        <div class="animated fadeInRightShort col-sm-6 col-xs-12 col-md-8 google-maps pull-right">
          <!-- Embedded Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.5600581295707!2d120.9566381146159!3d14.680890689751358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b46ba7b1c88f%3A0x39222f7ff67384cc!2sClean+Leaf+International+Corporation!5e0!3m2!1sen!2sph!4v1505118511918" width="0" height="0" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        
    </div>
  </div>
</section>