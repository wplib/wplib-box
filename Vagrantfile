# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  config.vm.box = "wplib/wplib"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.hostname = "wplib-box.dev"
  config.hostsupdater.aliases = ["underscores4wplib.dev", "novarnish.underscores4wplib.dev"]
  config.vm.synced_folder "www", "/var/www"
  config.vm.synced_folder "logs", "/var/log/nginx"
  config.ssh.forward_agent = true

  config.vm.provision "shell", inline: <<-SHELL
    cd /vagrant/puppet
    librarian-puppet install
  SHELL

  config.vm.provision "puppet" do |puppet|
    puppet.module_path = "puppet/modules"
    puppet.manifests_path = "puppet/manifests"
    puppet.manifest_file = "site.pp"
  end

end
