#!/usr/bin/env bash
#
# WPLib Box Provision Script
#

#
# Install the Box CLI for use inside the Guest, e.g. after `vagrant ssh`
#
echo "Installing Box CLI... (try: 'vagrant ssh' then 'box help')"
git clone https://github.com/wplib/box-cli.git /vagrant/scripts/guest/cli  2>/dev/null
cd /vagrant/scripts/guest/cli
./install-box-cli --quiet

#
#  Disassociate the cloned Git repo and initialize a new repo.
#
echo "Disassociating WPLib Box Git repo..."
box disassociate-git-repo --quiet

#
#  Enable Object Caching
#
echo "Enabling Redis-based Object Caching..."
box enable-object-caching --force --quiet

#
#  Ignoring Composed Files
#
echo "Adding files found in composer.json to .gitignore..."
box ignore-composed-files --quiet

#
#  Enable File Watchers
#
#   Uncomment these after issues #147 and #150 are done.
#
#echo "Enable File Watchers..."
#box enable-file-watchers --quiet

echo "Congratulations! WPLib Box is now installed!"

