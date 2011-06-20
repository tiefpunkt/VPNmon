#!/bin/sh
PHP=/usr/bin/php
DIR="$( cd "$( dirname "$0" )" && pwd )"

$PHP $DIR/../symfony vpnmon:client-disconnect