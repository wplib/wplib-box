#!/usr/bin/env bash
sudo ln -s /var/www/content/mu-plugins/wp-redis/object-cache.php /var/www/content/object-cache.php
mysql -u root wordpress < /vagrant/sql/default.sql