<?php

require_once('config.php');

use google\appengine\api\taskqueue\PushTask;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'email' => $_REQUEST['email'],
        'token' => SLACK_TOKEN,
        'set_active' => true];
    $context = ['http' => [
        'method' => 'post',
        'content' => http_build_query($data)]];
    $result = file_get_contents('https://' . SLACK_URL . '/api/users.admin.invite', false, stream_context_create($context));
    print_r($result);
    // {"ok":true}
    // {"ok":false,"error":"already_invited"}

    // $_SERVER['HTTP_X_APPENGINE_CITYLATLONG']
    $task = new PushTask('/add-pin', ['lat' => $_REQUEST['lat'], 'lng' => $_REQUEST['lng']]);
    $task_name = $task->add('pin-queue');
    print_r($task_name);
}

phpinfo();
