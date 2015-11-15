<?php

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];

    $pins = file_get_contents(PINS_JS);
    $pins .= 'window.setTimeout(function(){new google.maps.Marker({map:map,position:new google.maps.LatLng(' . $latitude . ',' . $longitude . '),animation:google.maps.Animation.DROP});},' . rand(1, 2500) . ");\n";
    file_put_contents(PINS_JS, $pins);
}
else {
    http_response_code(405); // Method Not Allowed
}
