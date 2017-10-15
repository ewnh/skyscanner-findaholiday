<?php
session_start();
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
		if(!array_key_exists("Price", $route) || $route["Price"] > $maxprice) {
			$index = array_search($route, $routes["Routes"]);
			unset($routes["Routes"][$index]);
		}
	}

	foreach($routes["Routes"] as $route) {
		print_r($route);
		lookupRoute($routes, $route["DestinationId"]);
	}
}

function lookupRoute($routes, $id) {
	foreach($routes["Places"] as $place) {
		if($place["PlaceId"] == $id) {
			print("PlaceId=".$id." is ".$place["Name"]."\n");
		}
	}
}

function getResults() {
	return "Test";
}

//getNearbyCities('UKENSHEF', 0, 1000);
//getRouteCost('UK', 'US', '2017-10-15', '2017-10-22');
//filterRoutes(getAllRoutes('UK', 'anywhere', '2017-10-16', '2017-10-23'), 100);
$_SESSION['results'] = getResults();
header("Location: output.php");
?>
