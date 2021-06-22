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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_testimonials.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>Testimonials</h1>
				<p>"What Clients Say"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<div class="container_styled_1">
			<div class="container margin_60_35">
				<div class="row">
					<div>
						<?php foreach($testimonies->result() as $testimony) { ?>
	  					<div class="col-sm-<?php echo $testimony->columns; ?>">
	      					<div class="panel panel-default">
	      						<div class="panel-body" itemprop="reviewBody">
	      							<?php if($testimony->testimony_type == 'video') { ?>
	      							<div class="thumbnail">
	        							<div align="center" class="embed-responsive embed-responsive-16by9">    
											<video width="320" height="240" controls>
										        <?php $source = base_url('uploads/testimony').'/'.$testimony->link; ?>
										        <source src="<?php echo $source; ?>" type="video/mp4">
										    </video>
										</div>
	        						</div>
				            		<span itemprop="author" itemscope itemtype="http://schema.org/Person">
						            <small>
						              	<span itemprop="name">
						              		<?php echo $testimony->message; ?>
						              	</span>
		            				</small>
	      							<?php } else if ($testimony->testimony_type == 'photo') { ?>
	      							<div class="thumbnail">
	      								<?php $source = base_url('uploads/testimony').'/'.$testimony->link; ?>
	    								<img src="<?php echo $source; ?>" alt="Hand Written Review">
	    							</div>
				            		<span itemprop="author" itemscope itemtype="http://schema.org/Person">
						            <small>
						              	<span itemprop="name">-- <?php echo $testimony->name; ?></span>
							            </span><!--/author schema -->
			              				<span class="pull-right">
						              	<span class="reviewRating" itemscope itemtype="http://schema.org/Rating">
						                	<meta itemprop="worstRating" content="1">
						                  	<span itemprop="ratingValue"><?php echo $testimony->rating; ?></span> / 
						                	<span itemprop="bestRating"> stars </span>
						              	</span><!--/reviewRating-->
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
		            				</small>
	      							<?php } ?>

	      							<?php if(!empty($testimony->message)) { ?>
	      							<p>
	        							<?php echo $testimony->message; ?>
	        						</p>
				            		<span itemprop="author" itemscope itemtype="http://schema.org/Person">
						            <small>
						              	<span itemprop="name">-- <?php echo $testimony->name; ?> </span>
							            </span><!--/author schema -->
			              				<span class="pull-right">
						              	<span class="reviewRating" itemscope itemtype="http://schema.org/Rating">
						                	<meta itemprop="worstRating" content="1">
						                  	<span itemprop="ratingValue"><?php echo $testimony->rating; ?></span> / 
						                	<span itemprop="bestRating"> stars </span>
						              	</span><!--/reviewRating-->
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
			              				<span class="icon-star" aria-hidden="true"></span>
		            				</small>
	      							<?php } ?>
	      						</div><!--/panel-body-->
	    					</div><!--/panel-->
	  					</div><!--/col-sm-6-->
	  					<?php } ?>
						
	  					<div class="col-sm-12">
							<p>
								<a href="https://www.google.com/search?q=374+mma&rlz=1C1CHBF_enCA800CA800&oq=374+mma&aqs=chrome.0.69i59j0i22i30l2j69i60l2j69i61.1471j0j7&sourceid=chrome&ie=UTF-8#lrd=0x4b5a20ee838a4c31:0xc338612a9fcdb36c,1,,," target="_blank" class="btn_full">View All 374 MMA Google Reviews </a>
							</p>
	  					</div><!--/col-sm-6-->
					</div>
				</div>
				<br><br>
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