		//set up markers 
		var myMarkers = {"markers": [
				{"latitude": "44.657762", "longitude":"-63.633653", "icon": "assets/img/map-marker.png"}
			]
		};
		
		//set up map options
		$("#map_contact").mapmarker({
			zoom	: 14,
			center	: '6430 Lady Hammond Rd, Halifax, NS B3K 2S3 Canada',
			markers	: myMarkers
		});

