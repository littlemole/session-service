# This is a comment
FROM debian
MAINTAINER me <little.mole@arcor.de>

RUN /bin/echo -e "#!/bin/bash\nexit 0" > /usr/sbin/policy-rc.d 
RUN cat /usr/sbin/policy-rc.d
RUN /bin/echo -e "\nAcquire { \nRetries \"5\"; \n};\n" >> /etc/apt/apt.conf.d/70debconf
RUN cat /etc/apt/apt.conf.d/70debconf
RUN DEBIAN_FRONTEND=noninteractive apt-get update

# add php5.5 debian repository
RUN /bin/echo "deb http://packages.dotdeb.org wheezy-php55 all" >> /etc/apt/sources.list
RUN /bin/echo "deb-src http://packages.dotdeb.org wheezy-php55 all" >> /etc/apt/sources.list

# fetch the dotdeb package pgp keys
RUN apt-get install -y wget
RUN wget http://www.dotdeb.org/dotdeb.gpg -O /tmp/dotdeb.gpg
RUN apt-key add /tmp/dotdeb.gpg

# update and install php5 + redis
RUN DEBIAN_FRONTEND=noninteractive apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y git php5 php5-dev redis-server python build-essential  autoconf curl

RUN git clone https://github.com/phpredis/phpredis.git /opt/phpredis
RUN cd /opt/phpredis && phpize && ./configure && make && make install

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# enable apache2
COPY default /etc/apache2/sites-available/000-default.conf
COPY 21-redis.ini /etc/php5/apache2/conf.d/21-redis.ini

RUN a2enmod rewrite
RUN a2enmod php5

# prepare mount points and set perms
RUN mkdir /opt/session-service
RUN mkdir /opt/swagger
RUN chgrp www-data /opt/session-service
RUN chmod g+rx /opt/session-service -R
RUN chgrp www-data /opt/swagger
RUN chmod g+rx /opt/swagger -R

# install swagger UI
RUN git clone https://github.com/swagger-api/swagger-ui.git /opt/swagger/

EXPOSE 80


