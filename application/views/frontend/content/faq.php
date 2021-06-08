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

		<!-- SubHeader -->
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_faq.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>374 MMA Faq</h1>
				<p>"Frequently Asked Questions at 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<!-- Content ================================================== -->
		<div class="container_styled_1">
			<div class="container margin_60_35">
				<div class="col-md-8 col-md-offset-2"><div>
				<div class="row">
					<div class="col-md-12">
						<h3>Most frequent questions and answers at 374 MMA</h3>
						<div class="panel-group" id="accordion">
							<?php foreach($faqs->result() as $key => $value) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $key; ?>">
											<?php echo $value->title; ?>
											<i class="indicator icon_minus_alt2 pull-right"></i>
										</a>
							  		</h4>
								</div>
								<div id="collapseOne<?php echo $key; ?>" class="panel-collapse collapse <?php echo $key == 0 ? 'in' : ''; ?>">
									<div class="panel-body">
										<?php echo $value->message; ?>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>

					</div>
				</div>
				<!-- Edn row -->

				</div>
			</div>
			<!-- End container -->
		</div>

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