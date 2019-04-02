#!/bin/sh
set -x
catip=${CAT_SERVER:-192.168.27.103}
sed -i \"s/cat.hsnw.com/${catip}/g\" /data/appdatas/cat/server.xml
sed -i \"s/cat.hsnw.com/${catip}/g\" /data/appdatas/cat/client.xml
exec "$@"
