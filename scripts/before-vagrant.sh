#!/usr/bin/env bash

#
# Grab the full directory where this file is located
#
this_dir="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

#
# Run a custom before-vagrant script if one if exists
#
if [ -f "${this_dir}/custom/before-vagrant.sh" ]; then
    source "${this_dir}/custom/before-vagrant.sh"
fi

#Randomly generate an IP address into an IP file
if [ ! -f IP ]; then
    octet2=$((RANDOM%254))
    octet3=$((RANDOM%254))
    octet4=$((RANDOM%254))
    echo "10.${octet2}.${octet3}.${octet4}" > IP
fi

#
# Run a custom before-provision script if one if exists
#
if [ -f "${this_dir}/custom/before-provision.sh" ]; then
    source "${this_dir}/custom/before-provision.sh"
fi

