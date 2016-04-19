# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

    config.vm.box = "wplib/wplib"

    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "wplib.box"
    config.vm.synced_folder "www", "/var/www"
    config.ssh.forward_agent = true
    config.ssh.insert_key = false

    config.vm.provision "shell",
        inline: "sudo ln -s /var/www/content/mu-plugins/wp-redis/object-cache.php /var/www/content/object-cache.php",
        inline: "mysql -u root wordpress < /vagrant/sql/default.sql"


end
