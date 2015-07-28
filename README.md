Session Example API
=======================

Introduction
------------
This is a simple test API implementing a fictional simple session
service. The purpose is just to play with swagger-php.

Installation using Composer
---------------------------

* clone this project
* composer install


Generate swagger.json with doctrine
-----------------------------------
./swag.sh

note: regenerating swagger docs using ./swag.sh needs java, in particular
you should have a proper Maven setup and JAVA_HOME pointing to a JDK7+.

Running with docker
-------------------
./docker.sh

View in browser:
----------------

http://localhost:8080/session-service/

