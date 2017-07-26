#!/bin/bash

rm -f /var/run/apache2.pid

# Start apache
/usr/sbin/apache2 -D FOREGROUND
