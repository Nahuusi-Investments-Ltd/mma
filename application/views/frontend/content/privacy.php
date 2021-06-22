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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_privacy.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>Privacy Policy</h1>
				<p>"at 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<!-- Content ================================================== -->
		<div class="container margin_60_35">
			<div class="col-md-8 col-md-offset-2">
				<div>
					<div class="row">
						<div class="col-md-12">
							
					  		<h2 class="main_title">
								Privacy Policy 
								<span>at 374 MMA</span>
							</h2>
							
							<?php echo $privacy->policy; ?>
						</div>
					</div>
					<!-- Edn row -->

				</div>
			</div>
			<!-- End box_style_2 -->
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
</html>