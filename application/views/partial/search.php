<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
var map;
var users = [];
var markers = [];

function initialize() {
	var mapOptions = {
		zoom: 15
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	// users = new Array();

	var curpos;

	// Try HTML5 geolocation
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			curpos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			// var infowindow = new google.maps.InfoWindow({
			// 	map: map,
			// 	position: pos,
			// 	content: 'Location found using HTML5.'
			// });
			map.setCenter(curpos);
		}, function() {
			handleNoGeolocation(true);
		});
	} else {
		// Browser doesn't support Geolocation
		handleNoGeolocation(false);
	}

	$.ajax({
		type:"GET", url:"search/load", data:{},
		success: function(response) {
			for (i in response) {
				var user = response[i];
				console.log(user);
				addMarker( new google.maps.LatLng(user.latitude, user.longitude) );
				users.push(user);
				// console.log("users - ", users);
			}
		}
	});
}
// For exception
function handleNoGeolocation(errorFlag) {
	if (errorFlag) {
		var content = 'Error: The Geolocation service failed.';
	} else {
		var content = 'Error: Your browser doesn\'t support geolocation.';
	}
	var options = {
		map: map,
		position: new google.maps.LatLng(60, 105),
		content: content
	};
	var infowindow = new google.maps.InfoWindow(options);
	map.setCenter(options.position);
}

// Add a marker to the map and push to the array.
function addMarker(location) {
	var marker = new google.maps.Marker({
		position: location,
		map: map,
		animation: google.maps.Animation.DROP
	});
	markers.push(marker);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
	for (i in markers) {
		markers[i].setMap(null);
	}
	markers = [];
}

google.maps.event.addDomListener(window, 'load', initialize);

$(document)
.on("click", ".lang-options .btn", function(e) {
	e.preventDefault();
	deleteMarkers();
	// var selected = ;
	var lang = new RegExp($(this).find('input').attr('id'), 'g');
	for (i in users) {
		var u = users[i];
		if (u.native.match(lang)) {
			addMarker( new google.maps.LatLng(u.latitude, u.longitude) );
		}
	}
	var classname = "u" + $(this).find('input').attr('id');
	$('.short-cool').each(function() {
		if (!$(this).hasClass(classname)) {
			if (classname != "u.*") {
				$(this).css("display","none");
			} else {
				$(this).css("display","inline-block");
			}
		} else {
			$(this).css("display","inline-block");
		}
	});
	// $(classname).css("display","none");
});
</script>

<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-sm-1 col-lg-1 col-md-1"></div>
			<div class="col-sm-10 col-lg-10 col-md-10">
				<div id="map-canvas" style="height:300px;"></div>
			</div>
			<div class="col-sm-1 col-lg-1 col-md-1"></div>
		</div>
	  	<div class="row">
		  	<div class="col-md-12 align-center" style="margin:20px 0 30px 0;">
		  		<div class="btn-group lang-options" data-toggle="buttons">
		  			<label class="btn btn-default active">
		  				<input type="radio" name="options" id=".*"> ALL
		  			</label>
		  			<label class="btn btn-default">
		  				<input type="radio" name="options" id="Korean"> KR
		  			</label>
		  			<label class="btn btn-default">
		  				<input type="radio" name="options" id="English"> US
		  			</label>
		  			<label class="btn btn-default">
		  				<input type="radio" name="options" id="Chinese"> CN
		  			</label>
		  			<label class="btn btn-default">
		  				<input type="radio" name="options" id="Spanish"> ES
		  			</label>
		  		</div>
		  	</div>
		</div>
	    <div class="row short-wrapper">
	      	<?php if (count($users) > 0): foreach($users as $user): ?>
	      	<div class="col-sm-4 col-lg-4 col-md-4 short-cool u<?php echo $user->native; ?>">
	      		<div id="user<?php echo $user->id; ?>" class="item-short">
	          		<div class="short-left align-center">
	              		<img src="<?php echo $user->profile; ?>" alt="" />
	              		<p class="short-name">
		          			<?php echo $user->firstname.' '.$user->lastname; ?>
		          		</p>
	              		<p class="short-stars">
	              			<?php
	              				for ($i=0; $i<$user->rating; $i++) {
	              					echo '<span class="glyphicon glyphicon-star"></span>';
	              				}
	              				for ($i=5; $i>$user->rating; $i--) {
	              					echo '<span class="glyphicon glyphicon-star-empty"></span>';
	              				}
							?>
	            		</p>
	          		</div>
		          	<div class="short-right">
		          		<div class="short-stats">
		          			<table class="table short-table">
						      	<tbody>
						      		<tr>
						      			<th class="top">Native</th>
						      			<td class="top"><?php echo $user->native; ?></td>
						      		</tr>
						        	<tr>
						        		<th>To learn</th>
						          		<td><?php echo $user->learn; ?></td>
						        	</tr>
						        	<tr>
						        		<th>Interests</th>
						        		<td><?php echo $user->interest; ?></td>
						        	</tr>
						        	<tr>
						        		<td colspan="2" style="text-align:right;">
						        			<a class="short-more" href="/search/more/<?php echo $user->id; ?>">more info &gt;</a>
						        		</td>
						        	</tr>
						        </tbody>
						    </table>
		          		</div>
		          	</div>
		        </div>
	     	</div>
			<?php endforeach; endif; ?>
		</div>
	</div>
</div>