<?php

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];

    $markers = file_exists(MARKERS_JS) ? file_get_contents(MARKERS_JS) : '';
    $markers .= 'window.setTimeout(function(){new google.maps.Marker({map:map,position:new google.maps.LatLng(' . $latitude . ',' . $longitude . '),animation:google.maps.Animation.DROP});},' . rand(1, 2500) . ');';

    $context = ['gs' => ['Content-Type' => 'application/javascript']];
    file_put_contents(MARKERS_JS, $markers, 0, stream_context_create($context));
}
else {
    http_response_code(405); // Method Not Allowed
}
