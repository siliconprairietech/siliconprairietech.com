#!/bin/bash

export PATH="/opt/google_appengine:$PATH"
appcfg.py -A silicon-prairie-tech update --noauth_local_webserver --verbose `pwd`
