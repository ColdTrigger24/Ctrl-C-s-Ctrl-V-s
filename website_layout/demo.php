<!DOCTYPE html>
<html>
<head>
    <title>Electric Vehicle Charging Stations</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Electric Vehicle Charging Stations</h1>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk59bUcLIv2gG_NbrGUQlY1SdJKb03hU8&libraries=places&callback=initMap" async defer></script>
    <script>
        var map;
        var service;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 11.0168, lng: 76.9558 },
                zoom: 12
            });

            service = new google.maps.places.PlacesService(map);
            map.addListener('bounds_changed', performSearch);
        }

        function performSearch() {
            var request = {
                bounds: map.getBounds(),
                type: ['charging_station'] // Specify the type of place you want to search
            };

            service.nearbySearch(request, callback);
        }

        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        }

        function createMarker(place) {
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            var infowindow = new google.maps.InfoWindow({
                content: place.name
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }
    </script>
</body>
</html>
