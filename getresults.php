<?php
function getNearbyCities($location, $minradius, $maxradius) {
	$response = file_get_contents('http://getnearbycities.geobytes.com/GetNearbyCities?limit=10000&radius=' . $maxradius . 
		'&minradius=' . $minradius . '&locationcode='. $location);
	$decoded = json_decode($response, true);
	print_r($decoded);
}

function getAllRoutes($location, $destination, $startdate, $enddate) {
	return json_decode(file_get_contents('http://partners.api.skyscanner.net/apiservices/browseroutes/v1.0/' . $location . 
		'/GBP/en-UK/' . $location . '/' . $destination .'/' . $startdate . '/' . $enddate . '?apikey=' . readAPIKey()), true);
}

function readAPIKey() {
	return file_get_contents('../skyscanner-pw');
}

function filterRoutes($routes, $maxprice) {
	foreach($routes["Routes"] as $route) {
		if(!array_key_exists("Price", $route)) {
			$index = array_search($route, $routes["Routes"]);
			unset($routes["Routes"][$index]);
		}
	}
	print_r($routes["Routes"]);
}

//getNearbyCities('UKENSHEF', 0, 1000);
//getRouteCost('UK', 'US', '2017-10-15', '2017-10-22');
filterRoutes(getAllRoutes('UK', 'US', '2017-10-15', '2017-10-22'), 100);
?>
