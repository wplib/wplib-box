# WPLib Box FAQ

##Table of Contents
###Overview
- [What is WPLib Box?](#what-is)
- [How is WPLib Box Better?](#how-better)

###Technical
- [How do I Run WP-CLI?](#wp-cli)
- [Why is WPLib Box Caching Things?](#caching)
- [How do I Flush the Redis Persistent Object Cache?](#flush-cache)
- [How do I Deploy My Site from WPLib Box?](#deploy)
- [How do I Use WPLib Box on New Projects?](#new-projects)
- [How do I Use WPLib Box on Pre-Existing Projects?](#existing-projects)
- [How do I Configure Composer to Work with WPLib Box?](#composer)
- [How do I Import a MySQL Database?](#import-db)
- [How do I Switch PHP Versions?](#php-versions)
- [How do I Get a URL to Provide Access to My Box's Site From the Internet?](#access)
- [How do I Debug with Visual Studio Code?](#vscode-debug)
- [How do I access Adminer?](#adminer)
- [How do I access MailHog?](#mailhog)

###Glossary
- [What Do They All These Terms Mean?](#glossary)

###Support
- [Don't See the Answer Here?](#dont-see-the-answer-here)
- [Want to try WPLib Box but Need Help?](#need-help)

###Business
- [What is our Business Model?](#biz-model)
- [What Services can The WPLib Team Offer?](#what-services)

###Future
- [What Are the Plans/Roadmap for WPLib Box?](#roadmap)

---

## Overview
<a id="what-is"></a>
###What is WPLib Box?
WPLib Box is designed the be the EASIEST to use professional solution for local WordPress development. WPLib Box leverages the open-source tool Vagrant and either Oracle's open-source VirtualBox or commercial products from VMware. 

<a id="how-better"></a>
###How is WPLib Box Better?
All other Vagrant boxes for WordPress _(that we are aware of)_ start with a base Linux and then build the box _"from ground up"_ during the provision cycle installing Nginx or Apache, PHP, MySQL, etc.  Examples of this include [VVV](https://varyingvagrantvagrants.org/), [VIP QuckStart](https://vip.wordpress.com/documentation/vip/quickstart/) and [Trellis](https://roots.io/trellis/). This is both time consuming for provisioning, which you may need to do more than once, and also problematic if anything has changed that may break the provisioning process.

Instead WPLib Box _**pre-provisions**_ our box so you can `vagrant up` or `vagrant reload --provision` in around 30 seconds _(after the box is first downloaded)_, and almost eliminates the chance of our provisioning process breaking, unlike the other available solutions _(that we know of)_.

So WPLib Box does not view our `Vagrantfile` and related provisioning scripts as our product, our scripts are just _**examples**_ of how you can use our Box Image. Instead **we treat our Box Image as our product**, and our goal is to make it bulletproof and feature-rich with a goal that you will be able to get the web server stack you need with only configuration, and not with provisioning.


## Technical
<a id="wp-cli"></a>
### How do I Run WP-CLI?
[WP-CLI](http://wp-cli.org/) is installed in the WPLib Box virtual machine so to use it you first SSH into the 
box and then run your wp-cli command, for example:

    vagrant ssh
    wp plugin install hello-dolly
    
<a id="caching"></a>
### Why is WPLib Box Caching Things?
WPLib Box installs Redis for persistent object caching. To disable this simply rename `www/content/object-cache.php` to something like `object-cache.disabled.php`.  But we do [**have plans**](#plans) to add numerous ways to do this.
 
If you need to clear the cache the easiest way at the moment is to run `vagrant reload` from your development (host) computer.  

<a id="flush-cache"></a>
### How do I Flush the Redis Persistent Object Cache?
If you need to test with the persistent object cache, but you are running into the need to flush a corrupted cache you can simply run the following command from your host's command line:

    vagrant ssh
    redis-cli
    flushall
    exit

<a id="deploy"></a>
### How do I Deploy My Site from WPLib Box?
Deployment to a production or staging server is extremely simple. Just:

1. Copy the entire contents of the `www/` directory to the website root of the server where you are hosting your site.
2. Using a SQL client tool such as [Sequel Pro](http://www.sequelpro.com/) or [Navicat](https://www.navicat.com) export aka _"dump"_ your database to a `.sql` file.
3. Import your `.sql` file into your web host's [MySQL](https://www.mysql.com/) or [MariaDB](https://mariadb.com) server which may be referred to as _"executing"_ your SQL file.
4. Modify `www/wp-config-local.php` on your web host to use your web host's database credentials and any other configuration options that differ on your production or staging server.
5. In future deployments be sure not to overwrite your web host specific `www/wp-config-local.php` file.

And except for the following NOTE, that is it.

**NOTE:** You will need to run whatever process you normally run to change the URLs from your local URLs to your production or staging URLs. 
There are many solutions to this although not one ideal solution thus explaining how to do this is out of the scope of this FAQ. But 
[let us google it for you](https://www.google.com/#q=changing%20urls%20when%20moving%20wordpress%20site%20-codex).


<a id="new-projects"></a>
### How do I Use WPLib Box on New Projects? 
To use WPLib Box on new projects just copy the `Vagrantfile` and the `scripts/` directory from this repository to your new project and change 
the domain name to the local domain name for your project.  The only _”constraint” (that we are currently aware of)__ is you will need to have 
your website root in a `www/` directory that is a sibling to `Vagrantfile` and to `scripts/` but otherwise it should all just work using `vagrant up`.

**NOTE:**: You do not have to organize the WordPress directory structures like we have with `/www/content` and `/www/wp`; you can easily use the 
standard directory layout used by WordPress core e.g. `www/wp-content/` and `www/`, respectively.

<a id="existing-projects"></a>
### How do I Use WPLib Box on Pre-Existing Projects?
To use for an existing project, you follow the same instructions as for new projects; copy the `Vagrantfile` and the `scripts/` directory from 
this repository to your new project, change the domain name to the local domain name for your project and move your website root into a `www/` 
directory that is a sibling to `Vagrantfile` and to `scripts/` and then `vagrant up`.

If you cannot put your code into a `www/` subdirectory for some reason you can put the `Vagrantfile` in your web root and change the line that 
starts with `config.vm.synced_folder` to be:
 
     config.vm.synced_folder ".", "/var/www" 

If you cannot create a `scripts/` directory in the same directory as your `Vagrantfile` you can name that directory something else &mdash; such as 
`wplib-scripts/` &mdash; and then search for `scripts/` in your `Vagrantfile` and replace it with whatever you named your directory, e.g. 
with `wplib-scripts/` as in our example.

<a id="composer"></a>
### How do I Configure Composer to Work with WPLib Box?
Configure `composer.json` however you like; WPLib Box is agnostic with respect to Composer. 

Yes, we do include a `composer.json` with our WPLib Box repository but only so that WPLib Box will just work, **out-of-the-box** _(yeah, sorry for the pun!)_

<a id="import-db"></a>
### How do I Import a MySQL Database?
When the box is created, a default WordPress database is installed. If you need to import a different dataset or restore a backup of the data, you can simply `vagrant ssh` into the guest and perform a MySQL import.

To do this, simply do the following from your host's command line: 

    vagrant ssh
    mysql -u wordpress -pwordpress wordpress < /path/to/sql/file
    
For this we use the convention that the `default.sql` file is the file used to initialize the MySQL database. To initialize the DB use the following commands:

    vagrant ssh
    mysql -u wordpress -pwordpress wordpress < /vagrant/sql/default.sql

If you have a live database you may want to dump the database to the `/sql/` directory in your project root `default.sql` and then the above command run within `vagrant ssh` will support importing your default database.

<a id="php-versions"></a>
### How do I Switch PHP Versions?
The PHP version in use by the site is set in the Nginx vhost configuration. Our intention is to provide a control panel to simplify this process, but currently
you must edit this file manually. This file is located at `/etc/nginx/sites-available/default`.
To change to PHP 7, you must change the line `set $sock php5.6-fpm.sock;` to `set $sock php7.0-fpm.sock;`.
This can be accomplished by connecting to the guest machine via ssh:

    cd project-directory
    vagrant ssh
    sudo nano /etc/nginx/sites-available/default
    
Change the pertinent line. Press `CTRL-X` to exit the program. When prompted to save the buffer, press `ENTER`. The filename will appear. Press `ENTER` again. Then enter the command `sudo service nginx restart`.
Visit [http://wplib.box/phpinfo.php](http://wplib.box/phpinfo.php) (or whatever domain name you have configured for the box) to verify.

<a id="access"></a>
### How do I Get a URL to Provide Access to My Box's Site From the Internet?

The WPLib Box image has [localtunnel.me](https://localtunnel.me) pre-installed in the box. Simply run these commands from your host's command line:

    vagrant ssh
    lt --port 80
    
This will provide you with a URL to share the local site until you exit the command by either terminating the program or shutting down the machine.

You can also use [Vagrant Share](https://www.vagrantup.com/docs/share).

<a id="vscode-debug"></a>
### How do I debug with Visual Studio Code?

The configuration file for Visual Studio Code is already included in the respository. Ensure that you have installed the [PHP Debug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) extension for Visual Studio Code.

<a id="adminer"></a>
### How do I access Adminer?

[Adminer](https://www.adminer.org/) is a web front end to administer the MySQL server. End users can access Adminer at [http://adminer.wplib.box](http://adminer.wplib.box).

<a id="mailhog"></a>
### How do I access MailHog?

[MailHog](https://github.com/mailhog/MailHog) is an email testing tool for development purposes. In WPLib Box, all outgoing emails are captured and available for inspection via the MailHog interface: [http://mailhog.wplib.box](http://mailhog.wplib.box).
##Glossary 

<a id="glossary"></a>
### What Do All These Terms Mean?

The following are terms we have decide to use in our FAQ and in other documents.  If any of these terms conflict with broader industry terms please submit a pull request with any suggested corrects. 

Otherwise, there they are:

- **Virtual Machine**: A file, or more correctly a collection of files that together contain a bit-for-bit image of a physical computer to enable emulation of the computer using software running on another computer aka the _"Host"_ computer.  The host software that WPLib currently supports is VirtualBox _(free and open-source)_ and VMware _(commercial.)_  We may also support Parallels in the future; if that is important to you [please let us know](https://github.com/wplib/wplib-box/issues/56).
- **Host Computer**: The _(typically)_ physical computer with which a developer writes code and runs their [IDE](https://www.jetbrains.com/phpstorm/)/[editor](https://www.sublimetext.com/) to runs Vagrant that then _"Hosts"_ WPLib Box inside of VirtualBox, which also runs on the Host Computer.
- **Guest Computer**: The Virtual Machine running on the Host Computer.
- **Software Stack**: The collection of software used by a (Virtual) Machine  to perform its role. To host WordPress within a VM, even for local development the Software Stack might consist of a web server like Nginx or Apache, a database server like MySQL or MariaDB and a version of PHP such as 5.6 or 7.0. More advanced use cases &mdash; include WPLib Box &mdash; use a more conplex software stack.
- **Provisioning**: To install and configure the Software Stack required for a specific use-case. 
- **Box Image**: A digital file containing the bits of a Virtual Machine and its hard disk(s). The Box Image may or may not have been _"Provisioned"_ over and above what the Linux distribution provides by default. The WPLib Team pre-provisions the WPLib Box Software Stack which is why WPLib Box is so easy to use. And our Box Image is based on an Ubunutu image. You can see the history of [WPLib Box Images at Hashicorp's Atlas](https://atlas.hashicorp.com/wplib/boxes/wplib) repository of available Vagrant Boxes for download.
- **Vagrant Box**: A `Vagrantfile` which is a specialized Ruby script that runs to download a _"Box Image"_, possibly Provisions it beyond the base box, set the local IP address for the Virtual Machine.
- **Local Box Image Cache**: Vagrant downloads pristine copies of Box Images to a local cache to allow it to quickly copy the box to a project directory the first time `vagrant up` is run for a project, or after a `vagrant destroy` is run. Your Local Box Image Cache [is located at](http://stackoverflow.com/a/10226134/102699):
    - Mac OS X and Linux: `~/.vagrant.d/boxes`
    - Windows: `C:/Users/{username}/.vagrant.d/boxes`
- **Project Box Image**: Although Vagrant maintains pristine copies of Box Images in the Local Box Image Cache it makes a copy of that box for each of your projects and stores that copy in `~/VirtualBox VMs` (on Mac & Linux) and in `???` (on Windows.) It also creates a `vagrant` directory in your project to maintain information about the copy of the Box Image used by the project. For example, if you `vagrant ssh` into a running Vagrant Box and make configuration changes those changes will be in the Project's Box Image, but not in the`
pristine copies of Box Image nor in other projects that share the same named Box Image. 
### Suggest a New FAQ Question & Answer
If you have figured something out about WPLib that we have not documented, please help out your 
fellow developers [**fork this repo**](https://github.com/wplib/wplib-box) then 
[**submit a pull request**](https://github.com/wplib/wplib-box/compare).

##Support
<a id="no-answer"></a>
### Don't See the Answer Here?
Feel free to ask questions using our [GitHub issue tracker](https://github.com/wplib/wplib-box/issues/new). 
When you do please assign your issue the _"question"_ label. 

<a id="need-help"></a>
### Want to Try WPLib Box But Need Help?
Don't worry, contact us as we are happy to help you get it set up for your environment. We will be happy to send you an invite to connect with on on [ScreenHero](http://screenhero.com) and we can walk you through setup on your machine. [**Email us**][1] to get started.
    
##Business
<a id="biz-model"></a>
### What is our Business Model?
We are a consulting company that is transitioning to a product company that offers products and services
for improving Developer Experience for PHP developers who have chosen to use WordPress as a platform. 

If you have idea ahout how we could help your development organization with workflow please [**contact
us**][1] with your ideas and we'll see if we can help. 

<a id="services"></a>
### What Services Can The WPLib Team Offer Your Company?
Do you think your company might benefit from:

1. A **Hosting-company Specific** Vagrant Box for your Customers?
2. A **Customized Stack** in a Vagrant Box for your company's developers? 
4. **Delivering Your Plugins or Theme** inside your own Vagrant Box?
3. **Sponsoring a Named Version** of the WPLib box for public distribution?
5. **Demos of your WordPress-based Web Apps, Plugins or Themes** without exposing source code? 

If any of those ideas intrigue you, reach out and [contact us][1].

##Future 
<a id="roadmap"></a>
### What Are the Plans/Roadmap for WPLib Box?
We have a lot of ideas and some plans but do not yet have enough feedback to determine an appropriate roadmap.  What we can say is that we plan to make many of the manual configuration processes be adjustable via:

1. Command Line Interface (CLI)
2. Admin Console at [wplib.box](http://wplib.box)
3. Via the WordPress Debug Bar
4. Via an RESTful API that will enable #1-#3 above


 [1]: mailto:team@wplib.org

