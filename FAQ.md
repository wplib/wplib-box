# WPLib Box FAQ

## Table of Contents
### Overview
- [What is WPLib Box?](#what-is)
- [How is WPLib Box Better?](#how-better)

### Support
- [Quick Help via Slack Chat](#slack)
- [Scheduled Help via Screen Sharing](#screenhero)
- [Less Urgent Help via GitHub issues](#github-issues)

### Troubleshooting
- [VirtualBox will not install](#virtualbox-wont-install)
- [Vagrant will not install](#vagrant-wont-install)
- [The required Vagrant plugins are not found or installing](#vagrant-plugins-fail)
- [`vagrant up` is failing](#vagrant-up-fail)
- [`wplib.box` will not load in the browser / pinging _wplib.box_ times out](#wont-load)
- [No Answer Here](#no-answer)

### Technical Issues
- [WPLib Box is not working](#troubleshooting)
- [How do I Run WP-CLI?](#wp-cli)
- [Why is WPLib Box Caching Things?](#caching)
- [How do I Flush the Redis Persistent Object Cache?](#flush-cache)
- [How do I Deploy My Site from WPLib Box?](#deploy)
- [Why is the Directory Layout used Not _"Standard?"_](#why-non-standard-layout)
- [Can I use the Standard WordPress Directory Layout?](#changing-directory-layouts)
- [How do I Use WPLib Box on New Projects?](#new-projects)
- [How do I Use WPLib Box on Pre-Existing Projects?](#existing-projects)
- [How do I Configure Composer to Work with WPLib Box?](#composer)
- [How do I Import a MySQL Database?](#import-db)
- [How do I backup the MySQL database in the box?](#backup-db)
- [What PHP versions are available?](#php-versions)
- [How do I Switch PHP Versions?](#switch-php)
- [How do I Install PhpMyAdmin?](#phpmyadmin)
- [How do I Get a URL to Provide Access to My Box's Site From the Internet?](#access)
- [How do I Debug with Visual Studio Code?](#vscode-debug)
- [How do I access Adminer?](#adminer)
- [How do I access MailHog?](#mailhog)
- [How do I fix the Vagrant 1.8.6 Bug?](#vagrant-1.8.6-bug)
- [How do I switch from Nginx to Apache?](#webserver)
- [How do I switch from MySQL to MariaDB?](#database)
- [How do I see the logs for Docker container Foo?](#logs)

### Glossary
- [What Do They All These Terms Mean?](#glossary)

### Business
- [What is our Business Model?](#biz-model)
- [What Services can The WPLib Team Offer?](#what-services)

### Future
- [What Are the Plans/Roadmap for WPLib Box?](#roadmap)

---

## Overview
<a id="what-is"></a>
###What is WPLib Box?
WPLib Box is designed the be the EASIEST to use professional solution for local WordPress development. WPLib Box leverages the open-source tool Vagrant and either Oracle's open-source VirtualBox or commercial products from VMware. 

<a id="how-better"></a>
###How is WPLib Box Better?
All other Vagrant boxes for WordPress _(that we are aware of)_ start with a base Linux and then build the box _"from ground up"_ during the provision cycle installing Nginx or Apache, PHP, MySQL, etc.  Examples of this include [VVV](https://varyingvagrantvagrants.org/), [V
QuckStart](https://vip.wordpress.com/documentation/vip/quickstart/) and [Trellis](https://roots.io/trellis/). This is both time consuming for provisioning, which you may need to do more than once, and also problematic if anything has changed that may break the provisioning process.

Instead WPLib Box _**pre-provisions**_ our box so you can `vagrant up` or `vagrant reload --provision` in around 30 seconds _(after the box is first downloaded)_, and almost eliminates the chance of our provisioning process breaking, unlike the other available solutions _(that we know of)_.

So WPLib Box does not view our `Vagrantfile` and related provisioning scripts as our product, our scripts are just _**examples**_ of how you can use our Box Image. Instead **we treat our Box Image as our product**, and our goal is to make it bulletproof and feature-rich with a goal that you will be able to get the web server stack you need with only configuration, and not with provisioning.

<a id="support"></a>
## Support

<a id="need-help"></a>
<a id="slack"></a>
### Quick Help via Slack
> _**PLEASE ask your questions in the #box channel.**_

[CLICK HERE](https://slackpass.io/wplib) to add yourself to our Slack account at [wplib.slack.com#box](https://wplib.slack.com/messages/box/). Then use the [**#box**](https://wplib.slack.com/messages/box/) channel in our Slack account to ask questions  or get quick help on installing or using WPLib Box or WP-related workflow via chat and/or [ScreenHero](https://screenhero.com/) _(we know that you cannot sign up for ScreenHero any more, but we can send you an invite; just direct message @mike via Slack and request a ScreenHero invite.)_

But we still encourage you to submit bugs and feature requests via [GitHub issues](#github-issues) though you can first chat with us to verify the bug or flesh out the feature request via Slack if you want to. 

<a id="screenhero"></a>
### Scheduled Help via Screen Sharing 
We can also schedule a time with you to screen share using [**ScreenHero**](https://screenhero.com/) to help you get WPLib Box up and running successfully and/or about WP-related workflow. _(We know that you cannot sign up for ScreenHero any more, but we can send you an invite; just direct message @mike [via Slack](#slack) and request a ScreenHero invite.)_

<a id="github-issues"></a>
### Less Urgent Help via GitHub issues
Finally you can submit a GitHub issue with bugs and/or feature requests. Feel free to [submit any issue](https://github.com/wplib/wplib-box/issues/new) about WPLib Box, especially feature requests or to discuss integrating other open-source software with the box. When you do please assign your issue the _"question"_ label. 

<a id="troubleshooting"></a>
## Troubleshooting/WPLib Box is not working

<a id="not-working"></a>
### WPLib Box is not working
There are several reasons for this, and depending on what steps are failing there are different solutions:

<a id="virtualbox-wont-install"></a>
### VirtualBox will not install
 
Please first try Googling the error messages you get when trying to install. 

VirtualBox is independent of WPLib Box and you will ofter find solutions from their support before you find solutions from us. But if you are still stuck after then please do [contact us for support](#support).

<a id="vagrant-wont-install"></a>
### Vagrant will not install

Please first try Googling the error messages you get when trying to install. 

VirtualBox is independent of WPLib Box and you will ofter find solutions from their support before you find solutions from us. But if you are still stuck after then please do [contact us for support](#support).

<a id="vagrant-plugins-fail"></a>
### The [required Vagrant plugins](https://github.com/wplib/wplib-box#required-software) are not found or installing.

Please first try Googling the error messages you get when trying to install. 

These Vagrant plugins are independent of WPLib Box and you will ofter find solutions from their support before you find solutions from us. But if you are still stuck after then please do [contact us for support](#support).

<a id="vagrant-up-fail"></a>
### _vagrant up_ is failing
 
Try running `vagrant up --debug` to see if it can reveal any issues with your system that you are able to correct.  You may want to redirect to a debug log so you can read the output in your text editor:
<a id="vagrant-debug"></a>
       
    vagrant up --debug > vagrant.log 2>&1

If you can't find discover the problem and determine the solution using the `--debug` switch please provide your `vagrant.log` when [requesting support](#support).

<a id="wont-load"></a>
### _wplib.box_ will not load in the browser / pinging _wplib.box_ times out

First check to see what version of Vagrant you are running by running the following in your terminal/command line:

    vagrant -v

If you are running Vagrant 1.8.6 upgrade your Vagrant; see [Vagrant-1.8.6-bug](#vagrant-1.8.6-bug) to understand why.  If not please run [`vagrant reload --debug`](#vagrant-debug) and provide your `vagrant.log` when [requesting support](#support).
    
<a id="no-answer"></a>
### No Answer Here
 
If none of the items listed above nor any of the FAQs listed below or in the general [README](README.md) solve your problem please contact us for help either via [**Slack**](#slack) or by [**posting an issue**](#github-issues) here on GitHub.  We really do want to make sure everyone can be successful with WPLib Box and are more than happy to help.

   When [requesting support](#support) please provide any information you can such as a [debug log](#vagrant-debug) and/or anything else you can tell us about your computer setup.
		
<a id="tech-issues"></a>
## Technical Issues

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

<a id="tech-issues"></a>
## Technical Issues

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

<a id="why-non-standard-layout"></a>
### Why is the Directory Layout used Not _"Standard?"_

By default WPLib Box uses the [WordPress Skeleton](https://markjaquith.wordpress.com/2012/05/26/wordpress-skeleton/) layout published by Mark Jaquith in 2011. We chose it because unlike the standard WordPress directory layout it is [Composer](https://getcomposer.org/)-friendly which is almost a requirement these days for professional-level  PHP development. 

But if you are not yet using Composer or don't feel you have the need for it you can you the _"Standard"_ WordPress directory layout instead. See the three (3) simple approaches that follow in the next FAQ.

<a id="changing-directory-layouts"></a>
### Can I use the Standard WordPress Directory Layout?

Absolutely. 

To be clear we assume you mean the directory layout that has the following subdirectories:

    /wp-admin/
    /wp-content/
    /wp-includes/
    
_(Those directories are the exact layout you'll see in a download of WordPress from WordPress.org.)_

#### The Manual Approach
To use the Standard WordPress directory layout open up Mac Finder or Windows Explorer and navigate to your project's `/www` directory _(the project directory is the one containing `Vagrantfile` and the `/scripts` folder.)_ Then do the following:

1. Delete the `/www/wp/wp-content` directory; you don't need it. _(Uh, after checking you did not store anything in `/www/wp/wp-content` by accident. If you did, move it out then delete the directorty.)_

2. Move all the remaining files and directories up one level in the directort hierarchy; from `/www/wp` to `/www`.

3. Rename `/www/content` to `/www/wp-content`

4. Delete `/www/wp`

5. In your IDE/text editor open `www/index.php` and then change the code from `'/wp/wp-blog-header.php'` to `'/wp-blog-header.php'` _(e.g. remove the leading `/wp` from the filepath.)_

6. Rename `/www/../composer.json` to `/www/../composer.json.save` and delete `/www/../composer.lock` _(since you can no longer use Composer with this directory layout structure. Note: `composer.*` is in the project root directory.)_ 

7. That's it, you are done! WPLib Box now in _"Standard"_ WordPress directory layout.

#### The Script Approach

Or you can run this script, if you feel confident in doing so. First `vagrant ssh` to enter the box and then run the following commands:
    
    cd /var/www
    mv wp/*.* .
    
    mv wp/wp-admin/ .
    mv wp/wp-includes/ .
    mv content/ wp-content/
    
    rm -rf wp/
    
    sed -i "s#/wp/wp-blog-header.php#/wp-blog-header.php#" index.php
 
#### The CLI Approach _(Experimental)_ 

Or lastly you can try our experimental/alpha _"Inside-the-Box"_ [**Box CLI**](https://github.com/wplib/box-cli). After you make sure you have the latest version of WPLib Box just run:

	vagrant ssh
	box set-directory-layout-standard
	
Even better, if you want to switch back to _"Skeleton"_ layout, we have a command for that too:

	vagrant ssh
	box set-directory-layout-skeleton

<a id="new-projects"></a>
### How do I Use WPLib Box on New Projects? 
To use WPLib Box on new projects just copy the `Vagrantfile` and the `scripts/` directory from this repository to your new project and [change 
the domain name](https://github.com/wplib/wplib-box#setting-the-domain-name) to the local domain name for your project.  The only _”constraint” (that we are currently aware of)_ is you will need to have 
your website root in a `www/` directory that is a sibling to `Vagrantfile` and to `scripts/` but otherwise it should all just work using `vagrant up`.

**NOTE:**: You do not have to organize the WordPress directory structures like we have with `/www/content` and `/www/wp`; you can easily use the 
standard directory layout used by WordPress core e.g. `www/wp-content/` and `www/`, respectively.

<a id="existing-projects"></a>
### How do I Use WPLib Box on Pre-Existing Projects?
To use for an existing project, you follow the same instructions as for new projects; copy the `Vagrantfile` and the `scripts/` directory from 
this repository to your new project, [change the domain name](https://github.com/wplib/wplib-box#setting-the-domain-name) to the local domain name for your project and move your website root into a `www/` 
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

To do this, first copy your MySQL database dump to a `/sql` sub directory in your project directory _(your `Vagrantfile` is in your project directory.)_  Assuming you called your database dump `my-db.sql` then run the following commands in your host computer's command line/terminal window when in your project directory:

    cd /your/project/directory
    vagrant ssh
    box import-db my-db.sql
Be sure to [backup your database](#backup-db) **BEFORE** you run the `import-db` command.
    
<a id="backup-db"></a>
### How do I backup the MySQL database in the box?
If you have a live database inside of WPLib Box you may want to backup the database to the `/sql/` directory in your project root.  You can do that like so:

    cd /your/project/directory
    vagrant ssh
    box backup-db
    
The above commands will backup your database to `/your/project/directory/sql/current.sql`.  If there already was a `current.sql` it will be renmed to `previous1.sql` and `1` will be incremented each time there is a new backup.
    
<a id="php-versions"></a>
### Which PHP Versions are Available?
Currently, the box has PHP 5.6, and PHP 7.0. The PHP is installed from the 
`ondrej/php` [repository](https://launchpad.net/~ondrej/+archive/ubuntu/php).
_(Please note: most answers one might find on the internet regarding 
`How do I install X module on Ubuntu` are based on previous versions of
this repository which only installed one version of PHP on the OS.
As such, they will be of no use in this use case.)_ 
  
The configuration directory structure is as follows:
- /etc
    - /php
        - /5.6
            - /cli
            - /fpm
            - /mods-available
        - /7.0
            - /cli
            - /fpm
            - /mods-available
 
 All modules installed are configured for both versions of PHP.

<a id="switch-php"></a>
### How do I Switch PHP Versions?
The PHP version in use by the site is set in the Nginx vhost configuration. Our intention is to provide a control panel to simplify this process, but currently you must edit this file manually. This file is located at `/etc/nginx/sites-available/default`.
To change to PHP 7, you must change the line `set $sock php/php5.6-fpm.sock;` to `set $sock php/php7.0-fpm.sock;`. To use HHVM, change it to `set $sock hhvm/sock`.

This can be accomplished by connecting to the guest machine via ssh:

    cd project-directory
    vagrant ssh
    sudo nano /etc/nginx/sites-available/default
    
Change the pertinent line. Press `CTRL-X` to exit the program. When prompted to save the buffer, press `ENTER`. The filename will appear. Press `ENTER` again. Then enter the command `sudo service nginx restart`.
Visit [http://wplib.box/phpinfo.php](http://wplib.box/phpinfo.php) (or whatever domain name you have configured for the box) to verify.

<a id="phpmyadmin"></a>
### How do I Install PhpMyAdmin?
We decided not to include phpMyAdmin in the core box image because it installs files for Apache that we don't need so we decided to make it optional. 

To install phpMyAdmin look for the instructions [**here**](https://github.com/wplib/wplib-box/issues/117#issuecomment-230113032).

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

[Adminer](https://www.adminer.org/) is a web front end to administer the MySQL server. End users can access Adminer at http://adminer.{your-domain}. If you have not changed the box domain name, that would be [http://adminer.wplib.box](http://adminer.wplib.box).

The credentials are:

+ Host: 172.17.0.1
+ Username: wordpress
+ Password: wordpress
+ database: wordpress


<a id="mailhog"></a>
### How do I access MailHog?

[MailHog](https://github.com/mailhog/MailHog) is an email testing tool for development purposes. In WPLib Box, all outgoing emails are captured and available for inspection via the MailHog interface: [http://mailhog.wplib.box](http://mailhog.wplib.box). If you have changed the box domain, you can use http://mailhog.{your-domain}.

<a id="vagrant-1.8.6-bug"></a>
### How do I fix the Vagrant 1.8.6 Bug?

Vagrant `1.8.6` appears to have an issue with auto-configuring its network. Until this is fixed by Vagrant there is a workaround which requires you to SSH into the box after `vagrant up`. It is not difficult &mdash; the instructions appear longer than the task itself &mdash; just follow these steps:

1. Once your box is running _(after a `vagrant up`)_ run `vagrant ssh`.
2. Once _"inside"_ WPLib Box type `sudo nano /etc/network/interfaces` to load the network config into the Nano editor.
3. Look for the second _(2nd)_ occurence of `auth eth0` and change it to `auth eth1`.

4. Also change the `eth0` in the next line _(`iface eth0 inet static`)_ to be `eth1`. The result should be `iface eth1 inet static`.
5. Delete both lines that begin with `#VAGRANT-` by moving your cursor to those lines and pressing `Ctrl-K` once for each line.
6. Save the file by pressing `Ctrl-O` then pressing `[Enter]`.

7. Exit the editor with `Ctrl-X`.
8. Exit _"inside"_ WPLib Box _(the SSH session)_ by typing the `exit` command.

If you somehow mess up while editing you can exit Nano and start over by pressing `Ctrl-X` then pressing `N` _(for "No")_ when it asks you if you want to _"Save the buffer?"_.

In addition you need to make a simple change to `Vagrantfile` using whatever editor you normally use to edit code. Find the following line in `Vagrantfile` around line `264`:

    config.vm.network 'private_network', ip: IO.read('IP').strip

And add `, auto_config: false` to the end, like so:

    config.vm.network 'private_network', ip: IO.read('IP').strip, auto_config: false

Then run `vagrant reload`.  This should fix it.  

Also you should not need to revert that after upgrading to a new version of Vagrant **_unless_** you need to [change the box's IP address](README.md#change-ip).

<a id="webserver"></a>
### How do I switch from Nginx to Apache (or vice versa)?
By default, WPLib Box uses Nginx as its webserver. However, Apache is available and can be switched out with Nginx.
The box CLI has a command, `set-web-server` to accomplish this.

For example, to switch from Nginx to Apache:
 
+ Log in to the box using `vagrant ssh` on your host machine.
+ Enter the following command: `box apache` to make Apache the running webserver.
+ Conversely, you can `box nginx` to switch from Apache to Nginx.

<a id="database"></a>
### How do I switch from MySQL to MariaDB (or vice versa)?
The box runs MySQL as the default database, however MariaDB is available. To configure the box to use
MariaDB instead, use the `box` command _(which will dump the contents of
the current database and import into the new database)_:

+ Log in to the box using `vagrant ssh` on your host machine.
+ Enter the following command: `box mariadb` to use MariaDB.
+ Conversely, you can `box mysql` to switch from MariaDB to MySQL.

<a id="logs"></a>
### How do I see the logs for Docker container Foo?
The logs for a Docker container can be viewed using the command `docker logs foo`, where `foo` is the name of the
container whose logs you wish to view.

In the case of the webserver containers, these logs contain both the access and error log entries.

## Glossary 

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
    - Windows: `C:\Users\{username}\.vagrant.d\boxes`
- **Project Box Image**: Although Vagrant maintains pristine copies of Box Images in the Local Box Image Cache it makes a copy of that box for each of your projects and stores that copy in `~/VirtualBox VMs` (on Mac & Linux) and in `C:\Users\{username}\VirtualBox VMs` (on Windows.) It also creates a `vagrant` directory in your project to maintain information about the copy of the Box Image used by the project. For example, if you `vagrant ssh` into a running Vagrant Box and make configuration changes those changes will be in the Project's Box Image, but not in the`
pristine copies of Box Image nor in other projects that share the same named Box Image. 
### Suggest a New FAQ Question & Answer
If you have figured something out about WPLib that we have not documented, please help out your 
fellow developers [**fork this repo**](https://github.com/wplib/wplib-box) then 
[**submit a pull request**](https://github.com/wplib/wplib-box/compare).

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
