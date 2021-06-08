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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('uploads/blog'); ?>/<?php echo $blog->link; ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>374 MMA Blog</h1>
				<p>"<?php echo $blog->title; ?>"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<div class="container_styled_1">
			<div class="container margin_60_35">
			
				<div class="row">

					<div class="col-md-9">
						<div class="post">
							<img src="<?php echo base_url('uploads/blog'); ?>/<?php echo $blog->link; ?>" alt="<?php echo $blog->title; ?>" class="img-responsive">
							<div class="post_info clearfix">
								<div class="post-left">
									<ul>
										<li><i class="icon-calendar-empty"></i><?php echo date('d/m/Y', strtotime($blog->date_created)); ?></li>
									</ul>
								</div>
								<div class="post-right"><i class="icon-eye"></i><?php echo $blog->number_of_views; ?></div>
							</div>
							<h2>Keep On Rowing</h2>
							<p>
								<?php echo $blog->message; ?>
							</p>
						</div>
						<!-- end post -->
					</div>
					<!-- End col-md-9-->

					<?php $this->load->view('frontend/partials/blog_sidebar'); ?>

				</div>
			</div>
			<!-- End container -->
		</div>
		<!-- End container_styled_1 -->

		<?php $this->load->view('frontend/partials/newsletter'); ?>
		<?php $this->load->view('frontend/partials/footer'); ?>
		<?php $this->load->view('frontend/partials/copyright'); ?>

		<div id="toTop"></div>
		<!-- Back to top button -->

		<?php $this->load->view('frontend/partials/search'); ?>
		<?php $this->load->view('frontend/partials/scripts'); ?>
	</body>
</html>