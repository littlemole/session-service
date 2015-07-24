#!/bin/bash

DIR=$(pwd)
echo $DIR
sudo docker build -t mike/session .
sudo docker run -t -i -v $DIR:/opt/session-service -p 8080:80  mike/session /opt/session-service/run.sh

