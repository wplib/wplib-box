#WPLib Box

A pre-packaged virtual machine for developing your [WPLib](https://github.com/wplib/wplib) based WordPress project.

## Services

- PHP 5.5 (Pantheon)
- PHP-FPM
- CURL
- XDebug
- Composer
- Nginx
- MySQL
- Redis
- Varnish
- Git
- Puppet

## Setup
To run WPLib Box requires the following software be installed:

- Install [VirtualBox](https://www.virtualbox.org/)
- Install [Vagrant](https://www.vagrantup.com/)
- Install the [Vagrant Hosts Updater](https://github.com/cogitatio/vagrant-hostsupdater) plugin by running `vagrant plugin install vagrant-hostsupdater`
- Install the [Vagrant Triggers](https://github.com/emyl/vagrant-triggers) plugin by running `vagrant plugin install vagrant-triggers`

## Sites

There are three websites hosted on this VM:
 
 - [http://wplib-box.dev](http://wplib-box.dev): Contains documentation regarding the machine and WPLib in general.
 - [http://underscores4wplib.dev](http://underscores4wplib.dev): A site with WPLib and the 
 [Underscores-WPLib](https://github.com/wplib/underscores4wplib) port installed.
 - [http://novarnish.underscores4wplib.dev](http://cache.underscores4wplib.dev): The same site as the line above, 
 but without Varnish.
 
## Database
 
The WordPress website is served by the `wordpress` database in MySQL. The username and password are `wordpress`.

## WordPress

The username and password for WP are `wplib`.


###Future, Definitely
- [WPLib CLI](https://github.com/wplib/wplib-cli)
- [WP CLI](http://wp-cli.org/)
- [PHPUnit](https://phpunit.de/)

###Future, Maybe
- [Otto](https://ottoproject.io/)
- [Gearman](http://gearman.org/)
- [ZeroMQ](http://zeromq.org/), [RabbitMQ](https://www.rabbitmq.com/) or both

##Sites
###Future
- `docs.wplib-box.dev`  
	- https://github.com/wplib/wplib-docs
- `lawpress.wplib-box.dev` 
	- https://github.com/wplib/lawpress

