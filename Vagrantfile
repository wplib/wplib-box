# -*- mode: ruby -*-
# vi: set ft=ruby :

#
# Welcome to WPLib Box!
#
#       The EASIEST Way to Setup a Local WordPress Development
#        Environment, using Vagrant
#
#       Brought to you by The WPLib Team:
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
#           with nginx, MySQL, PHP7.0/5.6 and more; everything a good
#           a Linux server needs to be able to serve WordPress pages.
#
#           In many ways -- compared to Vagrant boxes like VVV and VIP
#           Quickstart -- this is WPLib's "secret sauce."
#
#       File.write('IP', "10.10.10.#{rand(10..250)}") if not File.exists?('IP')
#
#           This line creates a randomly-generated and non-routable IP
#           address starting with 10.10.10. and randomly selects the
#           final octet between 10 and 250. It then writes the IP
#           address to a file named 'IP' in the project's root folder
#           which is the same folder where this Vagrantfile is found
#           to ensure future runs of "vagrant up" or "vagrant reload"
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
#       File.write('HOSTNAME', "wplib.box") if not File.exists?('HOSTNAME')
#
#           This line writes the host name of 'wplib.box' to a file
#           named 'HOSTNAME' in the project's root folder, the same
#           folder in which this Vagrantfile is found to ensure future
#           runs of "vagrant up" or "vagrant reload" use the same host
#           name, unless of course you change it, which we expect.
#
#           The host name in this context is a domain name local to
#           your computer which you can access via your browser by
#           prefixing the host name with 'http://', for example
#           http://wplib.box or http://example.dev.
#
#           To change the host name of your WPLib Box simple update
#           the `HOSTNAME` file to include only your preferred host
#           name, e.g. `example.dev` or similar (but without the
#           quotes).
#
#       hostname = IO.read('HOSTNAME').strip;
#
#           This line reads the value in the file named 'HOSTNAME',
#           strips off any leading or trailing whitespace and then
#           assignes it to a variable named 'hostname' which is
#           local to this Vagrantfile.
#
#           If the previous line wrote the file then it will load
#           'wplib.box' otherwise it will load a host name that
#           you have updated the 'HOSTNAME' file to include, such
#           as 'example.dev' or similar (but without the quotes).
#
#       config.vm.hostname = hostname
#
#           This line specifies the domain name your browser should be
#           able to load the WordPress site running inside this box.
#
#           This value comes from the file named 'HOSTNAME' which was
#           created and/or read into the variable 'hostname' in the
#           previous two lines.
#
#           To CHANGE the domain name to use to when loading the box's
#           website in your browser you only need to update the file
#           named 'HOSTNAME', or create one if it does not already
#           exist. It should be a text file than only contains the
#           local domain name that you want to use to access the
#           website(s) on your WPLib Box.
#
#           Of course your computer's hosts file must contain the IP
#           address used by the box for your browser to use it to load
#           WordPress but if you have the Vagrant hosts-updater plugin
#           then it will handle updating the hosts file for you.
#
#           Assuming you have that plugin, once you've updated the
#           'HOSTNAME' file run "vagrant up" or "vagrant reload" in
#           your terminal to update your computer's 'hosts' file to
#           recognize this domain name when typed into your browser.
#
#       config.hostsupdater.aliases = [
#           "www.#{hostname}",
#           "adminer.#{hostname}",
#           "mailhog.#{hostname}"
#       ]
#
#           These lines specify addition domains that WPLib Box will
#           add to your hosts file (assuming you have the Vagrant
#           hosts-updater plugin) and thus WPLib Box will be able to
#           recognize when you request them from your browser.
#
#           You'll note the use the same (base) host name as the
#           prior line so look to its description for further details
#           on the 'hostname' variable.
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
#       config.vm.network 'private_network', ip: IO.read('IP').strip
#
#           This line tells Vagrant what IP address to use for the VM.
#           It loads the IP address from the file named "IP" that
#           previously created by the script `/scripts/before-vagrant.sh`
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
#       $provision = <<PROVISION
#    if [ -f "/vagrant/scripts/provision.sh" ]; then
#        bash /vagrant/scripts/provision.sh --force
#    else
#        rm -rf /tmp/box-scripts  2>/dev/null
#        git clone https://github.com/wplib/box-scripts.git /tmp/box-scripts  2>/dev/null
#        bash /tmp/box-scripts/provision.sh
#    fi
#    PROVISION
#
#           These lines create an "inline" provisioning script to be
#           run on the FIRST "vagrant up" or on any "vagrant up" or
#           "vagrant reload" that has the "--provision" switch.
#
#           This inline script checks for a provision script on disk
#           named '/vagrant/scripts/provision.sh' and if there it
#           runs it. If not there it pulls it down from GitHub by
#           cloning the script, and then it runs it.
#
#       config.vm.provision "shell", inline: $provision
#
#           This line tells Vagrant to run the "inline" bash script
#           described above, which ultimately runs the "provision.sh"
#           found in the "scripts" folder which is in the same folder
#           where Vagrantfile is located.
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
#              examples: 'acme.dev' or 'example.dev'.
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

    File.write('IP', "10.10.10.#{rand(10..250)}") if not File.exists?('IP')
    File.write('HOSTNAME', "wplib.box") if not File.exists?('HOSTNAME')

    hostname = IO.read('HOSTNAME').strip;

    config.vm.hostname = hostname
    config.hostsupdater.aliases = [
        "www.#{hostname}",
        "adminer.#{hostname}",
        "mailhog.#{hostname}"
    ]

    config.vm.provider :vmare_fusion do |vmware|
        vmware.vmx["ethernet0.pcislotnumber"] = "33"
    end

    config.vm.network 'private_network', ip: IO.read('IP').strip

    config.vm.synced_folder "www", "/var/www"

    config.ssh.forward_agent = true
    config.ssh.insert_key = false

    config.trigger.before :halt do
        run_remote "box backup-db"
    end

end

