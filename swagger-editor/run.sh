#!/bin/bash

cd /opt/swagger/ && NODE_PATH=/opt/node && PATH=$PATH:/opt/node/bin  PORT=3000 grunt serve
