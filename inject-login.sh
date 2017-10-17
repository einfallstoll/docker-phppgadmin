#!/bin/bash

sed -i "/login action/ {
    h
    r /var/tmp/login.inc.php
    g
    N
}" /usr/share/phppgadmin/libraries/lib.inc.php

