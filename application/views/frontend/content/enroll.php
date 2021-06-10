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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_beader_enroll.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>Enroll Today</h1>
				<p>"Enroll Now To Join 374 MMA Family!"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<!-- Content ================================================== -->
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form id="enroll-form" name="enroll-form">
						<div class="box_style_2 col-md-12">
							<div class="form_title">
								<h3><strong>1</strong>Your Details *</h3>
								<p>
									Type your first & last name, email address and phone number.
								</p>
							</div>
							<div class="step">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>First name:</label>
											<input type="text" class="form-control" id="firstname_booking" name="firstname_booking" required="">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Last name:</label>
											<input type="text" class="form-control" id="lastname_booking" name="lastname_booking" required="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Email:</label>
											<input type="email" id="email_booking" name="email_booking" class="form-control" required="">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Phone Number:</label>
											<input type="text" id="telephone_booking" name="telephone_booking" class="form-control" required="">
										</div>
									</div>
								</div>
							</div>
							<!--End step -->

							<div class="form_title">
								<h3><strong>2</strong>Adult Classes</h3>
								<p>
									Select classes you are interested in. (You can select more than one).
								</p>
							</div>
							<div class="step">
								<div class="form-group">
									<label>
										<input type="checkbox" name="adult_classes[]" value="Self Defense Jiu Jitsu"> Self Defense Jiu Jitsu
									</label>
									<br>
									<label>
										<input type="checkbox" name="adult_classes[]" value="Muay Thai Level I"> Muay Thai Level I
									</label>
									<br>
									<label>
										<input type="checkbox" name="adult_classes[]" value="Muay Thai Level II"> Muay Thai Level II
									</label>
									<br>
									<label>
										<input type="checkbox" name="adult_classes[]" value="Muay Thai Level III"> Muay Thai Level III
									</label>
									<br>
									<label>
										<input type="checkbox" name="adult_classes[]" value="Boxing"> Boxing
									</label>
									<br>
									<label>
										<input type="checkbox" name="adult_classes[]" value="Capoeira"> Capoeira
									</label>
									<br>
									<label>
										<input type="checkbox" name="adult_classes[]" value="Body Weights"> Body Weights
									</label>
								</div>
							</div>
							<!--End step -->

							<div class="form_title">
								<h3><strong>3</strong>Youth Classes</h3>
								<p>
									Select classes you are interested in. (You can select more than one).
								</p>
							</div>
							<div class="step">
								<div class="form-group">
									<label>
										<input type="checkbox" name="youth_classes[]" value="Youth Muay Thai"> Youth Muay Thai
									</label>
									<br>
									<label>
										<input type="checkbox" name="youth_classes[]" value="Youth Advanced"> Youth Advanced
									</label>
									<br>
									<label>
										<input type="checkbox" name="youth_classes[]" value="Youth Self Defence"> Youth Self Defence
									</label>
								</div>
							</div>
							<!--End step -->

							<div class="form_title">
								<h3><strong>4</strong>Kids Classes</h3>
								<p>
									Select classes your child is interested in. (You can select more than one).
								</p>
							</div>
							<div class="step">
								<div class="form-group">
									<label>
										<input type="checkbox" name="kids_classes[]" value="Kids BJJ"> Kids BJJ
									</label>
									<br>
									<label>
										<input type="checkbox" name="kids_classes[]" value="Kids Self Defense Jiu Jitsu"> Kids Self Defense Jiu Jitsu
									</label>
								</div>
							</div>
							<!--End step -->
							
							<div class="form_title">
								<h3><strong>5</strong>Newsletter & Policy *</h3>
								<p>
									Please, read 374 MMA Privacy Policy statement.
								</p>
							</div>
							<div class="step add_bottom_30">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>
												<input type="checkbox" name="newsletter" id="newsletter"> 
													Add me to 374 MMA newsletter. WE WILL NOT SPAM your email.
											</label>
											<br>
											<label>
												<input type="checkbox" name="policy_terms" id="policy_terms" required=""> 
													I agree with 374 MMA privacy statement which can be found in the footer of this page.
											</label>
										</div>
									</div>
								</div>

							</div>
							<!--End step -->
							
							<div class="form_title">
								<h3><strong>6</strong>Security question *</h3>
								<p>
									Answer security question to verify you are NOT a robot.
								</p>
							</div>
							<div class="step add_bottom_30">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Are you human? 3 + 7 + 4 =</label>
											<input type="text" id="verify_plan" name="verify_plan" class="form-control" placeholder="3 + 7 + 4 =" required="">
										</div>
									</div>
								</div>

							</div>
							<!--End step -->
							
							<p>
								<div id="message-subscribe"></div>
								<button class="btn_1" type="submit">Submit Form Now</button>
							</p>
							<div id="message-subscribe"></div>
						</div>
					</form>
				</div>
				<!-- End box_style_2 -->
			</div>
		</div>
		<!-- End container -->

		<?php $this->load->view('frontend/partials/newsletter'); ?>
		<?php $this->load->view('frontend/partials/footer'); ?>
		<?php $this->load->view('frontend/partials/copyright'); ?>

		<div id="toTop"></div>
		<!-- Back to top button -->

		<?php $this->load->view('frontend/partials/search'); ?>
		<?php $this->load->view('frontend/partials/scripts'); ?>
	</body>

	<script type="text/javascript">
		$(document).ready(function(){
			$("form[name='enroll-form']").submit(function(e) {
	        	var loading = new Loading();
	            var formData = new FormData($(this)[0]);
            
	            $.ajax({
	                url: '<?php echo site_url('home/enroll_user'); ?>',
	                type: "POST",
	                data: formData,
	                dataType: "json",
	                success: function(response) {
	                	loading.out();

	                	if(response.success){
	                		$('#enroll-form').trigger("reset");

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