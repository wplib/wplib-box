# WPLib Box ChangeLog

## 0.10.8
+ Add PHP `gettext`, `imagick`, `mcrypt`,`xml`, and `zip` extensions
+ Add [Composer](https://getcomposer.org)

## 0.10.7.3
+ Added Nginx proxy for Mailhog
+ Added PHP `mbstring` extension
+ Increased Nginx client_max_body_size to `100M`

## 0.10.7.2
+ Fixed Xdebug configuration for PHP 5.6
+ Added Xdebug configuration for remote debugging with Visual Studio Code

## 0.10.7.1
+ Fixed issue with xDebug configuration
+ Fixed issue with certain PHP modules not loading in PHP 5.6
+ Added PHP-Memcached extension
+ Fixed regression issue with nginx `sendfile` property being set to 'on'
+ Fixed issue with being unable to connect to MySQL server from host
+ Add [Adminer](https://www.adminer.org)

## 0.10.7
+ Added PHP 5.6 and 7.0
+ Added Gearman Job Server with PHP support
+ Added automatic hourly database export

## 0.10.6.2
+ Add default web page
+ Fix VMWare tools Installation

## 0.10.6.1
+ Added server name in virtual host configuration to support Xdebug
+ Increased nginx timeout to 99999 seconds

## 0.10.6
+ Fixed missing `wp-cli`
+ Added SSL

## Version 0.10.5
- Changed nginx website root to `/var/www`.
- Upon `vagrant ssh` current directory is changed to website root.
- Increased upload_max_size to 100M.
- Set nginx "sendfile" option to off
- Added Support for PHP GD (php5-gd)
    - See http://php.net/manual/en/book.image.php
