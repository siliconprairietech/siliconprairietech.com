<?php

require_once __DIR__ . '/config.php';

if (file_exists(MARKERS_JS)) {
    CloudStorageTools::serve(MARKERS_JS);
}
else {
    header('Content-type: application/javascript');
}
