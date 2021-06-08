 $(window).load(function() {
                new $.popup({                
                    title       : '',
                    content         : '<a href="classes"><img src="assets/img/popup_img.jpg" alt="374 MMA" class="pop_img"><h3 id="pop_msg">Private Training Session are <strong>Scheduled</strong> Throughout the week!</h3></a><small>Autoclose delay in 10 seconds.</small>', 
					html: true,
					autoclose   : true,
					closeOverlay:true,
					closeEsc: true,
					buttons     : false,
                    timeout     : 10000 
                });
            });