Session Example API
=======================


Introduction
------------
This is a simple test API implementing a fictional simple session
service. The purpose is just to play with swagger-php.


Install & run
-------------

* clone this project
* `./docker.sh`


View in browser:
----------------

Swagger-UI:
[http://localhost:8080/session-service/](http://localhost:8080/session-service/)

plain json:
[http://localhost:8080/session-service/swagger.json](http://localhost:8080/session-service/swagger.json)


Update swagger.json with doctrine
-------------------------------------------
`./swag.sh`

note: regenerating swagger docs using ./swag.sh needs java, in particular
you should have a proper Maven setup and JAVA_HOME pointing to a JDK7+.


optional: run swagger-editor
----------------------------

* `cd swagger-editor`
* `./docker.sh`

then point your browser to [http://localhost:3000/](http://localhost:3000/)

:-)
