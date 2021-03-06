<?php

require_once __DIR__ . '/config.php';

use google\appengine\api\taskqueue\PushTask;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = ['secret' => RECAPTCHA_SECRET_KEY, 'response' => $_REQUEST['g-recaptcha-response'], 'remoteip' => $_SERVER['HTTP_X_FORWARDED_FOR']];
    $context = ['http' => ['method' => 'POST', 'content' => http_build_query($data)]];
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, stream_context_create($context));

    if ($response === false) {
        $alert = 'reCAPTCHA verification failed';
    }
    else {
        // https://developers.google.com/recaptcha/docs/verify#api-response
        $result = json_decode($response, true);

        if ($result['success'] === true) {
            $data = ['email' => $_REQUEST['email'], 'token' => SLACK_TOKEN, 'set_active' => true];
            $context = ['http' => ['method' => 'POST', 'content' => http_build_query($data)]];
            $response = file_get_contents('https://' . SLACK_URL . '/api/users.admin.invite', false, stream_context_create($context));

            if ($response === false) {
                // HTTP error
                $alert = array('Whoops!', 'An unexpected error occurred. Please contact the moderators for help.', 'error', ':(');
            }
            else {
                $result = json_decode($response, true);

                // {"ok":true}
                if ($result['ok'] === true) {
                    list($latitude, $longitude) = explode(',', $_SERVER['HTTP_X_APPENGINE_CITYLATLONG']);
                    if (is_numeric($latitude) && is_numeric($longitude)) {
                        (new PushTask('/add-marker', ['latitude' => $latitude, 'longitude' => $longitude]))->add('marker-queue');
                    }

                    $alert = array('Welcome friend!', 'Check your email for your invitation.', 'success', 'Thanks!');
                }
                // {"ok":false,"error":"already_invited"}
                else {
                    $error = $result['error'];
                    if ($error === 'already_invited') {
                        $alert = array('Whoops!', 'Looks like you\'re already invited.', 'warning', 'Cool!');
                    }
                    elseif ($error === 'invalid_email') {
                        $alert = array('Whoops!', 'Check your email and try again.', 'error', 'Gotcha!');
                    }
                    elseif ($error === 'already_in_team') {
                        $alert = array('Whoops!', 'Looks like you\'re already part of the team.', 'error', 'Nice!');
                    }
                    else {
                        $alert = array('Whoops!', 'An unexpected error occurred. Please contact the moderators for help. (' . $error . ')', 'error', ':(');
                    }
                }
            }
        }
        else {
            $errors = array_map(function ($errorCode) {
                switch ($errorCode) {
                    case 'missing-input-secret':
                        return 'The secret parameter is missing.';
                    case 'invalid-input-secret':
                        return 'The secret parameter is invalid or malformed.';
                    case 'missing-input-response':
                        return 'The response parameter is missing.';
                    case 'invalid-input-response':
                        return 'The response parameter is invalid or malformed.';
                    default:
                        return 'The request is invalid or malformed.';
                }
            }, $result['error-codes']);
            $alert = ['Uh-oh!', implode('. ', $errors), 'error', 'Let\'s try again'];
        }
    }

    smarty()->assign('alert', $alert);
    smarty()->display('index.tpl');
}
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    smarty()->display('index.tpl');
}
else {
    http_response_code(405); // Method Not Allowed
}
