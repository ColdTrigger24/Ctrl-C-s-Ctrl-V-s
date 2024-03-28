var map;
var infowindow;
var service;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 11.0168, lng: 76.9558},
        zoom: 12
    });

    infowindow = new google.maps.InfoWindow();
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

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
}
