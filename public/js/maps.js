$(document).ready(function () {
    var myLatLng = {lat: 49.070002, lng:  27.677954};

        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 16
        });

         var marker = new google.maps.Marker({
             position: myLatLng,
             map: map,
            title: 'Hotel Perlina'
          });
});