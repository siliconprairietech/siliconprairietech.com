<?php

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];

    if (is_numeric($latitude) && is_numeric($longitude)) {
        $markers = file_exists(MARKERS_JS) ? file_get_contents(MARKERS_JS) : '';
        $markers .= 'window.setTimeout(function(){new google.maps.Marker({map:map,position:new google.maps.LatLng(' . htmlspecialchars($latitude) . ',' . htmlspecialchars($longitude) . '),animation:google.maps.Animation.DROP});},' . rand(1, 2500) . ');';

        $context = ['gs' => ['Content-Type' => 'application/javascript']];
        file_put_contents(MARKERS_JS, $markers, 0, stream_context_create($context));
    }
    else {
        syslog(LOG_ERR, 'Invalid latitude/longitude (' . $latitude . '/' . $longitude . ')');
        http_response_code(400); // Bad Request
    }
}
else {
    http_response_code(405); // Method Not Allowed
}
