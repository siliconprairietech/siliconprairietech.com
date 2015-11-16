<?php

use google\appengine\api\cloud_storage\CloudStorageTools;

define('SLACK_URL', 'YOUR-TEAM.slack.com');
define('SLACK_TOKEN', 'YOUR-ACCESS-TOKEN'); // https://api.slack.com/web

define('MARKERS_JS', 'gs://' . CloudStorageTools::getDefaultGoogleStorageBucketName() . '/markers.js');
