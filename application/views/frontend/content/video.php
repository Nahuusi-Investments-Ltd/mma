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
				<h1>374 MMA Videos</h1>
				<p>"Videos from 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<div class="container_styled_1">
			<div class="container margin_60_35">

				<div class="row">
					<?php foreach($media->result() as $media) { ?>
				  	<div class="col-md-4">
					    <div class="thumbnail">
					      	<iframe width="560" height="315" src="<?php echo $media->link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
					      	</iframe>
					      	<div class="caption">
					        	<p>
					        		<?php echo $media->title; ?>
					        	</p>
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