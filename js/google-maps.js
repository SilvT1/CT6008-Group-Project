/**NOT CURRENTLY WORKING...*/
      function initMap() {
        var uluru = {lat: 51.535720, lng: -0.105897};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
       var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }