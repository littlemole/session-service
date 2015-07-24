#!/bin/bash

find -name "*~" -exec rm {} \; 
./vendor/bin/swagger -o public/swagger.json  module/