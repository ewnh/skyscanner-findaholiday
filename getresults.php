<?php
session_start();

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

	return $routes;

	//foreach($routes["Routes"] as $route) {
		//print_r($route);
		//lookupRoute($routes, $route["DestinationId"]);
	//}
}

function lookupRoute($routes, $id) {
	foreach($routes["Places"] as $place) {
		if($place["PlaceId"] == $id) {
			//print(PlaceId=".$id." is ".$place["Name"]."\n");
			return $place["Name"];
		}
	}
	return "Couldn't find location name";
}

function getResults($routes) { 
	$routes = getAllRoutes('UK', 'anywhere', '2017-10-16', '2017-10-23');
	$routes = filterRoutes($routes, 100);
	$i = 0;
	foreach($routes["Routes"] as $route) {
		$_SESSION["route".$i] = $route;
		$i = $i + 1;
	}
//	$_SESSION['test'] = $route;
//	$_SESSION['destination'] = lookupRoute($routes, $route[0]["DestinationId"]);
//	$_SESSION['flight_price'] = $route["Price"];
//	$_SESSION['total_price'] = $route["Price"];
}

//getNearbyCities('UKENSHEF', 0, 1000);
//getRouteCost('UK', 'US', '2017-10-15', '2017-10-22');
//filterRoutes(getAllRoutes('UK', 'anywhere', '2017-10-16', '2017-10-23'), 100);
getResults(getAllRoutes('UK', 'US', '2017-10-16', '2017-10-23'));
//$_SESSION['test'] = getAllRoutes('UK', 'US', '2017-10-16', '2017-10-23');
header("Location: output.php");
?>
