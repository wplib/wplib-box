# WPLib Box ChangeLog

## 0.16.2
This release allowed us to catch up on some of the things we missed with `0.16.1`:

+ Pending...

## 0.16.1
This release allowed us to catch up on some of the things we missed with `0.16.0`:

+ PHP `7.2`
+ Import `/sql/provision.sql` on first `vagrant up`
+ Added PHP ZLib extension
+ Resolve issues with `box self-update` command
+ Moved box CLI to `/opt/box/cli`
+ Added `/opt/box/log`
+ Changed `W004` error message on a PHP error to `HTTP 500` error.
+ Dropped support for older WP-CLI versions
+ Added basic `box test` command to test box functionality

## 0.16.0
Numerically it was a small change, but functionality and stability-wise is was a **HUGE** update.

### Added:
* New _"Getting Started"_ Default Theme
* Plugin for WPLib Box Support
    * One-click admin login _(for local development only)_
* Splash screen on SSH, displays version number.
* Configuration in `$_ENV` variables
* Configuration error messages w/referenced online docs
* Default containers for stack roles
* PHP extensions
    * `ctype`
    * `pcntl`
    * `imagick` _(5.6 and 7.1 but not yet 7.0)_
* Warning on non-mounted webroot _(`/var/www`)_
* New and/or updated CLI Commands!
    * `box version`
    * `box status`
    * `box container`
    * `box database`
        * `box db chunk & box db unchunk`
    * `box self-update`
    * `box start/restart`

### Fixed:
* WP-CLI now works!
* Invalid permissions for uploads
* Invalid permissions for core, theme and plugin updates
* 30 second timeout triggering Bad Gateway
* Red (error) output by Vagrant on non-errors
* Inability to login to Adminer
* Bug related to NodeJS vs. `jq`
* Ability to serve HTTPS even w/o certificate
* Increase upload limit on file uploads to 100MB

### Created/updated Docker containers: 
* Adminer
* Apache2 
* Composer
* MariaDB
* MySQL
* MailHog
* Memcached
* Nginx
* PHP-FPM 5.6, 7.0, 7.1
* phpMyAdmin
* Redis
* WP-CLI

### Internal architecture improvements:
* Simplified `project.json` stack format
* Moved box CLI to `/opt/box` and added symlink of `/box`.
* Implemented JSON-based tag for container metadata
* Archived unused and/or no longer relevant `box` commands


## 0.15.0
+ Implement installable pacakages
+ Add Caddy Web Server as installable package
+ Add Nginx proxy
+ Add PHP-DOM extension
+ Add box restart command
+ Update to Adminer 4.3.1

## 0.14.0
+ `vagrant up` now configures box using `project.json` file
+ Add Memcached as an option
+ Add CLI commands to switch between Redis and Memcached
+ Implement PHP5.6 and PHP7.0 as Docker containers
+ Add shortcut command to switch to PHP7.1
+ Fix bug in Nginx MailHog virtual host configuration
+ Fix issue where `jq` was not latest version
+ Add `realpath` package

## 0.13.0
+ Implement MySQL as a Docker container
+ Implement Redis as a Docker container
+ Add MariaDB as an option
+ Fix broken command to switch PHP versions in box
+ Increase Nginx client_max_body_size to 100M
+ Increase Nginx fast_cgi_read_timout to 9999
+ Add command to switch between MySQL and MariaDB
+ Add shortcut commands for switching out web servers.
+ Update Adminer to 4.3.0
+ Updated FAQ
+ Update README with current software version numbers

## 0.12.1
+ Fixed issue with Docker webserver container starting before Vagrant mounts shared directories
+ Updated FAQ with instructions for accessing Adminer
+ Updated to WordPress `4.7.3` as default
+ Updated database with new WP `4.7.3` structure
+ Updated Query Monitor plugin to `2.13.4`

## 0.12.0
+ Implement Apache and Nginx as Docker containers
+ Add CLI command `set-web-server` to switch between Apache and Nginx
+ Change message that appears on default web page
+ Clone box scripts into box during build

## 0.11.0
+ Fix incorrect installation of `screen` and `jq`
+ Remove `HHVM`, `gearman`, and `ZeroMQ`

## 0.10.10
+ Add `screen`
+ Add `jq`
+ Enable Adminer and Mailhog to respond to box hostname
+ Default site now uses `PHP7.0`
+ Upgrade MySQL Server to `5.6`
+ Add `ZeroMQ`

## 0.10.9
+ Add `HHVM`
+ Add `bcmath` and `pspell` PHP extensions
+ Add `php-dev` and `php5.6-dev` packages
+ Add MySQL configuration for vagrant user

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
