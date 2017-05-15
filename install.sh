#!/usr/bin/env bash

#Check for VMware, give message and do not install VirtualBox
#If no VMWare, check for VirtualBox, if not installed install VirtualBox
#If VirtualBox installed, check version, ask if okay to upgrade? If ok, upgrade VirtualBox

echo "Checking Vagrant..."
if [ -f "/usr/local/bin/vagrant" ]; then
    #If Vagrant installed, check version, ask if okay to upgrade? If ok, upgrade Vagrant
    version=$(vagrant -v)
    version=${version#Vagrant}
    if [ "1.9.3" != $version ]; then
        echo "There is a newer version of Vagrant"
        upgrade="Y"
        read -e -p "Upgrade vagrant(Y/n)?: " input
        upgrade="${input:-$upgrade}"
        echo $upgrade
    else
        echo "Latest Vagrant found"
    fi
else
    #Check for Vagrant, if not installed install Vagrant
    echo "NO Vagrant"
fi
#Check for Vagrant Plugins, if not installed install Vagrant Plugins
#If Vagrant Plugins installed, check version, ask if okay to upgrade? If ok, upgrade Vagrant Plugins
#Vagrant up
#Load Browser to "project1.dev"