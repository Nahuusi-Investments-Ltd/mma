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
				<h1>374 MMA Schedule</h1>
				<!--
				<p>"Schedule we operate on at 374 MMA"</p>
				-->
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<!-- Content ================================================== -->
		<div class="container margin_60_35">

			<div class="row">
				<div class="thumbnail col-md-12">
					<img src="<?php echo base_url('assets/img/374MMA_Schedule.png'); ?>" alt="374 MMA Schedule" class="img-responsive">
				</div>
			</div>
		</div>
		<!-- End container -->

		<?php $this->load->view('frontend/partials/train'); ?>
		<?php $this->load->view('frontend/partials/testimonials'); ?>
		<?php $this->load->view('frontend/partials/newsletter'); ?>
		<?php $this->load->view('frontend/partials/footer'); ?>
		<?php $this->load->view('frontend/partials/copyright'); ?>
		<!-- End copy -->

		<div id="toTop"></div>
		<!-- Back to top button -->

		<?php $this->load->view('frontend/partials/search'); ?>
		<?php $this->load->view('frontend/partials/scripts'); ?>
	</body>
</html>