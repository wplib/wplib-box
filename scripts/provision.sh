#!/usr/bin/env bash

# Download composer if it does not yet exists
cd /var/www
[ ! -e "composer.phar" ] && wget -q --no-cache https://getcomposer.org/composer.phar
php composer.phar install

# Symlink Object Cache
sudo ln -s /var/www/content/mu-plugins/wp-redis/object-cache.php /var/www/content/object-cache.php

# Import default database
mysql -u root wordpress < /vagrant/sql/default.sql
