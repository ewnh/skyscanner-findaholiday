<?php
/**
 * Created by PhpStorm.
 * User: daedalus
 * Date: 14/10/17
 * Time: 22:07
 */



$price = $_GET['amount'];
echo $price;
$travelDate = $_GET['from'];
$returnDate = $_GET['to'];
echo $travelDate;
echo $returnDate;



function getRouteCost($location, $destination, $startdate, $enddate) {
    $API = "Redact";
    $response = file_get_contents('http://partners.api.skyscanner.net/apiservices/browseroutes/v1.0/' . $location .
        '/GBP/en-UK/' . $location . '/' . $destination .'/' . $startdate . '/' . $enddate . '?apikey=' . $API);
    $decoded = json_decode($response, true);
    //print_r($decoded);
    return $decoded;
}
$results = getRouteCost('UK', 'NL', '2017-10-17', '2017-10-22');

foreach($results as $key => $value){
    foreach($value as $key => $initem)
    {
        echo $initem['OriginId'];
    }
}

?>