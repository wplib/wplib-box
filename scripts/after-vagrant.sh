#!/usr/bin/env bash

#
# Grab the full directory where this file is located
#
this_dir="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

#
# Run a custom after-provision script if one if exists
#
if [ -f "${this_dir}/custom/after-provision.sh" ]; then
    source "${this_dir}/custom/after-provision.sh"
fi

# RESERVED FOR FUTURE USE

#
# Run a custom after-vagrant script if one if exists
#
if [ -f "${this_dir}/custom/after-vagrant.sh" ]; then
    source "${this_dir}/custom/after-vagrant.sh"
fi
