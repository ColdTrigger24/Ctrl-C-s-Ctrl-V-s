function loadMap(){
    var coimbatore = {lat: 11.0168, lng: 76.9558};
    var map = new google.maps.Map(document.getElementById('map'),
    {
        zoom: 4, center: coimbatore
    });

    var marker = new google.maps.Marker({
        position:coimbatore,
        map: map
    });
}