<?php
function getNearbyCities($location, $minradius, $maxradius) {
	$response = file_get_contents('http://getnearbycities.geobytes.com/GetNearbyCities?limit=10000&radius=' . $maxradius . '&minradius=' . $minradius . '&locationcode='. $location);
	$decoded = json_decode($response, true);
	print_r($decoded);
}

getNearbyCities('UKENSHEF', 0, 1000);
?>
