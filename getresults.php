<?php
function getNearbyCities($location, $minradius, $maxradius) {
	$response = file_get_contents('http://getnearbycities.geobytes.com/GetNearbyCities?limit=10000&radius=' . $maxradius . 
		'&minradius=' . $minradius . '&locationcode='. $location);
	$decoded = json_decode($response, true);
	print_r($decoded);
}

function getRouteCost($location, $destination, $startdate, $enddate) {
	$response = file_get_contents('http://partners.api.skyscanner.net/apiservices/browseroutes/v1.0/' . $location . 
		'/GBP/en-UK/' . $location . '/' . $destination .'/' . $startdate . '/' . $enddate . '?apikey=' . readAPIKey());
	$decoded = json_decode($response, true);
	print_r($decoded);
}

function readAPIKey() {
	return file_get_contents('../skyscanner-pw');
}

//getNearbyCities('UKENSHEF', 0, 1000);
getRouteCost('UK', 'US', '2017-10-15', '2017-10-22');
?>
