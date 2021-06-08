<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $title; ?></title>
		
<header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-2">
				<a href="<?php echo site_url(); ?>" id="logo">
					<img src="<?php echo base_url('assets/img/logo.png'); ?>" width="95" height="27" alt="374 MMA Logo" data-retina="true" class="logo_normal">
					<img src="<?php echo base_url('assets/img/logo_sticky.png'); ?>" width="95" height="27" alt="374 MMA Logo" data-retina="true" class="logo_sticky">
				</a>
			</div>
			<nav class="col-xs-10">
				<ul id="access_top">
					<li><a href="#" class="search-overlay-menu-btn"><i class="icon-search-6"></i></a></li>
					<li><a href="<?php echo site_url('enroll'); ?>" class="hidden-xs">ENROLL TODAY</a></li>
				</ul>
				<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
				<div class="main-menu">
					<div id="header_menu">
						<img src="<?php echo base_url('assets/img/logo.png'); ?>" width="95" height="27" alt="374 MMA" data-retina="true">
					</div>
					<a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
					<ul>
						<li><a href="<?php echo site_url(); ?>">HOME</a></li>

						<li><a href="#374MMA">ABOUT<i class="icon-down-open-mini"></i></a>
							<ul>
								<li><a href="<?php echo site_url('about'); ?>">About 374 MMA</a></li>
								<li><a href="<?php echo site_url('team'); ?>">374 MMA Team</a></li>
								<li><a href="<?php echo site_url('partners'); ?>">374 MMA Partners</a></li>
							</ul>
						</li>
						
						<li><a href="<?php echo site_url('classes'); ?>">CLASSES</a></li>
						
						<li><a href="<?php echo site_url('schedule'); ?>">SCHEDULE</a></li>
						
						<li><a href="<?php echo site_url('faq'); ?>">FAQ</a></li>

						<li><a href="#374MMA">MEDIA<i class="icon-down-open-mini"></i></a>
							<ul>
								<li><a href="<?php echo site_url('photos'); ?>">Photo Gallery</a></li>
								<li><a href="<?php echo site_url('videos'); ?>">374 MMA Videos</a></li>
								<li><a href="<?php echo site_url('blog'); ?>">374 MMA Blog</a></li>
							</ul>
						</li>
						
						<li><a href="<?php echo site_url('testimonials'); ?>">TESTIMONIALS</a></li> 
						
						<li><a href="<?php echo site_url('contact'); ?>">CONTACT US</a></li>
						
						<li><a href="<?php echo site_url('enroll'); ?>" class="visible-xs">ENROLL TODAY</a></li>
					</ul>
				</div>
				<!-- End main-menu -->
			</nav>
		</div>
		<!-- End row -->
	</div>
	<!-- End container -->
</header>