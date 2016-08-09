#!/usr/bin/env bash
#
# WPLib Box Provision Script
#

echo "Downloading Box Scripts..."
git clone https://github.com/wplib/box-scripts.git /vagrant/scripts  2>/dev/null

echo "Running Provision Script..."
chmod +x /vagrant/scripts/provision.sh
./vagrant/scripts/provision.sh