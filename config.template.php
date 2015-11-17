<?php

use google\appengine\api\cloud_storage\CloudStorageTools;

define('SLACK_URL', 'YOUR-TEAM.slack.com');
define('SLACK_TOKEN', 'YOUR-ACCESS-TOKEN'); // https://api.slack.com/web
define('GOOGLE_MAPS_API_KEY', 'YOUR-GOOGLE-MAPS-KEY'); // https://developers.google.com/maps/documentation/javascript/get-api-key
define('MARKERS_JS', 'gs://' . CloudStorageTools::getDefaultGoogleStorageBucketName() . '/markers.js');
