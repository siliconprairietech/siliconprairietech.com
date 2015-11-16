<?php

require_once('config.php');

use google\appengine\api\taskqueue\PushTask;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = ['email' => $_REQUEST['email'], 'token' => SLACK_TOKEN, 'set_active' => true];
    $context = ['http' => ['method' => 'post', 'content' => http_build_query($data)]];
    $response = file_get_contents('https://' . SLACK_URL . '/api/users.admin.invite', false, stream_context_create($context));

    if ($response === false) {
        // HTTP error
        $alert = array('Whoops!', 'An unexpected error occurred. Please contact the moderators for help.', 'error', ':(');
    }
    else {
        $result = json_decode($response, true);

        // {"ok":true}
        if ($result['ok'] === true) {
            list($appengine_latitude, $appengine_longitude) = explode(',', $_SERVER['HTTP_X_APPENGINE_CITYLATLONG']);

            $latitude = $_REQUEST['latitude'] ?: $appengine_latitude;
            $longitude = $_REQUEST['longitude'] ?: $appengine_longitude;

            if ($latitude && $longitude) {
                (new PushTask('/add-marker', ['latitude' => $latitude, 'longitude' => $longitude]))->add('marker-queue');
            }

            $alert = array('Celebrate Success!', 'Welcome friend! Check your email for your invitation!', 'success', 'Thanks!');
        }
        // {"ok":false,"error":"already_invited"}
        else {
            $error = $result['error'];
            if ($error === 'already_invited') {
                $alert = array('Whoops!', 'Looks like you\'re already invited!', 'warning', 'Gotcha!');
            }
            elseif ($error === 'invalid_email') {
                $alert = array('Whoops!', 'Check your email and try again.', 'error', 'Gotcha!');
            }
            else {
                $alert = array('Whoops!', 'An unexpected error occurred. Please contact the moderators for help. (' . $error . ')', 'error', ':(');
            }
        }
    }

    require_once('index.php');
}
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once('index.php');
}
else {
    http_response_code(405); // Method Not Allowed
}