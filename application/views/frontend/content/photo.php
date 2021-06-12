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
				<h1>374 MMA Photos</h1>
				<p>"Photos from 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<div class="container_styled_1">
			<div class="container margin_60_35">

				<div class="row">
					<?php foreach($media->result() as $media) { ?>
				  	<?php $photo_url = base_url('uploads/photo').'/'.$media->link; ?>
					<div class="col-sm-6 col-md-4">
					    <div class="thumbnail">
					      	<img src="<?php echo $photo_url; ?>" alt="<?php echo $media->title; ?>">
					      	<div class="caption">
					        	<h4>
					    			<?php echo $media->title; ?>
					    		</h4>
					      	</div>
					    </div>
					</div>
				  	</div>
				  	<?php } ?>
				</div>
			</div>
		</div>
		<!-- End container -->

		<?php $this->load->view('frontend/partials/train'); ?>
		<?php $this->load->view('frontend/partials/newsletter'); ?>
		<?php $this->load->view('frontend/partials/footer'); ?>
		<?php $this->load->view('frontend/partials/copyright'); ?>

		<div id="toTop"></div>
		<!-- Back to top button -->

		<?php $this->load->view('frontend/partials/search'); ?>
		<?php $this->load->view('frontend/partials/scripts'); ?>
	</body>
</html>