[![Stories in Ready](https://badge.waffle.io/wplib/wplib-box.png?label=ready&title=Ready)](https://waffle.io/wplib/wplib-box)
#WPLib Box

A pre-packaged virtual machine for developing your [WPLib](https://github.com/wplib/wplib) based WordPress project.

## Services

- PHP/PHP5-FPM 5.6.20
- MySQL 5.5
- nginx 1.4
- XDEBUG 2.3.3
- Redis 2.8.4

## Required Software
To run WPLib Box requires the following software be installed:

- Install [VirtualBox](https://www.virtualbox.org/)
- Install [Vagrant](https://www.vagrantup.com/)
- Install the [Vagrant Hosts Updater](https://github.com/cogitatio/vagrant-hostsupdater) plugin by running `vagrant plugin install vagrant-hostsupdater`
- Install the [Vagrant Triggers](https://github.com/emyl/vagrant-triggers) plugin by running `vagrant plugin install vagrant-triggers`
- Install [Composer](https://getcomposer.org/download/)

##Quickstart
After making sure you have the necessary software, run the following commands:

	# cd ~/Sites, or cd whatever directory in which you put keep your websites
	cd ~/Sites                
	git clone git@github.com:wplib/wplib-box.git
	cd wplib-box
	composer install
	vagrant up
	open "http://wplib.box"

After this you should have a running WPLib Box via Vagrant and VirtualBox and a website loaded at the local wplib.box domain.

##Configuring Develop Domain

Edit your `Vagrantfile` and replace `wplib.box` 

	config.vm.hostname = "wplib.box"

With your own domain (we recommend `dev.yourproductiondomain.ext`):_

	config.vm.hostname = "dev.example.com"

Save that and run the following commands _(replacing the domain in the 2nd command with your own):_

	vagrant reload
	open "http://dev.example.com"

## Database
 
The WordPress website is served by the `wordpress` database in MySQL. The username and password are `wordpress`.

## WordPress

The username and password for WP are `wplib`.

##Future 

We have many plans the WPLib platform.  This is just a start.  Watch this repo to keep up to date.
