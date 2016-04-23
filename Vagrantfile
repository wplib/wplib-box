# -*- mode: ruby -*-
# vi: set ft=ruby :

#
# Welcome to WPLib Box!
#
#       The EASIEST Way to Setup a Local WordPress Development
#        Environment, using Vagrant
#
#       Brought to you by The WPLib Team at;
#
#            - http://github/wplib
#
#   README FIRST!:
#
#       Before you jump down into the the docs in this file you should
#       probably just skim the README.md first:
#
#           - https://github.com/wplib/wplib-box/blob/master/README.md
#
#   BACKGROUND:
#
#       You typically find this named "Vagrantfile" as the result of
#       running the followingcommands:
#
#           - git clone https://github.com/wplib/wplib-box
#           - cd wplib-box
#
#   INITIAL USAGE:
#
#       Once you have this Vagrantfile and assuming you have already
#       VirtualBox, Vagrant and the two (2) required Vagrant plugins
#       installed (see the README mentioned above if you do not) then
#       you can start your WPLib Box with this one (1) simple command
#       from your terminal window on Mac OS X or Linux or via git-bash
#       or PowerShell on Windows (again, see the README):
#
#           - vagrant up
#           - open "wplib.box"
#
#       The second line just opens the wplib.box within your default
#       browser, or you can do it manually by opening your browser and
#       navigating to http://wplib.box.
#
#       If that did not work some reason that try reloading with the
#       "reprovision" option:
#
#           - vagrant reload --provision
#           - open "wplib.box"
#
#       If that still did not work, try our the troubleshooting FAQ:
#
#           - https://github.com/wplib/wplib-box/blob/master/FAQ.md#troubleshooting
#
#   REFERENCE:
#
#       config.vm.box = "wplib/wplib"
#
#           This line specifies the VM "box" image which is hosted for
#           download on Hashicorp's Atlas Vagrant Box Repository here:
#
#               https://atlas.hashicorp.com/wplib/boxes/wplib
#
#           This box image is a pre-provisioned Ubuntu Linux 14.04 LTS
#           with nginx, MySQL, PHP5.6 and more; essentially everything
#           a Linux server needs to be able to serve WordPress pages.
#
#           In many ways -- compared to Vagrant boxes like VVV and VIP
#           Quickstart -- this is WPLib's "secret sauce."
#
#       config.vm.hostname = "wplib.box"
#
#           This line specifies the domain name your browser should be
#           able to load the WordPress site running inside this box.
#
#           To CHANGE the domain name to use to when loading the box's
#           website in your browser you only need to change this line;
#           change "wplib.box" to your preferred local domain name and
#           then run "vagrant reload" in your terminal.
#
#           Of course your computer's hosts file must contain the IP
#           address used by the box for your browser to use it to load
#           WordPress but if you have the Vagrant hosts-updater plugin
#           then it will handle updating the hosts file for you.
#
#       File.write('IP', "10.#{rand(254)}.#{rand(254)}.#{rand(254)}")\
#           if not File.exists?('IP')
#
#           This line creates a randomly-generated and non-routable IP
#           address starting with 10 and randomly selects from 0..254
#           for the remaining three octets. It then writes the IP
#           address to a file named 'IP' in the project's root folder
#           which is the same folder where this Vagrantfile is found
#           to ensure future runs of "vagrant up" or "vagrand reload"
#           will use the same IP address.
#
#           The assumption here is that it is very unlikely that this
#           randomly-generated IP address will conflict with anything
#           that is already on the host computer's local network, or
#           at least make it less likely to see a conflict than if we
#           picked a well-known static IP address that every WPLib Box
#           would start with.
#
#           Thus we believe that using a randomly-generated IP address
#           will make it easier for more than 99% of developers who
#           choose to at least evaluate WPLib Box, although someone
#           may occasionally need to debug why it is not working.
#
#           If we can find a better approach later, we will be happy
#           to switch to it.
#
#       config.vm.network 'private_network', ip: IO.readlines('IP')[0].strip
#
#           This line tells Vagrant what IP address to use for the VM.
#           It loads the IP address from the file named "IP" that
#           previously created by File.write().
#
#           The IP file can be found in in the project root after the
#           first "vagrant up"; the project root is the same directory
#           that contains this Vagrantfile.
#
#           If you want to specify a specfic IP address you can either
#           edit the "IP" file, or you can change the line which
#           contains "private_network" and instead hardcode the IP
#           address into the Vagrantfile; as in the following example:
#
#               config.vm.network 'private_network',ip:"192.168.99.99"
#
#       config.vm.synced_folder "www", "/var/www"
#
#           This line tells Vagrant to "mount" the "www" folder in the
#           host computer's project's folder and on peer with this
#           Vagrantfile as a symlink named "/var/www" inside the VM.
#
#           The folder "/var/www" inside the virtual machine and is
#           where the nginx web server running in the VM will look for
#           it's website root.
#
#           The upshot of this is it will allow a developer to store
#           all of a project's source code on their host computer
#           and yet still have the nginx server in the VM reload the
#           files instantaneously after an edit (assuming the user
#           presses the refresh key on the browser. We do not have any
#           a fully automatic refresh built into WPLib Box, yet.)
#
#           Further, developers will not have to worry about loosing
#           uncommitted source code if the VM is delete or otherwise
#           corrupted because all source will be on the developer's
#           computer, where it belongs.
#
#       config.ssh.forward_agent = true
#
#           This line enables the virtual machine (or the provisoners
#           like Ansible or Puppet if WPLib Box used them) to access
#           Git or Bitbucket repositories on behalf of the developer's
#           Git or BitBucket accounts by allowing the SSH "agent" on
#           the developer's machine by 'forwarding' the user's SSH key
#           stored on the developer's machine.
#
#           WPLib Box does NOT _currently_ need this but we have plans
#           that will require it so it is easier to simply include it
#           now.
#
#           To learn more about Vagrant and SSH Agent Forwarding here
#           is a well-written blog post that explains it well:
#
#               - https://www.phase2technology.com/blog/running-an-ssh-agent-with-vagrant/
#
#           In addition you can find more detailed technical info on
#           GitHub's website here:
#
#               - https://developer.github.com/guides/using-ssh-agent-forwarding/
#
#       config.ssh.insert_key = false
#
#           This line tells Vagrant not to insert a new private/public
#           SSH key pair and to go ahead and use the insecure SSH key
#           pair published by Hashicorp to that normally simplifies
#           using SSH with Vargant VMs.
#
#           This configuration option is used with "forward_agent" as
#           the box uses the SSN key from the host aka developer's
#           machine instead of using an insecure private key pair.
#
#           The security is not really the concern here since VMs used
#           for development rarely need to be secure. Instead this
#           option simply assumes the developer has an SSH key already
#           installed on their computer so it uses it instead.
#
#           See these links to learn more about "insert_key"
#
#               - https://github.com/mitchellh/vagrant/tree/master/keys
#               - https://twitter.com/mitchellh/status/525704721714012160
#
#       config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"
#
#           This line is a TEMPORARY HACK that stops Vagrant from
#           displaying an unimportant error. See this issue for more
#           information:
#
#               - https://github.com/wplib/wplib-box/issues/49
#
#           This line will be removed as soon as issue 49 is resolved.
#
#       config.vm.provision "shell", path: "scripts/provision.sh"
#
#           This line tells Vagrant to run the bash script named
#           "provision.sh" found in the "scripts" folder which is in
#           the same folder where Vagrantfile is located.
#
#           This provision script runs a few quick commands, such as
#           importing "/sql/default.sql" which is the default MySQL
#           file, and symlinking the "object-cache.php" file into the
#           "/wp-content/" folder from the folder of the plugin that
#           provides it.
#
#           This provision script will only be run the first time a
#           "vagrant up" command is run, or when the "--provision"
#           option is selected when running "vagrant reload."
#
#   REUSE:
#
#       When you cloning the WPLib Box repository you are getting an
#       "appliance" for WordPress local development that is designed
#       to "just work" if at all possible.
#
#       However once comfortable with WPLib Box few developers will
#       want to start a problem by first using "git clone" on the
#       github.com/wplib/wplib-box repository. In point of fact, we
#       don't even use WPLib Box in that manner.
#
#       Instead developers will want a recipe for how to use WPLib
#       Box in their projects with the least effort required. And
#       that is exactly how WPLib Box is intended to be used once
#       a developer becomes familiar with it.
#
#       TO START A NEW PROJECT using WPlib Box, or to use WPlib Box on
#       and existing project is as simple as:
#
#           1. Copy this file into a new Vagrantfile in your project.
#
#           2. Change config.vm.hostname = "wplib.box" to replace the
#              value of "wplib.box" with the local development domain
#              of your project, e.g. "dev.example.com"
#
#           3. Either delete the link with config.vm.provision "shell"
#              or copy "scripts/provision.sh" and modify it to run
#              any simply provisioning you need for your project such
#              as symlinking "object-cache.php", if applicable.
#
#           4. Run "vagrant up" in your projects folder where your
#              Vagrantfile is located.
#
#           5. And that is it! No more steps. :-)
#
#       Once you've done the above you should be able to load your
#       project's URL into your browser.
#
#       But if that did not work try our troubleshooting FAQ here:
#
#           - https://github.com/wplib/wplib-box/blob/master/FAQ.md#troubleshooting
#

Vagrant.configure(2) do |config|

    config.vm.box = "wplib/wplib"
    config.vm.hostname = "wplib.box"

    File.write('IP', "10.#{rand(254)}.#{rand(254)}.#{rand(254)}") if not File.exists?('IP')
    config.vm.network 'private_network', ip: IO.readlines('IP')[0].strip

    config.vm.synced_folder "www", "/var/www"

    config.ssh.forward_agent = true
    config.ssh.insert_key = false

    config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"
    config.vm.provision "shell", path: "scripts/provision.sh"

end

