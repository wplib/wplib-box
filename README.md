#WPLib Box

**The EASIEST way to get a local WordPress development environment**, using Vagrant.

##[CLICK HERE](https://slackpass.io/wplib) for **quick help** via [wplib.slack.com](https://wplib.slack.com) 

Use our Slack account to ask questions about or get quick help on installing or using WPLib Box via chat and/or [ScreenHero](https://screenhero.com/) _(we know that you cannot sign up for ScreenHero any more, but we can send you an invite; just direct message @mike via Slack and request a ScreenHero invite.)_

But we still encourage you to submit bugs and feature requests via [GitHub issues](https://github.com/wplib/wplib-box/issues) though you can first chat with us to verify the bug or flesh out the feature request via Slack if you want to. 

----
<a id="vagrant-1.8.6-bug"></a>
**IMPORTANT**: If you are using Vagrant version `1.8.6` _(run `vagrant -v` to see)_ then [there _appears_ to be a bug](https://github.com/mitchellh/vagrant/issues/7964) that stops WPLib Box from providing a network connection to your host computer. Until this is fixed by Vagrant we have a workaround that you can apply **_after_** you run `vagrant up`.  It is not difficult to do; just read our FAQ for [how to fix the Vagrant version `1.8.6` bug](FAQ.md#vagrant-1.8.6-bug).

----

##Why Use WPLib Box?

Why Use WPLib Box for WordPress local development instead of one of the other Vagrant boxes for WordPress such as [VVV](https://github.com/Varying-Vagrant-Vagrants/VVV), [VIP QuickStart](https://github.com/Automattic/vip-quickstart), [Trellis](https://github.com/roots/trellis) or [one of the others](http://wptavern.com/13-vagrant-resources-for-wordpress-development)?

Our **GOAL** is to be:

1. The **Easiest Box to Get Working Initially**, 
2. The **Fastest Box to** `vagrant up`
3. The **Least Problematic Box in Day-to-Day Usage**; especially when re-provisioning,

And one more goal is that our box will support **PhpStorm+XDEBUG debugging** with the least effort required on your part.
 
We think that once you try WPLib Box you will agree that we have succeeded.  Want to know [**how**](#how) we did it?

## Services & Software Included

Service/Software|Version
-------|----------
PHP/PHP-FPM|5.6.20 & 7.0.9
HipHop VM|3.14.3
MySQL|5.6
nginx|1.4
XDEBUG|2.4.0
Redis|2.8.4
WP CLI|0.23.0
Nodejs|6.2.2
Gearman|1.0.6
localtunnel.me|

## Supported Host/Development Computers
This box was developed using Mac OS/X and tested using Linux and Windows with [git-bash](https://git-for-windows.github.io/). Thus we believe it currently works with:

O/S|Notes
---|-----
Mac OS X|Latest 3 releases of OS X, at least
Linux|Most (all?) distros of Linux 
Windows 7 thru 10|With PowerShell or [git-bash](https://git-for-windows.github.io/) 

We assume this will work on all these platforms but we have not tested it thoroughly yet so we welcome your bug reports if you have issues with it.

## Required Hardware

Since WPLib Box is distributed as a virtual machine image of a 64-bit distribution of Ubuntu Linux, a 64-bit Intel or AMD CPU is required, along with support for either Intel or AMD virtualization technologies: VT-x or AMD-v. You will need to enable VT-x/AMD-v in the host PC BIOS.

## Required Software

###For Mac & Linux Users

To run WPLib Box requires the following software be installed:

- Install [VirtualBox](https://www.virtualbox.org/)
- Install [Vagrant](https://www.vagrantup.com/)
- Install the [Vagrant Hosts Updater](https://github.com/cogitatio/vagrant-hostsupdater) plugin by running `vagrant plugin install vagrant-hostsupdater`
- Install the [Vagrant Triggers](https://github.com/emyl/vagrant-triggers) plugin by running `vagrant plugin install vagrant-triggers`

###For Windows Users

- Install everything from the Mac & Linux Users list above
- Ensure that no other VM platform is running (either VMware or Hyper-V) as they will prevent VirtualBox from operating.
- Install [Git](https://git-scm.com/downloads) version 2 or greater **OR** download the `.ZIP` file and unzip instead.

##Quickstart
After making sure you have the necessary software, run the following commands 

###For Mac or Linux users:

    # cd ~/Sites, or cd into whichever directory you store your website projects in
    cd ~/Sites                
    git clone https://github.com/wplib/wplib-box.git
    cd wplib-box
    vagrant up
    open "http://wplib.box"

###For Windows users:

    # cd into whichever directory you store your website projects in. 
    # For example, your user profile: C:\Users\{current user}\Sites
    c:
    cd %userprofile%\Sites  
    #
    # You can run the next command, or just download from the web and unzip into the wplib-box directory
    #
    git clone https://github.com/wplib/wplib-box.git
    cd wplib-box
    vagrant up
    explorer "http://wplib.box"
        
After this you should have a running WPLib Box via Vagrant and VirtualBox and a website loaded at the local `wplib.box` domain.

##Setting the Domain Name

To use WPLib Box for a local domain name other than `wplib.box` edit the `Vagrantfile` and replace the text `"wplib.box"` with your preferred local domain name _(we recommend `"your-production-domain.dev"`):_

In other words, change this:

	config.vm.hostname = "wplib.box"

To _(something like)_ this:

	config.vm.hostname = "example.dev"

Save the changes to `Vagantfile` and then run the following commands to reload the Vagrant configuration, and then open in your browser. _(Be sure you replaced the domain name in the 2nd command with your own local domain name):_

	vagrant reload
	open "http://example.dev"

<a id="change-ip"></a>
## Changing the Local IP Address 

The default local IP address used by this box is `10.10.10.{octet}` where `{octet}` is a number between 10 to 250.

If you need to change that for any reason simply edit the file named just `IP` _(with no extension)_ found in the project root. It is created during `vagrant up` and a random `{octet}` is generated. Just edit this file and change the IP address it contains.

## Switching PHP Versions

The box has both PHP-FPM 5.6 and 7.0 running concurrently. They are implemented as separate processes with
individual sockets. Instructions on how to select which version to use can be found in the [FAQ](https://github.com/wplib/wplib-box/blob/master/FAQ.md).

## Logging into the WordPress Admin

To login to [wplib.box/wp-admin/](http://wplib.box/wp-admin) use the following credentials:

Credential|Value
---------|------
Username:|`admin`
Password:| `password`

We will probably change to using different username and password in the future.

## The MySQL Database Credentials
 
If you want to access the database using a tool such as Sequel Pro the MySQL database name, username and password are all `wordpress`.

In other words:

	define( 'DB_NAME', 'wordpress' );
	define( 'DB_USER', 'wordpress' );
	define( 'DB_PASSWORD', 'wordpress' );

We may change to using different MySQL credentials in the future.

### Connecting a MySQL Client

The MySQL server listens on all interfaces on port 3306. If you have the MySQL command-line client installed on your host machine, you can simply `mysql --host wplib.box -u wordpress -pwordpress` (assuming you are using the `wplib.box` hostname).
Use the credentials below if you are using a GUI such as Sequel Pro, Navicat, et al.

#### The Database Credentials

Here are the credentials you can use for MySQL database:

Credential|Value
----------|----------
IP Address _**or**_ Host Name | `192.168.33.10` _**or**_ `wplib.box` _(or `example.dev`)_ 
Port                          | `3306`
Username                      | `wordpress`
Password                      | `wordpress`

#### 2. The SSH Credentials

Here are the credentials you can use for the SSH tunnel:

Credential|Value
----------|----------
IP Address _**or**_ Host Name | `192.1688.33.10` _**or**_ `wplib.box` _(or` example.dev`)_ 
Port                          | `22`
Authentication Method         | Password
Username                      | `vagrant`
Password                      | `vagrant`


##Debugging PHP with XDEBUG and PhpStorm

Instructions to come...

## Internet Sharing

Internet sharing is implemented with [localtunnel.me](https://localtunnel.me), which is pre-installed in the box image.

##How?

How have we been able to make **WPLib Box** the:

1. **Easiest**, 
2. **Fastest** and 
3. **Least Problematic** Vagrant box for local WordPress development
4. Plus **No-Fuss PhpStorm+XDEBUG Debugging**?

Because **we took the blinders off**.  We ignored the lead of everyone else who has created a Vagrant box for WordPress development and we rethought how a Vagrant box should be designed, using a blank canvas.  

Instead of starting with a standard Linux distribution image as a base box &mdash; such as [provided by Ubuntu](https://vagrantcloud.com/ubuntu) &mdash; and then using Puppet, Chef or Ansible to provision the box _**on your computer while running inside**_ of your `Vagrantfile` **we provision and test the box IN ADVANCE**.  

Our **Provision-in-Advance** approach practically eliminates all the hair-pulling and infuriatingly unproductive time you frequently have to spend to solve an obscure provisioning issue in a script that you did not develop and thus know almost nothing about when you use one of the other boxes for local WordPress development. WPLib Box bypasses all those headaches for you and saves you tons of time!

What this means for you is that the only thing your `Vagrantfile` must do is: 

1. Specify [**our base box**](https://atlas.hashicorp.com/wplib/boxes/wplib/), 
2. Set your local domain name and local IP address, 
3. Mount your source code directory into the VM, and  
4. Extract WordPress core files from a ZIP file _(but we only run this step on (re-)provisioning.)_ 

Badda-bing, badda-bang; as Steve Jobs would say: **It Just Works!**

Give it a try and see if you don't agree.

## 3rd Party WPLib Box Projects

- [**WPLib Box Maker**](https://github.com/ArtOfWP/generator-wplibbox) from [ArtOfWP](https://github.com/ArtOfWP): _Generates a custom WPLib Box setup using [Yeoman](http://yeoman.io/)._

##Status of Issues
We are using Waffle.io to help us manage our GitHub issue queue:

[![Stories in Ready](https://badge.waffle.io/wplib/wplib-box.png?label=ready&title=Ready)](https://waffle.io/wplib/wplib-box)
[![Stories In Progress](https://badge.waffle.io/wplib/wplib-box.svg?label=in+progress&title=In+Progress)](http://waffle.io/wplib/wplib-box)

##Future 

We have many plans for the WPLib platform.  This is just a start.  Watch this repo to keep up to date.
