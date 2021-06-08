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
		<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?php echo base_url('assets/img/sub_header_privacy.jpg'); ?>" data-natural-width="1400" data-natural-height="470">
			<div id="sub_content_in">
				<h1>374 MMA Standards</h1>
				<p>"at 374 MMA"</p>
			</div>
		</section>
		<!-- End section -->
		<!-- End SubHeader ============================================ -->

		<!-- Content ================================================== -->

		<div class="container_styled_1">
			<div class="container margin_60_35">
				<div class="row">

						<div class="col-md-12">
							
					  		<h2 class="main_title">
								Overview
								<span>of 374 MMA Standards</span>
							</h2>
							<div class="lead alert alert-success" role="alert">
								<p> 
									As you are all aware that 374 MMA new health and safety standards will be updated regularly, it is important to recognize that public health information and provincial orders can change quickly. 
									<br>
									We at 374 MMA, will do everything we can to update our standards and website as quickly as possible in response to the changes.
								</p>
							</div>

							<!--  Tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#safetyCleaningPractices" data-toggle="tab" aria-expanded="false">Safety & Cleaning Practices</a></li>
								<li class=""><a href="#maskStatus" data-toggle="tab" aria-expanded="true">Mask Status</a></li>
								<li class=""><a href="#bookingCapacity" data-toggle="tab" aria-expanded="false">Booking & Capacity</a></li>
								<li class=""><a href="#membershipUpdates" data-toggle="tab" aria-expanded="false">Membership Updates</a></li>
								<li class=""><a href="#amenitiesEquipment" data-toggle="tab" aria-expanded="false">Amenities & Equipment</a></li>
								<li class=""><a href="#classesTraining" data-toggle="tab" aria-expanded="false">Classes & Training</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane active" id="safetyCleaningPractices">
									All mats are cleaned and sanitized between all classes with disinfectant used to destroy germs and viruses including Listeria, e. coli, Pseudomonas, Staphylococcus (MRSA, VISA), salmonella, VRE, C. diff (vegetative form) and harmful bacteria. Virucidal: kills HIV-1, HBV, HCV; Influenza A, herpes simplex types 1 and 2, Avian Influenza A, human corona and SARSassociated corona virus and pathogenic fungi.
									<br><br>
									The same disinfectant is used to clean bathroom facilities including door handles.
									<br><br>
									All MMA equipment and weight room equipment are cleaned and sanitized after every use with the same cleaner described above.
									<br><br>
									All members are required to purchase and use their own training equipment ie. boxing gloves, hand wraps, shin guards, MMA gloves, Jiu Jitsu gis. All personal equipment is to be cleaned and sanitized after each use.
									<br><br>
									Hand sanitizer is provided for all members to use.
									<br><br>
									Temperatures are taken at the door, using and touchless thermometer	before members are permitted to train.
									<br><br>
									No one is permitted within the gym if they display any symptoms of illness, including but not limited to; runny nose, congestion, cough, fever, sore throat, conjunctivitis, diarrhea, and type of rash. 374 MMA has the right to refuse anyone entry if illness is suspected.
								</div>
								<div class="tab-pane active" id="maskStatus">
									Content to be updated ...
								</div>
								<div class="tab-pane" id="bookingCapacity">
									Content to be updated ...
								</div>
								<div class="tab-pane" id="membershipUpdates">
									Content to be updated ...
								</div>
								<div class="tab-pane" id="amenitiesEquipment">
									Content to be updated ...
								</div>
								<div class="tab-pane" id="classesTraining">
									Content to be updated ...
								</div>
							</div>
							<br>
							<br>

						</div>


					</div>
					<!-- Edn row -->

			</div>
			<!-- End box_style_2 -->
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