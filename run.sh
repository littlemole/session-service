#!/bin/bash

/bin/ln -s /opt/swagger/dist/ /opt/session-service/public/swagger

cd /opt/session-service && composer install

/etc/init.d/apache2 start
/etc/init.d/redis-server start

/bin/bash -i