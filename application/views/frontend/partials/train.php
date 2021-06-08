<section class="margin_60_35" id="whytrainat374mma">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3 style="color:black">Why Train at 374 MMA?</h3>
				
				<div class="panel-group" id="accordion">
					
					<?php foreach($training_reasons->result() as $key => $value) { ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							<?php echo $value->title; ?>
						<i class="indicator icon_plus_alt2 pull-right"></i></a>
					  </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<?php echo $value->description; ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6">
				<img src="<?php echo base_url('assets/img/whyTrainat374MMA.png'); ?>" width="600" height="360" alt="Why Train at 374 MMA?" class="img-responsive">
			</div>
		</div>
		</div>
		<!--  End row -->
	</div>
	<!--  End container-->
</section>
<!--  End section-->