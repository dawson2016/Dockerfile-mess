#!/bin/bash
nginx -g "daemon off;" && php-fpm && soffice --headless --invisible   --norestore --nologo --nolockcheck --accept="socket,host=0.0.0.0,port=8100;urp;" --nofirststartwizard
