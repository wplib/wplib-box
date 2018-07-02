# -*- mode: ruby -*-
# vi: set ft=ruby :

#
# Welcome to WPLib Box!
#
#       The EASIEST Way to Setup Local WordPress Development
#
#       The functionality of WPLib Box is provided by Docker
#       Containers run within a VirtualBox Virtual Machine (VM)
#       where Vagrant automated VirtualBox.
#
#       ---------------------------------------------------------
#       The next version of WPLib Box will no longer use Vagrant!
#       ---------------------------------------------------------
#
#       Brought to you by The WPLib Team:
#
#            - http://github/wplib
#
#   READ THE DOCS FIRST!:
#
#       Before you jump down into the the docs in this file you should
#       probably skim the docs first:
#
#           - http://wplib.github.io/wplib-box/
#
#   BACKGROUND:
#
#       You typically find this named "Vagrantfile" as the result of
#       downloading and unzipping the following file:
#
#           - https://github.com/wplib/wplib-box/archive/0.16.0.zip
#
#   INITIAL USAGE:
#
#       Once you have this Vagrantfile and assuming you have already
#       installed VirtualBox, Vagrant and the two (2) required Vagrant
#       plugins (see the docs mentioned above if you do not) then
#       you can start your WPLib Box with this one (1) simple command
#       from your terminal window on Mac OS X or Linux or via git-bash
#       or PowerShell on Windows (again, see the README):
#
#           - vagrant up
#
#       Then you can test to see if WPLib Box is working by running:
#
#           - open "wplib.box"
#
#       You can also manually open your browser and navigate to the
#       local website at: http://wplib.box.
#
#       If that did not work for some reason then try reloading with
#       the "reprovision" option:
#
#           - vagrant reload --provision
#           - open "wplib.box"
#
#       If that still did not work, try our the troubleshooting FAQ:
#
#           - http://wplib.github.io/wplib-box/faq/troubleshooting/
#
#   REFERENCE:
#
#       config.vm.box = "wplib/wplib"
#
#           This line specifies the VM "box" image which is hosted for
#           download from Hashicorp's VagrantCloud Box Repository:
#
#               https://app.vagrantup.com/wplib/boxes/wplib
#
#           This box image is a pre-provisioned Ubuntu Linux 14.04 LTS
#           with Docker containers with every server a good WordPress
#           site needs to be able to serve WordPress pages.
#
#           Compared to Vagrant boxes like VVV and VIP Quickstart, this
#           prebuilt box is WPLib Box's "secret sauce."
#
#       config.vm.box_version = "0.16.0"
#
#           This line specifies the version of the VM "box" image to
#           download from Hashicorp's VagrantCloud Box Repository:
#
#           If you want to use a different version you can change the
#           value to match one of the other versions available at
#           Hashicorp's VagrantCloud Box Repository:
#
#               https://app.vagrantup.com/wplib/boxes/wplib
#
#       File.write('IP', "10.10.10.#{rand(10..250)}") if not File.exists?('IP')
#
#           This line creates a randomly-generated and non-routable IP
#           address starting with 10.10.10. and randomly selects the
#           final octet between 10 and 250. It then writes the IP
#           address to a file named `IP` in your project's root folder
#           which is the same folder where this Vagrantfile is found.
#           By writing the value into this `IP` file it ensure future
#           runs of "vagrant up" or "vagrant reload" will use the same
#           IP address and this make it less likely to get out of sync
#           in your local `hosts` file.
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
#       File.write('HOSTNAME', "wplib.box") if not File.exists?('HOSTNAME')
#
#           This line writes the host name of 'wplib.box' to a file
#           named `HOSTNAME` in the project's root folder, the same
#           folder in which this Vagrantfile is found. Writing this
#           file ensures future runs of "vagrant up" or "vagrant
#           reload" use the same host name unless of course you
#           change it, WHICH WE EXPECT YOU WILL.
#
#           The host name in this context is a domain name local to
#           your computer which you can access via your browser by
#           prefixing the host name with 'http://', for example
#           http://wplib.box or http://example.dev.
#
#           To change the host name of your WPLib Box simple edit the
#           `HOSTNAME` file to include only your preferred local host
#           name, e.g. `example.dev` or similar (but without the
#           quotes).
#
#       hostname = IO.read('HOSTNAME').strip;
#
#           This line reads the value in the file named `HOSTNAME`,
#           strips off any leading or trailing whitespace and then
#           assigns it to a Ruby variable named 'hostname' which is
#           local to this Vagrantfile.
#
#           If the previous line wrote the file then it will load
#           'wplib.box' otherwise it will load a host name that
#           you have changed the `HOSTNAME` file to include, such
#           as 'example.local' or similar (but without the quotes).
#
#       config.vm.hostname = hostname
#
#           This line specifies the domain name your browser should be
#           able to load the WordPress site running inside this box.
#
#           This value comes from the file named `HOSTNAME` which was
#           created and/or read into the Ruby variable 'hostname' in
#           the previous two lines.
#
#           To CHANGE the domain name to use to when loading the box's
#           website in your browser you only need to edit the `HOSTNAME`
#           file. This file could contain only the text of the local
#           domain name that you want to use to access the website on
#           running in your WPLib Box via your browser.
#
#           Of course your computer's hosts file must contain the IP
#           address used by the box for your browser to use it to load
#           WordPress but if you have the Vagrant hosts-updater plugin
#           then it will handle updating the hosts file for you.
#
#           Assuming you have that plugin, once you've updated the
#           `HOSTNAME` file run either "vagrant up" or "vagrant reload"
#           in your terminal to update your computer's 'hosts' file to
#           recognize this domain name when typed into your browser and
#           to load/reload your WPLib Box.
#
#       config.hostsupdater.aliases = [
#           "www.#{hostname}",
#           "adminer.#{hostname}",
#           "mailhog.#{hostname}"
#       ]
#
#           These lines specify additional domains that WPLib Box will
#           add to your hosts file (assuming you have the Vagrant
#           hosts-updater plugin) and thus WPLib Box will be able to
#           recognize when you request them from your browser.
#
#           You'll note the use the same (base) host name as the
#           prior line so look to its description for further details
#           on the hostname variable.
#
#           These lines add a 'www.' alias, domains for Adminer (which
#           is like phpMyAdmin, only better) and for Mailhog (that
#           captures outgoing email into a web email interface, great
#           for accessing the password change request emails that are
#           normally so hard to track down during development,
#           especially if sent to someone else's email address!)
#
#           You can add other domains here that you might need, such
#           as subdomains of your domain, if you have that need.
#
#       config.vm.provider :vmware_fusion do |vmware|
#           vmware.vmx["ethernet0.pcislotnumber"] = "33"
#       end
#
#           This is a configuration option needed only for the VMware
#           provider. You do not actually need it if you are not using
#           VMware, and actually the latest version of WPLib Box does
#           not provide a VMware provider. Submit an issue on GitHub
#           if you need a VMware provider:
#
#               https://github.com/wplib/wplib-box/issues/new
#
#       config.vm.network 'private_network', ip: IO.read('IP').strip
#
#           This line tells Vagrant what IP address to use for the VM.
#           It loads the IP address from the file named `IP` created
#           by an earlier line in this `Vagrantfile`.
#
#           Look for the `IP` file in your project's root folder after
#           the first "vagrant up"; the project root is the same folder
#           that contains this Vagrantfile.
#
#           If you wanta specfic IP address you can either edit the
#           `IP` file, or you can change this like in the `Vagrantfile`
#           instead hardcode the IP address into the Vagrantfile; as in:
#
#               config.vm.network 'private_network', ip:"192.168.99.99"
#
#       config.vm.synced_folder "www", "/var/www"
#
#           This line tells Vagrant to "mount" the `www` folder in the
#           host computer's project folder as the symlink `/var/www`,
#           which is on peer with this `Vagrantfile` inside the VM.
#
#           The folder `/var/www` inside the virtual machine and is
#           where the nginx web server running in the VM will look for
#           it's website's root.
#
#           The upshot of this is it will allow a developer to store
#           all of a project's source code on their host computer
#           and yet still have the nginx server in the VM reload the
#           files instantaneously after an edit (assuming the user
#           presses the refresh key on the browser. We do not have any
#           a fully automatic refresh built into WPLib Box, yet.)
#
#           Further, your will not have to worry about loosing any
#           uncommitted source code if you (accidentally) delete the
#           VM or it is otherwise corrupted because all source will be
#           your host Mac, Windows or Linux computer, where it belongs.
#
#           One caveat to this is the MySQL database; it is contained
#           inside the VM for performance reasons, but WPLib Box runs
#           a periodic backup to `/sql/backup.sql` so unless something
#           goes very wrong you won't loose your database either. Still
#           treat your local MySQL database as replaceable, just in case.
#
#       config.ssh.forward_agent = true
#
#           This line enables the virtual machine to access Git version
#           control repositories using the SSH keys configured to access
#           your GitHub and/or Bitbucket accounts, or other Git server.
#
#           This allows you to run `git` within WPLib Box on your private
#           repositories without additional configuration if and when you
#           `vagrant ssh` into WPLib Box and use `git` from the command
#           line (WPLib Box will never automatically access your private
#           respositories unless you explicitly request it to do so.)
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
#           pair published by Hashicorp that normally simplifies using
#           SSH withing Vargant-controlled VMs.
#
#           This configuration option is used with "forward_agent" as
#           the box uses the SSH key from your Mac, Windows or Linux
#           machine instead of using an insecure private key pair.
#
#           The security is not really the concern here since VMs used
#           for development rarely need to be secure. Instead this
#           option simply assumes you already have an SSH key
#           installed on their computer so it uses that instead.
#
#           See these links to learn more about "insert_key"
#
#               - https://github.com/mitchellh/vagrant/tree/master/keys
#               - https://twitter.com/mitchellh/status/525704721714012160
#
#       config.trigger.before :halt do
#           run_remote "box database backup"
#       end
#
#           These lines trigger a backup of the MySQL database to run
#           inside of the VM. whenever you run `vagrant halt` to
#           stop your Vagrant/VirtualBox VM from within your terminal's
#           command line.
#
#           This uses the `box database backup` command of WPLib Box's
#           CLI tool and it generates a `backup.sql` in the `/sql/`
#           subdirectory, in the same folder as this `Vagrantfile`.
#
#       config.trigger.after [:up, :reload] do
#           run_remote "box startup"
#       end
#
#           These lines trigger the `box startup` command of WPLib Box's
#           CLI tool when you run `vagrant up` or `vagrant reload` from
#           your Mac, Windows or Linux host computer's terminal command
#           line. The  `box startup` command starts all of the Docker
#           containers used by WPLib Box, thus preparing WPLib Box to
#           serve your WordPress site to your browser.
#
#   REUSE:
#
#       When you clone the WPLib Box repository you are getting an
#       "appliance" for WordPress local development that is designed
#       to "just work," if at all possible.
#
#       However once comfortable with WPLib Box most developers will
#       probably not want to start with a "git clone" of the
#       github.com/wplib/wplib-box repository but instead maintain
#       their own Vagrantfile which is based off this one. In point
#       of fact, this is how we use WPLib Box ourselves.
#
#       But we believe developers want a recipe for how to use WPLib
#       Box in their projects with the least effort required. And
#       that is exactly how WPLib Box is intended to be used once
#       a developer becomes familiar with it.
#
#       TO START A NEW PROJECT using WPlib Box, or to use WPlib Box on
#       and existing project is as simple as:
#
#           1. Copy this file into a new Vagrantfile in your project.
#
#           2. Create a/update the HOSTNAME file and replace 'wplib.box'
#              with a local domain name relevant to your project, for
#              examples: 'acme.local' or 'example.local'.
#
#           3. Copy your initial database as a MySQL dump file to
#              `/sql/provision.sql`, assuming you have an initial
#              database which is typical when you are enhancing an
#              existing WordPress site but doing so on a local
#              development server, as is a best practice!
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
#           - http://wplib.github.io/wplib-box/faq/troubleshooting/
#

#
# Ensure pre-requisites
#
Vagrant.require_version ">= 2.1"

vboxmanage = Vagrant::Util::Which.which("VBoxManage") || Vagrant::Util::Which.which("VBoxManage.exe")
if vboxmanage == nil
    abort "\nWPLib Box needs VirtualBox 5.2 or greater.\n" \
      "Please download and install VirtualBox from:\n\n\thttps://www.virtualbox.org/wiki/Downloads\n"
else
    version = Vagrant::Util::Subprocess.execute(vboxmanage, '--version')
    version = Gem::Version.create(version.stdout.strip!)
    unless version >= Gem::Version.create('5.2')
      abort "\nWPLib Box needs VirtualBox 5.2 or greater. Your current version is " + version.version + "\n" \
          "Please download a newer version of VirtualBox from:\n\n\thttps://www.virtualbox.org/wiki/Downloads\n"
    end
end

system "vagrant plugin install vagrant-hostsupdater" \
   unless Vagrant.has_plugin? "vagrant-hostsupdater"

#
# Run the main Vagrant configuration
#
Vagrant.configure(2) do |config|

    config.vm.box = "wplib/wplib"
    config.vm.box_version = "0.17.0"

    File.write('IP', "10.10.10.#{rand(10..250)}") if not File.exists?('IP')
    File.write('HOSTNAME', "wplib.box") if not File.exists?('HOSTNAME')

    hostname = IO.read('HOSTNAME').strip;

    config.vm.hostname = hostname
    config.hostsupdater.aliases = [
        "docs.wplib.box",
        "www.#{hostname}",
        "adminer.#{hostname}",
        "mailhog.#{hostname}"
    ]

    config.vm.provider :vmware_fusion do |vmware|
        vmware.vmx["ethernet0.pcislotnumber"] = "33"
    end

    config.vm.network 'private_network', ip: IO.read('IP').strip

    # 0.17.0 and onwards.
    config.vm.synced_folder ".", "/vagrant", disabled: true
    config.vm.synced_folder ".", "/projects/wplib.box"
    config.ssh.username = "boxuser"

    # pre-0.17.0.
    # config.vm.synced_folder "www", "/var/www"
    # config.ssh.username = "vagrant"

    config.ssh.forward_agent = true
    config.ssh.insert_key = false

    config.trigger.before :halt do |trigger|
        trigger.run_remote = {inline: "box database backup"}
    end

    config.trigger.after [:up, :reload] do |trigger|
        trigger.run_remote = {inline: "box startup"}
    end
end

