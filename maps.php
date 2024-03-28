<html>
<head>
	<title>Access Google Maps API in PHP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->
	<script type="text/javascript" src="googlemap.js"></script>
	<style type="text/css">
		.container {
			height: 450px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
		#data, #allData {
			display: none;
		}
	</style>
</head>
<body>
    <div>
        <center><h1>Access Google Maps API in PHP</h1></center>
        <div id="map"></div> 
    </div>
</body>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk59bUcLIv2gG_NbrGUQlY1SdJKb03hU8&callback=loadMap">
</script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap" async defer></script> -->

</html>