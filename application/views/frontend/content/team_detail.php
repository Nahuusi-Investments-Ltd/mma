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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('uploads/team'); ?>/<?php echo $member->photo; ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1><?php echo $member->name; ?></h1>
				<p>"<?php echo $member->title; ?>"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader -->
		
		<div class="container_styled_1">
			<div class="container margin_60">
				<aside class="col-md-3" id="sidebar">
				  <div class="theiaStickySidebar">
						<div class="profile">
						<p class="text-center">
							<img src="<?php echo base_url('uploads/team'); ?>/<?php echo $member->photo; ?>" alt="<?php echo $member->name; ?>" class="img-circle styled_2">
						</p>
						<ul class="social_teacher">
							<li><a href="https://www.facebook.com/374mma" target="_blank"><i class="icon-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/374mma" target="_blank"><i class="icon-instagram"></i></a></li>
							<li><a href="https://twitter.com/374mma" target="_blank"><i class="icon-twitter"></i></a></li>
							<li><a href="https://www.youtube.com/channel/UCKePFeRwpi59jfbHyCLc0AA" target="_blank"><i class="icon-youtube"></i></a></li>
						</ul>    
						 <ul>
							 <li>Name <strong class="pull-right"><?php echo $member->name; ?></strong> </li>
							 <li>Email <strong class="pull-right"><a href="mailto:<?php echo $member->email; ?>"><?php echo $member->email; ?></a></strong></li>
							 <li>Telephone  <strong class="pull-right"><a href="tel:<?php echo $member->phone; ?>"><?php echo $member->phone; ?></a></strong></li>
							 <li>Address  <strong class="pull-right">
								<?php echo $member->address; ?>
							 </strong></li>
						</ul>
					  
					</div><!-- End box-sidebar -->
					</div>
				</aside>
				<div class="col-md-9">
					<div class="box_style_6">
						<div class="indent_title_in">
							<i class="icon_document_alt"></i>
							<h3>Biography</h3>
							<p>of <?php echo $member->title; ?></p>
						</div>
						<div class="wrapper_indent">
							<?php echo $member->bio; ?>
						</div><!--wrapper_indent -->
						<hr class="styled_2">
						<div class="indent_title_in">
							<i class="icon_archive_alt"></i>
							<h3>My Classes</h3>
							<p>at 374 MMA</p>
						</div>
						<div class="wrapper_indent">
							<?php echo $member->classes; ?>
						</div><!--wrapper_indent -->
					</div>
				</div>
			</div>
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