#!/bin/bash

export PATH="/opt/google_appengine:$PATH"
dev_appserver.py --host 0.0.0.0 --php_executable_path=/usr/bin/php-cgi "`dirname $0`"
