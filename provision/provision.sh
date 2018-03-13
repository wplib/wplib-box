#!/bin/bash -x

mysql -u root -e "grant all on wordpress.* to 'wordpress'@'%' identified by 'wordpress';"

