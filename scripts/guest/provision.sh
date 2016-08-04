#!/usr/bin/env bash
#
# WPLib Box Provision Script
#

#
# Install the Box CLI for use inside the Guest, e.g. after `vagrant ssh`
#
git clone https://github.com/wplib/box-cli.git /vagrant/scripts/guest/cli  2>/dev/null
cd /vagrant/scripts/guest/cli
sh ./install-box-cli.sh

#
#  Disassociate the cloned Git repo and initialize a new repo.
#
box disassociate-git-repo no-errors 2> /dev/null

#
#  Enable Object Caching
#
box enable-object-caching --force 2> /dev/null

echo "Congratulations! WPLib Box is now installed!"

