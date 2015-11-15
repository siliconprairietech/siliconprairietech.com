#!/bin/bash

export PATH="/opt/google_appengine:$PATH"
dev_appserver.py --admin_host 0.0.0.0 --host 0.0.0.0 --log_level debug --php_executable_path=/usr/bin/php-cgi "`dirname $0`"
