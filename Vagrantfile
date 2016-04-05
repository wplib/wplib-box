# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

    config.vm.box = "wplib/wplib"

    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "wplib.box"
    config.vm.synced_folder "www", "/usr/share/nginx/html"
    config.ssh.forward_agent = true
    config.ssh.insert_key = false

    config.vm.provider "virtualbox" do |vb|
        vb.name = "wplib-box"
    end

    config.vm.provider "vmware" do |vmw|
        vmw.name = "wplib-box"
    end

    config.vm.provision "shell",
        inline: "sudo ln -s /usr/share/html/content/mu-plugins/wp-redis/object-cache.php /usr/share/nginx/html/content/object-cache.php"

end
