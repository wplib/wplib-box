#!/usr/bin/env bash
#
# WPLib Box provision script
#

#
# Symlink the Object Cache Drop-in for Redis, if not already symlinked
#
content_dir="/var/www/content"
cache_file="${content_dir}/mu-plugins/wp-redis/object-cache.php"
cache_link="${content_dir}/object-cache.php"
if [ ! -f "${cache_file}" ]; then
    echo "ERROR: Composer not run before Vagrant. Please run these two (2) commands:"
    echo " "
    echo "      composer install"
    echo "      vagrant reload --provision"
    echo " "
else
    sudo ln -sf "${cache_file}" "${cache_link}"
fi
