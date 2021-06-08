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
				<h1>374 MMA Team </h1>
				<!--
				<p>"374 MMA Team"</p>
				-->
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader -->
		
		<div class="container_styled_1">
			<div class="container margin_60">
				<h2 class="main_title">
					<em></em>
					Meet Your 374 MMA Team
					<span>Dedicated to You</span>
				</h2>

				<div class="row">
					<?php foreach($team_members->result() as $key => $value) { ?>
					<?php $member_photo = base_url('uploads/team').'/'.$value->photo; ?>
					<div class="col-sm-6 col-md-4">
					    <div class="thumbnail">
					    	<a href="#">
						      	<img src="<?php echo $member_photo; ?>" alt="Radafy Rad Ranaivo">
						      	<div class="caption">
						        	<h4>
						    			<?php echo $value->name; ?> <span class="label label-danger"><?php echo $value->title; ?></span>
						    		</h4>
						      	</div>
					      	</a>
					    </div>
					</div>
					<?php } ?>
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