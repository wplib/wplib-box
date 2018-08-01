# -*- mode: ruby -*-
# vi: set ft=ruby :

#
# Welcome to WPLib Box!
#
#       The Local WordPress Development Solution designed to "Just Work."
#
#       The functionality of WPLib Box is provided by Docker
#       Containers run within a VirtualBox Virtual Machine (VM)
#       where Vagrant automated VirtualBox.
#
#       If you are familiar with Vagrant, you should never need to
#       modify this Vagrantfile as most common configuration is
#       designed to be handled in ./project.json.
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
#           - http://wplib.org/box/
#
#   BACKGROUND:
#
#       You typically find this named "Vagrantfile" as the result of
#       downloading and unzipping the following file:
#
#           - https://github.com/wplib/wplib-box/archive/{version}.zip
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
# END

Vagrant.configure(2) do |config|

    require "./.vagrant/box.rb"
    box = Box.new()
    box.prerequisites()
    box.start(config)

end

