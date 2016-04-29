#!/usr/bin/env bash

#Randomly generate an IP address into an IP file
if [ ! -f IP ]; then
    octet2=$((RANDOM%254))
    octet3=$((RANDOM%254))
    octet4=$((RANDOM%254))
    echo "10.${octet2}.${octet3}.${octet4}" > IP
fi
