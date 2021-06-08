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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_about.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>About 374 MMA</h1>
				<p>"Learn About 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader -->

		<div class="container_styled_1">
			<div class="container margin_60">
				
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
							<h2 class="main_title">
								<em></em>
								Introduction
							</h2>

					  		<p class="lead">
						  		<br>
								<a href="<?php echo site_url('contact'); ?>" class="tooltip-1" data-placement="top" title="Located at: 6430 Lady Hammond Rd, Halifax, NS B3K 2S3, Canada" data-original-title="Located at: 6430 Lady Hammond Rd, Halifax, NS B3K 2S3, Canada"> 374 MMA</a> started small with a big vision. Owner and Head Coach,<a href="#" class="tooltip-1" data-placement="top" title="Owner and Head Coach, Radafy Ranaivo (Rad" data-original-title="Owner and Head Coach, Radafy Ranaivo (Rad)"> Radafy Ranaivo (Rad)</a> took his passion for Mixed Martial Arts and created programs and training regimes for all skill levels. He believes mixed martial arts training is beneficial, not only physically, but also for our mental health, confidence and discipline. 
								<br><br>
								With over 4,500 square feet of training space, multiple classes in a variety of levels and a clientele that feels like family, we are proud to say <a href="#" class="tooltip-1" data-placement="top" title="Owner and Head Coach, Radafy Ranaivo (Rad)" data-original-title="Owner and Head Coach, Radafy Ranaivo (Rad)"> Rad</a>’s “big vision” is now an achievement.
								<br><br>
								We are committed to providing superior training in <a href="<?php echo site_url('classes'); ?>" class="tooltip-1" data-placement="top" title="View All 374 MMA classes on CLASSES page" data-original-title="View All 374 MMA classes on CLASSES page">Self Defense Jiu Jitsu, Muay Thai, Boxing, Competition Classes and Wrestling.</a> Along with <a href="<?php echo site_url('classes'); ?>" class="tooltip-1" data-placement="top" title="View All 374 MMA classes on CLASSES page" data-original-title="View All 374 MMA classes on CLASSES page">Conditioning and Body Weight</a> classes, you will not only achieve your goals but also eclipse them.
							</p>
				  		</div>
				  	</div>
				</div>

			</div>
		</div>
		<!-- End container -->

		<?php $this->load->view('frontend/partials/train'); ?>
		<?php $this->load->view('frontend/partials/testimonials'); ?>
		<?php $this->load->view('frontend/partials/newsletter'); ?>
		<?php $this->load->view('frontend/partials/footer'); ?>
		<?php $this->load->view('frontend/partials/copyright'); ?>

		<div id="toTop"></div>
		<!-- Back to top button -->

		<?php $this->load->view('frontend/partials/search'); ?>
		<?php $this->load->view('frontend/partials/scripts'); ?>
	</body>
</html>