# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

    config.vm.box = "wplib/wplib"
    File.write('IP', "10.#{rand(254)}.#{rand(254)}.#{rand(254)}") if not File.exists?('IP')
    config.vm.network 'private_network', ip: IO.readlines('IP')[0].strip
    config.vm.hostname = "wplib.box"
    config.vm.synced_folder "www", "/var/www"
    config.ssh.forward_agent = true
    config.ssh.insert_key = false
    config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"
    config.vm.provision "shell", path: "scripts/provision.sh"

end
