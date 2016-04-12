[![Stories in Ready](https://badge.waffle.io/wplib/wplib-box.png?label=ready&title=Ready)](https://waffle.io/wplib/wplib-box)
[![Stories In Progress](https://badge.waffle.io/wplib/wplib-box.svg?label=in+progress&title=In+Progress)](http://waffle.io/wplib/wplib-box)
#WPLib Box

A pre-packaged virtual machine for developing your [WPLib](https://github.com/wplib/wplib) based WordPress project.

##Why Use WPLib Box?

Why Use WPLib Box for WordPress local development instead of one of the other Vagrant boxes for WordPress such as [VVV](https://github.com/Varying-Vagrant-Vagrants/VVV), [VIP QuickStart](https://github.com/Automattic/vip-quickstart), [Trellis](https://github.com/roots/trellis) or [one of the others](http://wptavern.com/13-vagrant-resources-for-wordpress-development)?

Our **GOAL** is to be:

1. The **Easiest to Get Working Initially**, 
2. The **Fastest Vagrant Box to** `vagrant up`
3. The **Least Problematic in Day-to-Day Usage**; especially when re-provisioning,
 
We think that once you try WPLib Box you will agree that we have succeeded.  [Want to know how](#why-is-wplib-box-easiestfastestleast-problematic) we did it?

## Services & Software Included

Service/Software|Version
-------|----------
PHP/PHP5-FPM|5.6.20
MySQL|5.5
nginx|1.4
XDEBUG|2.3.3
Redis|2.8.4

## Supported Host/Development Computers
This box was developed using Mac OS/X and tested using Linux and Windows with [git-bash](https://git-for-windows.github.io/). Thus we believe it currently works with:

O/S|Notes
---|-----
Mac OS X|Latest 3 releases of OS X, at least
Linux|Most (all?) distros of Linux 
Windows 7 thru 10|With [git-bash](https://git-for-windows.github.io/)

We assume this will work on all these platforms but we have not tested it throughly yet so we welcome your bug reports if you have issues with it.

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

After this you should have a running WPLib Box via Vagrant and VirtualBox and a website loaded at the local `wplib.box` domain.

##Setting the Domain Name

To use WPLib Box for a local domain name other than `wplib.box` edit the `Vagrantfile` and replace the text `"wplib.box"` with your preferred local domain name _(we recommend `"dev.your-production-domain.tld"`):_

In other words, change this:

	config.vm.hostname = "wplib.box"

To _(something like)_ this:

	config.vm.hostname = "dev.example.com"

Save the changes to `Vagantfile` and then run the following commands to reload the Vagrant configuration, and then open in your browser. _(Be sure you replaced the domain name in the 2nd command with your own local domain name):_

	vagrant reload
	open "http://dev.example.com"


## Changing the Local IP Address 

The default local IP address used by this box is `192.168.33.10`.  

If you need to change that for any reason simply edit the `Vagrantfile`; change the following:

	config.vm.network "private_network", ip: "192.168.33.10"

To something else that is compatible with your network, i.e. maybe:

	config.vm.network "private_network", ip: "10.10.10.10"

We will probably change to a different default IP address in the future.

## Logging into the WordPress Admin

To login to [wplib.box/wp-admin/](http://wplib.box/wp-admin) use the following credentials:

Credential|Value
---------|------
Username:|`admin`
Password:| `admin`

We will probably change to using different username and password in the future.

## The MySQL Database Credentials
 
If you want to access the database using a tool such as Sequel Pro the MySQL database name, username and password are all `wordpress`.

In other words:

	define( 'DB_NAME', 'wordpress' );
	define( 'DB_USER', 'wordpress' );
	define( 'DB_PASSWORD', 'wordpress' );

We may change to using different MySQL credentials in the future.

### Connecting a MySQL Client via an SSH Tunnel	

You must use an [SSH Tunnel](https://gielberkers.com/how-to-connect-to-mysql-in-vagrant-from-your-host-machine/) to connect into the VM when using an MySQL Client running on your host machine.

What this means is you will generally need to have two sets of credentials: 

1. **The Database Credentials**
2. **The SSH Tunnel Credentials**

#### 1. The Database Credentials

Here are the credentials you can use for MySQL database:

Credential|Value
----------|----------
IP Address _**or**_ Host Name | `192.1688.33.10` _**or**_ `wplib.box` _(or` dev.example.com`)_ 
Port                          | `3306`
Username                      | `wordpress`
Password                      | `wordpress`

#### 2. The SSH Tunnel Credentials

Here are the credentials you can use for the SSH tunnel:

Credential|Value
----------|----------
IP Address _**or**_ Host Name | `192.1688.33.10` _**or**_ `wplib.box` _(or` dev.example.com`)_ 
Port                          | `22`
Authentication Method         | Password
Username                      | `vagrant`
Password                      | `vagrant`

Using these two sets of credentials with your SQL client you should be able to access and run SQL commands on the WordPress database.

##Debugging PHP with XDEBUG and PhpStorm

Instructions to come...

##Why is WPLib Box Easiest/Fastest/Least Problematic?

Story to come...

##Future 

We have many plans for the WPLib platform.  This is just a start.  Watch this repo to keep up to date.
