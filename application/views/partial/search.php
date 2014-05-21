<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script>
  var map;
  var map_indoor;
  var markers = new Array();
  var marker = null;

  function displayMap(){
    var initialLocation = new google.maps.LatLng(-31.953004,115.857469);
    

    var myOptions = {
        zoom: 15,
        center: initialLocation,
        mapTypeControl: true,
        panControl: true,
        zoomControl: true,
        scaleControl: true,
        streetViewControl: true,
        overviewMapControl: true,
      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById("testmaps"), myOptions);

      // Try HTML5 Geolocation (Preferred)

    if(navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
          initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
          map.setCenter(initialLocation);
          //  addMarker(initialLocation);
          drawCircle(initialLocation, 100);
          
      }, function() { handleNoGeolocation(true);
      });
    }
    else { // Browser doesn't support Geolocation
      handleNoGeolocation(false);
    }

    function clearOverlays() {
    for(var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
  }                                                                                                    

  function drawCircle(location, rad) { 
      markers.push(new google.maps.Circle({
          center: location,
          //icon: '../person.png',
          radius: parseInt(rad),
          //strokeColor: "#76EE00",
          strokeOpacity: 0.7,
          strokeWeight: 2,
          //fillColor: "#76EE00",
          fillColor: getRandomColor(),
          fillOpacity: 0.35,
          map: map
      }));
      
  }

    function handleNoGeolocation(errorFlag) {
      if (errorFlag == true) {
          //alert("Geolocation service failed. We've placed you in Perth.");
          initialLocation = new google.maps.LatLng(-31.953004,115.857469);;
      } else {
          alert("Your browser doesn't support geolocation. We've placed you in Perth.");
          initialLocation = new google.maps.LatLng(-31.953004,115.857469);;
      }
      map.setCenter(initialLocation);
    }

    google.maps.event.addListener(map, 'rightclick', function(event) {
      //TODO REMOVE THIS WHEN WE IMPLEMENT MULTIPLE GEONODES PER GEOFENCE
      //clearOverlays();
      var latLng = event.latLng;
      var rad = 100;

      drawCircle(latLng, rad);
    });

    function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
//#FF0000 CHINESE
////#33CC33 KOREAN
//AUSSIE #0000FF
  var index =0;

  document.getElementById('search_korean').addEventListener('click', function(event) {
    $.ajax({
      type:"GET", url:"search/load", data:{},
      success: function(response) {
        console.log(response);
        for(index = 0; index < response.length; index++) {
          var location = new google.maps.LatLng(response[index]['latitude'], response[index]['longitude']);
          drawCircle(location, 100);
        }
      }
    });
  });
}
  </script>
  

 
<div class="row">
  <div class="col-md-3">
    <p class="lead">Languages</p>
    <div class="list-group">
      <a href="#" id="search_korean" name="search_korean" class="list-group-item">Korean</a>
      <a href="#" class="list-group-item">English</a>
      <a href="#" class="list-group-item">Chinese</a>
    </div>
  </div>
  <div class="col-md-9">
  	<div class="row">
  		<div class="col-sm-1 col-lg-1 col-md-1"></div>
  		<div class="col-sm-10 col-lg-10 col-md-10">
  			<div id="testmaps" class="google-maps" style="height:400px">
          <iframe src="" onload="displayMap()"></iframe>
  				
  			</div>
  		</div>
  		<div class="col-sm-1 col-lg-1 col-md-1"></div>
  	</div>
    <div class="row">
      <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
          <img src="http://placehold.it/320x150" alt="">
          <div class="caption">
            <h4 class="pull-right">$24.99</h4>
            <h4><a href="#">First Product</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
          </div>
          <div class="ratings">
            <p class="pull-right">15 reviews</p>
            <p>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
          <img src="http://placehold.it/320x150" alt="">
          <div class="caption">
            <h4 class="pull-right">$64.99</h4>
            <h4>
              <a href="#">Second Product</a>
            </h4>
            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="ratings">
            <p class="pull-right">12 reviews</p>
            <p>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
          <img src="http://placehold.it/320x150" alt="">
          <div class="caption">
            <h4 class="pull-right">$74.99</h4>
            <h4><a href="#">Third Product</a>
            </h4>
            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="ratings">
            <p class="pull-right">31 reviews</p>
            <p>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
          <img src="http://placehold.it/320x150" alt="">
          <div class="caption">
            <h4 class="pull-right">$84.99</h4>
            <h4><a href="#">Fourth Product</a>
            </h4>
            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="ratings">
            <p class="pull-right">6 reviews</p>
            <p>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
          <img src="http://placehold.it/320x150" alt="">
          <div class="caption">
            <h4 class="pull-right">$94.99</h4>
            <h4><a href="#">Fifth Product</a>
            </h4>
            <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="ratings">
            <p class="pull-right">18 reviews</p>
            <p>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>