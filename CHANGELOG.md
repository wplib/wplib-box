# WPLib Box ChangeLog

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
