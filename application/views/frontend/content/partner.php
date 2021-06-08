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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_partners.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>Our Partners</h1>
				<p>"Know our partners"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader -->
		<div class="container margin_60_35">
			<div class="col-md-8 col-md-offset-2">
				<div>
					<h2 class="main_title"><em></em>Meet Our Partners<span>Like minded & diverse companies</span></h2>
					
					<div class="alert alert-success" role="alert">
						<p>
							We are so thankful that our 374 MMA family is made up of such a diverse group of people. We are happy to partner with like minded and diverse companies that make up our beautiful community. These small businesses make a positive difference in our neighbourhoods.  Thank you for checking out our partners and supporting them.
						</p>
					</div>
					<div class="row">
						<?php foreach($partners->result() as $key => $value) { ?>
						<?php $partner_photo = base_url('uploads/partner').'/'.$value->link; ?>
					  	<div class="col-xs-6 col-md-4">
						    <div class="thumbnail">
						      	<img src="<?php echo $partner_photo; ?>" alt="<?php echo $value->name; ?>">
						      	<div class="caption">
						      		<figcaption class="figure-caption"><?php echo $value->name; ?></figcaption>
						      	</div>
						    </div>
					  	</div>
					  <?php } ?>
					  	<div class="col-xs-6 col-md-4">
						    <div class="thumbnail">
						      	<a href="<?php echo site_url('contact'); ?>" id="view_all"><span><i class="arrow_carrot-right_alt2"></i>Partner With Us</span></a>
						    </div>
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