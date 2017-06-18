<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Using MySQL and PHP with Google Maps</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
      	height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
      	height: 100%;
      	margin: 0;
      	padding: 0;
      }
  </style>
</head>
<body>
	<div id="map"></div>
	<h1>Ket Qua</h1>

	<p>Kinh Do: {{$kinhDo}}</p>
	<p>Vi Do: {{$viDo}}</p>
	<p>Dia Chi: {{$diaChi}}</p>

	<script>

    	function initMap() {

    		// Tao mot mang cac vi tri de tinh toan.
    		// Day se la mang cac cong ty o trong database.
  
		    var locations = [
		        ['Vinh, Nghe An, Vietnam ', 18.679585, 105.681335],
		        ['Ha Noi - Hoan Kiem', 21.027763, 105.834160],
		        ['Ha Long', 20.959902, 107.042542],
		        ['Da Nang', 16.047079, 108.206230],
		        ['Ha Noi', 21.028511, 105.804817],
		        ['Can Tho', 10.045162, 105.746857],
		        ['Hue', 16.461109, 107.570183],
		        ['Bien Hoa', 10.964112, 106.856461],
		        ['Cao Bang', 22.679281, 106.260452],
		        ['Canh Nang', 20.351387, 105.221214]
		    ];

		    // Khoi tao Map
	        var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 5,
	          center: new google.maps.LatLng(16.047079, 108.206230), // Map Default khi khoi tao
	          mapTypeId: google.maps.MapTypeId.ROADMAP
	        });

	        // Tao bien Marker de danh dau cac vi tri tren map
	        var marker;

	        // Tao object myLcations de lay duoc LatLng cua dia diem hien tai.
	        var myLocations = new google.maps.LatLng({{$viDo}}, {{$kinhDo}});

	        // Tao object otherLocations de xac dinh LatLng cua cac dia diem khac trong mang locations.
	        var otherLocations;

	        // Bien dung de tinh khoan cach dung de ting duoc khoan cach cua myLocations va otherLocations
	        var distance;

	        // Ban kinh mong muon. Tinh theo don vi la met
	        var radius = 1000000;

	        // Lap cac dia diem trong mang Locations
	        for (var i = 0; i < locations.length; i++) {
	        	// Xac dinh LatLng de bo vao object otherLocations
	          	otherLocations = new google.maps.LatLng(locations[i][1], locations[i][2]);

	          	//Tinh khoan cach giua myLocations va otherLocations
	          	distance = google.maps.geometry.spherical.computeDistanceBetween(myLocations,otherLocations);

	          	// Neu khoan cach giua cac dia diem < ban kinh mong muon
	          	if (distance < radius) {

	          		// Xuat ra cac marker de danh dau tren map.
		            marker = new google.maps.Marker({
		              position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		              map: map
	            	});
	          	}	

	        }
    	}

    </script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSWHunjUr5eE8TggMW2yUqqtCJcuCVsjE&callback=initMap&libraries=geometry">
  </script>
</body>
</html>