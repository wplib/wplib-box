# WPLib Box FAQ

## What is WPLib Box?
WPLib Box is designed the be the EASIEST to use professional solution for local WordPress 
development. WPLib Box leverages the open-source tool Vagrant and either Oracle's open-source 
VirtualBox or commercial products from VMware. 

## How do I Run WP-CLI?
[WP-CLI](http://wp-cli.org/) is installed in the WPLib Box virtual machine so to use it you first SSH into the 
box and then run your wp-cli command, for example:

    vagrant ssh
    wp plugin install hello-dolly
    
##Glossary: What Do They All These Terms Mean?
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
- 
- VirtualBox to copies the Box Inage your Vagrantfile specifies into a hidden directory  local cache to allow it to quickly copy the box to a project directory the first time `vagrant up` is run for a project, or after a `vagrant destroy` is run. Your Local Box Image Cache [is located at](http://stackoverflow.com/a/10226134/102699):
    - Mac OS X and Linux: `~/.vagrant.d/boxes`
    - Windows: `C:/Users/{username}/.vagrant.d/boxes`


    
---

## What is our Business Model?
We are a consulting company that is transitioning to a product company that offers products and services
for improving Developer Experience for PHP developers who have chosen to use WordPress as a platform. 

If you have idea ahout how we could help your development organization with workflow please [**contact
us**](mailto:team@wplib.org) with your ideas and we'll see if we can help. 

## What Services Can We Offer Your Company?
Do you think your company might benefit from:

1. A **Hosting-company Specific** Vagrant Box for your Customers?
2. A **Customized Stack** in a Vagrant Box for your company's developers? 
4. **Delivering Your Plugins or Theme** inside your own Vagrant Box?
3. **Sponsoring a Named Version** of the WPLib box for public distribution?
5. **Demos of your WordPress-based Web Apps, Plugins or Themes** without exposing source code? 

If any of those ideas intrigue you, reach out and [contact us](mailto:team@wplib.com).  

## Suggest a New FAQ Question & Answer
If you have figured something out about WPLib that we have not documented, please help out your 
fellow developers [**fork this repo**](https://github.com/wplib/wplib-box) then 
[**submit a pull request**](https://github.com/wplib/wplib-box/compare).

## Don't See the Answer Here?
Feel free to ask questions using our [GitHub issue tracker](https://github.com/wplib/wplib-box/issues/new). 
When you do please assign your issue the "question" label, if you can remember to. 

## Want to Try it But Need Help?
Don't worry, if you can speak English or can type English we are happy to help you install and configure WPLib for as little as $35.

We are using [**Fiverr**][1] to allow people to request help. [**Click Here**][1] to get started.
 
 [1]: https://www.fiverr.com/mikeschinkel/walk-you-thru-installing-a-local-stack-for-wordpress-development-on-your-machine
