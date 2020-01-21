<html>
	<head>
		<meta charset="utf-8">
		<title>Add User</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	
		<div id="wrapper">
			<div id="user">
				<div id="text">
					<p id="userset">User Details</p>
				</div>
				<form id="myForm" action="all_users.php" method="post" onsubmit="return DisplayFormValues()">
					<span class="errInfo"></span>
					<input type="text" name="user[fname]" id="fname" placeholder="First Name">
					<div id="cistac2">
						<span class="errInfo"></span>
						<input type="text" name="user[lname]" id="lname" placeholder="Last Name">
					</div>
					<div id="citac">
						<span class="errInfo"></span>
						<input type="text" name="user[street_number]" id="street" placeholder="Street / Number">
						<span class="errInfo"></span>
						<input type="text" name="user[city]" id="city" placeholder="City">
						<span class="errInfo"></span>
						<input type="text" name="user[country]" id="country" placeholder="Country">
						<span class="errInfo"></span>
						<input type="submit" name="submit" id="add-user" value="Add User">
					</div>
				</form>
			</div><!-- user end -->
			<div id="map">
			</div><!-- mapa end -->
			<script>
			
				function DisplayFormValues(){
					var elem = document.getElementById('myForm').elements;

					for(var i = 0; i < elem.length; i++) {
						if (elem[i].value === '' || elem[i].value === null){
							var fillingSpan = document.getElementsByTagName("span")[i].innerHTML = 'Please enter ' + elem[i].placeholder;
							var inputClass = document.getElementsByTagName("input")[i].classList.add("errors")
						}
						
						
					} 
					return false;
					
				}
				
				// calls Google maps api and constructs a default map view
				function initMap() {
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 9,
						center: {lat: 48.12567, lng: 4.1304868}
					});
					
					// calls Google maps api and constructs the map based on the parameters entered by the user
					var geocoder = new google.maps.Geocoder();

					document.getElementById('country').addEventListener('blur', function() {
						geocodeAddress(geocoder, map);
					});
				}

				function geocodeAddress(geocoder, resultsMap) {
					var address = document.getElementById('street').value + ', ' + document.getElementById('city').value; + ', ' + document.getElementById('country').value;
					
					geocoder.geocode({'address': address}, function(results, status) {
						if (status === 'OK') {
							resultsMap.setCenter(results[0].geometry.location);
							var marker = new google.maps.Marker({
							map: resultsMap,
							position: results[0].geometry.location
							});
						} else {
							alert('Geocode was not successful for the following reason: ' + status);
						}
						});
				}
			</script>
			<!-- the link to google API with the key and call to the initialization of the map -->
			<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=insert-your-own-key&callback=initMap">
			</script>
		</div><!-- wrapper end -->
	</body>
</html>
