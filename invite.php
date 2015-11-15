<?php

require_once('config.php');

use google\appengine\api\taskqueue\PushTask;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = ['email' => $_REQUEST['email'], 'token' => SLACK_TOKEN, 'set_active' => true];
    $context = ['http' => ['method' => 'post', 'content' => http_build_query($data)]];
    $response = file_get_contents('https://' . SLACK_URL . '/api/users.admin.invite', false, stream_context_create($context));

    if ($response === false) {
        // HTTP error
    }
    else {
        $result = json_decode($response, true);

        // {"ok":true}
        if ($result['ok'] === true) {
            list($appengine_latitude, $appengine_longitude) = explode(',', $_SERVER['HTTP_X_APPENGINE_CITYLATLONG']);

            $latitude = $_REQUEST['latitude'] ?: $appengine_latitude;
            $longitude = $_REQUEST['longitude'] ?: $appengine_longitude;

            if ($latitude && $longitude) {
                (new PushTask('/add-pin', ['latitude' => $latitude, 'longitude' => $longitude]))->add('pin-queue');
            }
        }
        // {"ok":false,"error":"already_invited"}
        else {
            $error = $result['error'];
        }
    }
}
