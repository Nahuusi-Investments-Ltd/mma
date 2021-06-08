<section class="promo_full">
	<div class="promo_full_wp">
		<div>
			<h3>What Clients say<span>Hear from 374 MMA family </span></h3>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="carousel_testimonials">
							<?php foreach($testimonials->result() as $key => $value) { ?>
							<?php $testimonial_link = base_url('uploads/testimonials').'/'.$value->link; ?>
							<div>
								<div class="box_overlay">
									<div class="pic">
										<figure><img src="<?php echo $testimonial_link; ?>" alt="Max Brenna" class="img-circle">
										</figure>
										<h4><?php echo $value->name; ?><small><?php echo date('d M Y', strtotime($value->date_created)); ?></small></h4>
									</div>
									<div class="comment text-truncate">
										"<?php echo $value->message; ?>"
									</div>
								</div>
								<!-- End box_overlay -->
							</div>
							<?php } ?>
						</div>
						<!-- End carousel_testimonials -->
					<p><a href="<?php echo site_url('testimonials'); ?>" class="btn_full">View All Testimonials</a> </p>
					</div>
					<!-- End col-md-8 -->
				</div>
				<!-- End row -->
			</div>
			<!-- End container -->
		</div>
		<!-- End promo_full_wp -->
	</div>
	<!-- End promo_full -->
</section>