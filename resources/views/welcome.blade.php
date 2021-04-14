<!DOCTYPE html>
<html lang="en">
  @include('welcome.head')
  <body>
        @include('welcome.header')
		@include('welcome.navbar')
    <!-- END nav -->
        @include('welcome.home')
		
		<section class="intro">
			<div class="container intro-wrap">
				<div class="row no-gutters">
					<div class="col-md-12 col-lg-9 bg-intro d-sm-flex align-items-center align-items-stretch">
						<div class="intro-box d-flex align-items-center">
							<div class="icon d-flex align-items-center justify-content-center">
								<i class="flaticon-repair"></i>
							</div>
							<h2 class="mb-0">Estas Listo? <span>Apersonate a nuestra sucursal!</span></h2>
						</div>
						<a href="#contact-section" class="bg-primary btn-custom d-flex align-items-center"><span>Contactanos</span></a>
					</div>
				</div>
			</div>	
		</section>

    
   	
    

    
		@include('welcome.servicio')
		@include('welcome.about')	
		@include('welcome.contact')	
    	@include('welcome.blog')	
	

    
	

        @include('welcome.footer')
    
  

  <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
          <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
          <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
        </svg>
    </div>


  <script src="{{ asset('onepage/js/jquery.min.js') }}"></script>
  <script src="{{ asset('onepage/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('onepage/js/popper.min.js') }}"></script>
  <script src="{{ asset('onepage/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('onepage/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('onepage/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('onepage/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('onepage/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('onepage/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('onepage/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('onepage/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('onepage/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('onepage/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('onepage/js/google-map.js') }}"></script>
  <script src="{{ asset('onepage/js/main.js') }}"></script>
    
  </body>
</html>