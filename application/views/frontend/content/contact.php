<!DOCTYPE html>
<html lang="en">
	
	<head>
		<?php $this->load->view('frontend/partials/meta'); ?>
	</head>
	
	<body>

		<div class="layer"></div>
		<!-- Mobile menu overlay mask -->

		<div id="preloader">
			<div data-loader="circle-side"></div>
		</div>
		<!-- End Preload -->

		<?php $this->load->view('frontend/partials/header'); ?>

		<!-- SubHeader =============================================== -->
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_contact.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>Contact us</h1>
				<p>"Contact 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<div class="container margin_60_35">
			<div class="row">

				<div class="col-md-9">
					<!--
					<h3>Contact us</h3>
					-->
					<div class="alert alert-success" role="alert">
						<p>
							Fill form below and submit. We will get back to you as soon as we recieve your message!
						</p>
					</div>
					<div>
						<div id="message-contact"></div>
						<form id="contact-form" name="contact-form">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Full name</label>
										<input type="text" class="form-control styled" id="fullname" name="fullname" placeholder="Radafy Ranaivo" required="">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Email:</label>
										<input type="email" id="email_contact" name="email_contact" class="form-control styled" placeholder="info@374mma.com" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Phone number:</label>
										<input type="text" id="phone_contact" name="phone_contact" class="form-control styled" placeholder="+1 (902) 200-4690" required="">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Topic of Contact:</label>
										<div class="styled-select">
											<select class="form-control" name="plan" id="plan" required="">
												<option value="">Select</option>
												<option value="About My Membership at 374 MMA">About My Membership at 374 MMA</option>
												<option value="About Enrolment To 374 MMA">About Enrolment To 374 MMA </option>
												<option value="Writing Testimonial About 374 MMA">Writing Testimonial About 374 MMA</option>
												<option value="Private Training sessions 374 MMA">Private Training sessions</option>
												<option value="I Want To Partner with 374 MMA">I Want To Partner with 374 MMA</option>
											</select>
										</div>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="5" id="message_contact" name="message_contact" class="form-control styled" style="height:100px;" placeholder="Write your message here ..." required=""></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Are you human? 3 + 7 + 4 =</label>
										<input type="text" id="verify_contact" class=" form-control styled" placeholder=" 3 + 1 =" required="">
									</div>
									<p><input type="submit" value="Submit" class="btn_1" id="submit-contact"></p>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- End col lg 9 -->
				<aside class="col-md-3">
					<div class="box_style_2">
						<!--
						<h4><b>Contacts info</b></h4>
						-->
						<h5><b><i class="icon-address"></i> 374 MMA Address</b></h5>
						<p>
							6430 Lady Hammond Rd, Halifax, NS B3K 2S3, Canada 
						</p>
						<h5><b><i class="icon-direction-1"></i> Get direction to 374 MMA</b></h5>
						<form action="http://maps.google.com/maps" method="get" target="_blank">
							<div class="form-group">
								<input type="text" name="saddr" placeholder="Enter your location" class="form-control styled">
								<input type="hidden" name="daddr" value="6430 Lady Hammond Rd, Halifax, NS B3K 2S3, Canada">
								<!-- Write here your end point -->
							</div>
							<input type="submit" value="Get directions" class="btn_1 add_bottom_15">
						</form>
						<ul class="contacts_info">
							<li><b>374 MMA Telephone & Email</b>
								<br>
								<i class="icon-phone-squared"></i> <a href="tel:19022004690">+1 (902) 200-4690</a>
								<br>
								<i class="icon-email"></i> <a href="mailto:info@374mma.com">info@374mma.com</a>
							</li>
							
							<li><b><i class="icon-clock-4"></i> Business Hours</b>
								<br>
								<small>Sunday <strong>Closed*</strong></small> <br>
								<small>Monday 6:00 PM - 10:00 PM</small> <br>
								<small>Tuesday 5:00 PM - 9:00 PM</small> <br>
								<small>Wednesday 6:00 AM - 10:00 PM</small> <br>
								<small>Thursday 5:00 AM - 9:00 PM</small> <br>
								<small>Friday 6:00 AM - 10:00 PM</small> <br>
								<small>Saturday 10:00 AM - 4:00 PM</small>
							</li>
							
						</ul>
					</div>
				</aside>
				<!--End aside -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->

		<div id="map_contact"></div>
		<!-- end map-->

		<?php $this->load->view('frontend/partials/footer'); ?>
		<?php $this->load->view('frontend/partials/copyright'); ?>

		<div id="toTop"></div>
		<!-- Back to top button -->

		<?php $this->load->view('frontend/partials/search'); ?>
		<?php $this->load->view('frontend/partials/scripts'); ?>
	</body>

	<script type="text/javascript">
		$(document).ready(function(){
			$("form[name='contact-form']").submit(function(e) {
	        	var loading = new Loading();
	            var formData = new FormData($(this)[0]);
            
	            $.ajax({
	                url: '<?php echo site_url('home/contact_user'); ?>',
	                type: "POST",
	                data: formData,
	                dataType: "json",
	                success: function(response) {
	                	loading.out();

	                	if(response.success){
	                		$('#contact-form').trigger("reset");

	                		Swal.fire({
				                text: response.message,
				                icon: "success",
				                buttonsStyling: false,
				                confirmButtonText: "OK",
		                        customClass: {
		    						confirmButton: "btn font-weight-bold btn-light-primary"
		    					}
				            });
	                	}
	                	else{
	                		Swal.fire({
				                text: response.message,
				                icon: "error",
				                buttonsStyling: false,
				                confirmButtonText: "OK",
		                        customClass: {
		    						confirmButton: "btn font-weight-bold btn-light-primary"
		    					}
				            });
	                	}
	                },
	                error: function(xhr, status, error) {
	                    var json = $.parseJSON(xhr.responseText);

	                    Swal.fire({
			                text: json.message,
			                icon: "error",
			                buttonsStyling: false,
			                confirmButtonText: "OK",
	                        customClass: {
	    						confirmButton: "btn font-weight-bold btn-light-primary"
	    					}
			            });
	                },
	                cache: false,
	                contentType: false,
	                processData: false
	            });

	            e.preventDefault();
	        });
		});
	</script>
</html>