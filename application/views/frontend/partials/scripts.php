<!-- COMMON SCRIPTS -->
<script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/common_scripts_min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/validate.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/functions.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<!-- GOOGLE map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWEyNzk8ze3TGjyVWsdhzjnB_H1PtzVF4&libraries=places,geometry&signed_in=true&v=3.exp"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mapmarker.jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mapmarker_func.jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/modal-loading.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert2.min.js'); ?>"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="<?php echo base_url('assets/js/bootstrap-portfilter.min.js'); ?>"></script>
<!--<script src="<?php echo base_url('assets/js/video_header.js'); ?>"></script>-->
<script>
	/*HeaderVideo.init({
		container: $('.header-video'),
		header: $('.header-video--media'),
		videoTrigger: $("#video-trigger"),
		autoPlayVideo: true
	});*/
</script>

<!-- SPECIFIC SCRIPTS -->
<script>
	'use strict';
	$(".team-carousel").owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		autoplay: false,
		smartSpeed: 300,
		responsiveClass: false,
		responsive: {
			320: {
				items: 1,
			},
			768: {
				items: 2,
			},
			1000: {
				items: 3,
			}
		}
	});

	// newsletter subscription
	$(document).ready(function(){
		$("form[name='newsletter-form']").submit(function(e) {
        	var loading = new Loading();

            var formData = new FormData($(this)[0]);
            
            $.ajax({
                url: '<?php echo site_url('subscription'); ?>',
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                	loading.out();

                	if(response.success){
                		$('#newsletter-form').trigger("reset");

                		Swal.fire({
			                text: response.message,
			                icon: "success",
			                buttonsStyling: false,
			                confirmButtonText: "OK",
	                        customClass: {
	    						confirmButton: "btn font-weight-bold btn-light-primary"
	    					}
			            });
                	}
                	else{
                		Swal.fire({
			                text: response.message,
			                icon: "error",
			                buttonsStyling: false,
			                confirmButtonText: "OK",
	                        customClass: {
	    						confirmButton: "btn font-weight-bold btn-light-primary"
	    					}
			            });
                	}
                },
                error: function(xhr, status, error) {
                    var json = $.parseJSON(xhr.responseText);

                    Swal.fire({
		                text: json.message,
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "OK",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            });
                },
                cache: false,
                contentType: false,
                processData: false
            });

            e.preventDefault();
        });
	});
</script>

<!--<script type="text/javascript" src="<?php echo base_url('assets/js/pop_up.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/pop_up_func.js'); ?>"></script>-->