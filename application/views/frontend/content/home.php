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
		<?php $this->load->view('frontend/partials/slider'); ?>
		
		<div class="container_styled_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-6">
						<h2 class="nomargin_top">
							374 MMA is the Largest <br>Mixed Martial Arts Gym in Halifax
						</h2>
						<p class="lead">
							374 MMA is Halifax’s largest MMA gym. We provide high level training to all levels of experience, helping you surpass your goals and reach new personal victories.
							<br><br>
							<a href="<?php echo site_url('about'); ?>" class="btn_1_outline">Read More</a>
						</p>
					</div>
					<div class="col-md-5 col-md-offset-1 hidden-sm hidden-xs">
						<img src="<?php echo base_url('assets/img/home_whoWeAre.png'); ?>" alt="Who We Are" class="img-responsive">
					</div>
				</div>
				<!-- End row -->
			</div>
		</div>

		<div class="container_styled_2">
			<div class="container">
				<div class="row">
					<h2 class="main_title">
						<em></em>
						Classes Category
					</h2>
					<?php foreach($categories->result() as $key => $value){ ?>
					<?php $category_link = base_url('uploads/category').'/'.$value->link; ?>
					<?php
					$class_name = 'col-md-3';
					if(strlen($value->description) > 200)
						$class_name = 'col-md-6';
					?>
					<div class="<?php echo $class_name; ?>">
					    <div class="thumbnail">
					      	<img src="<?php echo $category_link; ?>" alt="<?php echo $value->title; ?>">
					      	<div class="caption">
					      		<h3><?php echo $value->title; ?></h3>
					        	<p>
					        		<?php echo $value->description; ?>
					        	</p>
					        	<p>
					        		<a href="<?php echo site_url('classes'); ?>" class="btn_outline">Learn More</a>
								</p>
					      	</div>
					    </div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<?php $this->load->view('frontend/partials/train'); ?>
		<?php $this->load->view('frontend/partials/testimonials'); ?>
		<?php $this->load->view('frontend/partials/newsletter'); ?>
		<?php $this->load->view('frontend/partials/footer'); ?>
		<?php $this->load->view('frontend/partials/copyright'); ?>

		<div id="toTop"></div>
		<!-- Back to top button -->

		<?php $this->load->view('frontend/partials/search'); ?>

		<!-- COMMON SCRIPTS -->
		<script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js'); ?>"></script>    
		<script src="<?php echo base_url('assets/js/common_scripts_min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/validate.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/functions.js'); ?>"></script>

		<!-- SPECIFIC SCRIPTS -->
		<script src="<?php echo base_url('assets/js/bootstrap-portfilter.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/layerslider/js/greensock.js'); ?>"></script>
		<script src="<?php echo base_url('assets/layerslider/js/layerslider.transitions.js'); ?>"></script>
		<script src="<?php echo base_url('assets/layerslider/js/layerslider.kreaturamedia.jquery.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/modal-loading.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/sweetalert2.min.js'); ?>"></script>

		<script type="text/javascript">
			'use strict';
			$('#layerslider').layerSlider({
				autoStart: true,
				navButtons: false,
				navStartStop: false,
				showCircleTimer: false,
				responsive: true,
				responsiveUnder: 1400,
				layersContainer: 1170,
				skinsPath: 'assets/layerslider/skins/'
			});

			// newsletter subscription
			$(document).ready(function(){
				$("form[name='newsletter-form']").submit(function(e) {
		        	var loading = new Loading();

		            var formData = new FormData($(this)[0]);
		            
		            $.ajax({
		                url: '<?php echo site_url('subscription'); ?>',
		                type: "POST",
		                data: formData,
		                dataType: "json",
		                success: function(response) {
		                	loading.out();

		                	if(response.success){
		                		$('#newsletter-form').trigger("reset");

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
	</body>
</html>