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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_classes.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>374 MMA Classes</h1>
				<p>"Classes We Offer at 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->


		<div class="container_styled_1">
			<div class="container margin_60_35">
				<div id="filter_buttons">
					<button data-toggle="portfilter" class="active" data-target="all">All</button>
					<button data-toggle="portfilter" data-target="AdultClasses">Adult</button>
					<button data-toggle="portfilter" data-target="YouthClasses">Youth</button>
					<button data-toggle="portfilter" data-target="KidsClasses">Kids</button>
					<button data-toggle="portfilter" data-target="Others">Others</button>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="lead alert alert-success" role="alert">
							<p>
								<b>Private training sessions</b> are scheduled thoughout the day. 
								<a href="<?php echo site_url('contact'); ?>" class="tooltip-1" data-placement="top" title="Contact 374 MMA" data-original-title="Contact 374 MMA">Contact Us</a> for more information.
							</p>
						</div>
				</div>
				</div>
				<div class="row">
					<?php foreach($classes->result() as $key => $value) { ?>
					<?php $class_photo = base_url('uploads/class').'/'.$value->link; ?>
					<div class="col-md-6" data-tag="<?php echo $value->tag; ?>">
						<div class="thumbnail course_container">
					      	<img src="<?php echo $class_photo; ?>" alt="<?php echo $value->title; ?>">
					      	<div class="caption">
					      		<h2 class="main_title"><em></em><?php echo $value->title; ?><span><?php echo $value->sub_title; ?></span></h2>
					        	<p>
					        		<?php echo $value->content; ?>
					        	</p>
					      	</div>
						</div>
						<!-- End box course_container -->
					</div>
					<?php } ?>
				</div>
				<!-- End row -->
			</div>
			<!-- End container -->
		</div>

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