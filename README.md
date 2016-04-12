[![Stories in Ready](https://badge.waffle.io/wplib/wplib-box.png?label=ready&title=Ready)](https://waffle.io/wplib/wplib-box)
[![Stories In Progress](https://badge.waffle.io/wplib/wplib-box.svg?label=in+progress&title=In+Progress)](http://waffle.io/wplib/wplib-box)
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

	# cd ~/Sites, or cd into whichever directory you store your website projects in
	cd ~/Sites                
	git clone git@github.com:wplib/wplib-box.git
	cd wplib-box
	composer install
	vagrant up
	open "http://wplib.box"

After this you should have a running WPLib Box via Vagrant and VirtualBox and a website loaded at the local wplib.box domain.

##Setting the Domain

To use this Vagrant box for a domain other than `wplib.box` edit the `Vagrantfile` and replace `wplib.box` with your own domain _(we recommend `dev.yourproductiondomain.ext`):_

In other words, change this:

	config.vm.hostname = "wplib.box"

To _(something like)_ this:

	config.vm.hostname = "dev.example.com"

Save that and run the following commands _(replacing the domain in the 2nd command with your own):_

	vagrant reload
	open "http://dev.example.com"

## MySQL Database
 
The WordPress website is served by the `wordpress` database in MySQL. The username and password are `wordpress`.

In other words:

	define( 'DB_NAME', 'wordpress' );
	define( 'DB_USER', 'wordpress' );
	define( 'DB_PASSWORD', 'wordpress' );

## WordPress Admin

To login to [wplib.box/wp-admin/](http://wplib.box/wp-admin) use the following credentials:

- Username: `admin`
- Password: `admin`

##Future 

We have many plans for the WPLib platform.  This is just a start.  Watch this repo to keep up to date.
