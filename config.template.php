<?php

require_once __DIR__ . '/vendor/autoload.php';

use google\appengine\api\cloud_storage\CloudStorageTools;

define('SLACK_URL', 'YOUR-TEAM.slack.com');
define('SLACK_TOKEN', 'YOUR-ACCESS-TOKEN'); // https://api.slack.com/web

define('GOOGLE_MAPS_API_KEY', 'YOUR-GOOGLE-MAPS-KEY'); // https://developers.google.com/maps/documentation/javascript/get-api-key
define('GOOGLE_ANALYTICS_TRACKING_ID', 'YOUR-GOOGLE-ANALYTICS-TRACKING-ID'); // https://support.google.com/analytics/answer/1008080?hl=en

define('RECAPTCHA_SECRET_KEY', 'YOUR-RECAPTCHA-SERCET-KEY'); // https://www.google.com/recaptcha/intro/

define('MARKERS_JS', 'gs://' . CloudStorageTools::getDefaultGoogleStorageBucketName() . '/markers.js');

$smarty = new Smarty();
$smarty->setCompileDir('gs://' . CloudStorageTools::getDefaultGoogleStorageBucketName() . '/templates_c');
$smarty->setTemplateDir(__DIR__);
function smarty() {
    global $smarty;
    return $smarty;
}
