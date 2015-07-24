#!/bin/bash

DIR=$(pwd)
echo $DIR
sudo docker build $1 -t mike/swagger-editor .
sudo docker run -t -i -v $DIR:/opt/ -p 3000:3000  mike/swagger-editor /opt/run.sh

