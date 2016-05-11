<?php
/*
Title: Datos de la ubicación
Post Type: ubicaciones
Context: normal
Priority: high
Order: 1
Locked: true
New: true
Collapse: false
Meta box: true
*/

piklist('field', array(
'type' => 'text',
'scope' => 'post_meta',
'field' => 'url',
'label' => 'Enlace'
));


piklist('field', array(
'type' => 'text'
,'scope' => 'post_meta' // Not used for settings sections
,'field' => 'address'
,'label' => 'Dirección'
,'description' => 'Dirección de la ubicación'
,'attributes' => array(
  'class' => 'text'
)
));

//mapa de google para las coordenadas
piklist('field',array(
    'type'=>'html',
    'label' => 'Mapa',
    'value' => '<div id="project_map" style="height:300px;"></div>',

));

piklist('field',array(
    'type'=>'hidden',
    'field'=>'coords'
));

piklist('field',array(
    'type'=>'text',
    'field'=>'pac-input'
));
?>
<style>
	.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#_post_meta_pac-input_0 {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
  margin-top: 11px;
}

#_post_meta_pac-input_0:focus {
  border-color: #4d90fe;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&callback=initialize" async defer></script>
<script>


    var map;
    var marker
    var latLangField = jQuery('#_post_meta_coords_0');
    var zoom = 15;
    var latLang = latLangField.val();    
    if(latLang == '') {
        latLang = "54.470636, 18.469391";
        zoom = 12;
    } 
    latLang = latLang.split(',');
    
    
    function initialize() {
        
        
        var mapOptions = {
            zoom:zoom,
            center: new google.maps.LatLng(latLang[0],latLang[1])
        }
        map = new google.maps.Map(document.getElementById('project_map'),mapOptions);

        // Create the search box and link it to the UI element.
		  var input = document.getElementById('_post_meta_pac-input_0');
		  var searchBox = new google.maps.places.SearchBox(input);
		  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		  // Bias the SearchBox results towards current map's viewport.
		  map.addListener('bounds_changed', function() {
		    searchBox.setBounds(map.getBounds());
		  });

		  marker = new google.maps.Marker({
            draggable: true,
            position: new google.maps.LatLng(latLang[0],latLang[1]), 
            map: map,
            title: "Your location"
        });

		  var markers = [];
  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      /*var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };*/

      // Create a marker for each place.
      /*markers.push(new google.maps.Marker({
        map: map,
        //icon: icon,
        title: place.name,
        position: place.geometry.location
      }));*/
       var marker = new google.maps.Marker({
        draggable: true,
        map: map,
        //icon: icon,
        title: place.name,
        position: place.geometry.location
      });

      // drag response
      google.maps.event.addListener(marker, 'dragend', function(e) {
        //displayPosition(this.getPosition());
         var lat = this.getPosition().lat();
        var lang = this.getPosition().lng();
        latLangField.val(lat+','+lang);
      });

      /*google.maps.event.addListener(markers, 'dragend', function (event) {
            var lat = this.getPosition().lat();
            var lang = this.getPosition().lng();
            latLangField.val(lat+','+lang);
        });*/

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);

        
        /*google.maps.event.addListener(marker, 'dragend', function (event) {
            var lat = this.getPosition().lat();
            var lang = this.getPosition().lng();
            latLangField.val(lat+','+lang);
        });*/
  });
        
        
        
    }
    //google.maps.event.addDomListener(window, 'load', initialize);
    
    
</script>