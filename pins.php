<?php

require_once('config.php');

use google\appengine\api\cloud_storage\CloudStorageTools;
CloudStorageTools::serve(PINS_JS);
