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
  config.ssh.insert_key = true

  config.vm.provider "virtualbox" do |vb|
    vb.name = "wplib-box"
  end

  config.vm.provider "vmware" do |vmw|
      vmw.name = "wplib-box"
  end

  config.vm.provision "shell", inline: <<-SHELL
    echo "Configuring websites..."
    sudo rsync -arv /srv/sites/* /var/www/ >/dev/null
    sudo chown -R vagrant:vagrant /var/www >/dev/null
    echo "Websites configured."
    sudo service nginx restart
  SHELL

end
