#
# WPLib Box Bootstrapping Script
#
# @example
#    b = Box.new(Vagrant)
#
#    puts b.filepath
#    puts b.hostname
#    puts b.box_version
#
#    b = Box.new()
#    b.prerequisites()
#    b.add_aliases([
#       "www.{hostname}",
#       "adminer.{hostname}",
#       "mailhog.{hostname}",
#       "docs.{hostname}",
#    ])
#    b.startup(config)
#

require 'json'

class Box
  attr_accessor :filepath

  def hostname()
    @project['hostname']
  end

  def box_version()
    @project['localdev']['version']
  end

  def add_aliases(aliases)
    @project['aliases'] = aliases
  end

  def initialize()
    @filepath = File.expand_path "project.json"
    if File.exists?(@filepath)
      @project = JSON.parse(File.read(@filepath))
    else
      @project = {}
      @project['readme'] = []
      @project['readme'] << "This file allows you to configure WPLib Box."
      @project['readme'] << "Find available components by typing 'vagrant ssh' in terminal followed by 'box component available'."
      @project['readme'] << "You can delete this `readme` section assuming it is still valid JSON after deletion."
      @project['hostname'] = "wplib.box"
      @project['aliases'] = %w( docs.{hostname} www.{hostname} adminer.{hostname} mailhog.{hostname} )
      @project['localdev'] = {}
      @project['localdev']['name'] = "WPLib Box"
      @project['localdev']['version'] = "0.17.1"
      @project['localdev']['website'] = "http://wplib.org/box/"
      @project['stack'] = {}
      @project['stack']['wordpress/dbserver'] = 'wplib/mysql:5.5.60'
      @project['stack']['wordpress/webserver'] = 'wplib/nginx:1.14.0'
      @project['stack']['wordpress/processvm'] = 'wplib/php:7.1.18'
      @project['stack']['wordpress/cacheserver'] = 'wplib/redis:4.0.9'
      @project['stack']['mkdocs/webserver'] = 'wplib/mkdocs:0.15.3'
      @project['stack']['box/mailsender'] = 'wplib/mailhog:1.0.0'
      @project['stack']['box/webproxy'] = 'wplib/proxy:1.14.0'
      @project['stack']['box/sqladmin'] = 'wplib/adminer:4.6.2'
      File.write(@filepath,JSON.pretty_generate(@project))
    end
    @project
  end

  def prerequisites()
    Vagrant.require_version ">= 2.1"

    vboxmanage = Vagrant::Util::Which.which("VBoxManage") || Vagrant::Util::Which.which("VBoxManage.exe")
    if vboxmanage == nil
      abort "\nWPLib Box needs VirtualBox 5.2 or greater.\n" \
      "Please download and install VirtualBox from:\n\n\thttps://www.virtualbox.org/wiki/Downloads\n"
    else
      version = Vagrant::Util::Subprocess.execute(vboxmanage, '--version')
      version = Gem::Version.create(version.stdout.strip!)
      unless version >= Gem::Version.create('5.2')
        abort "\nWPLib Box needs VirtualBox 5.2 or greater. Your current version is " + version.version + "\n" \
          "Please download a newer version of VirtualBox from:\n\n\thttps://www.virtualbox.org/wiki/Downloads\n"
      end
    end

    system "vagrant plugin install vagrant-hostsupdater" \
      unless Vagrant.has_plugin? "vagrant-hostsupdater"

  end

  def startup(config)

    config.vm.box = "wplib/wplib"
    config.vm.box_version = box_version

    config.vm.hostname = hostname

    config.hostsupdater.aliases = @project['aliases']
    config.hostsupdater.aliases.map! do |_alias|
      _alias.sub! '{hostname}', hostname
    end

    config.vm.provider :vmware_fusion do |vmware|
      vmware.vmx["ethernet0.pcislotnumber"] = "33"
    end

    File.write('IP', "10.10.10.#{rand(10..250)}") if not File.exists?('IP')
    config.vm.network 'private_network', ip: IO.read('IP').strip

    if Gem::Version.new(box_version) >= Gem::Version.new("0.17.0")
      # 0.17.0 and onwards.
      config.vm.synced_folder ".", "/vagrant", disabled: true
      config.vm.synced_folder ".", "/projects/wplib.box"
      config.ssh.username = "boxuser"
    else
      #pre-0.17.0.
      config.vm.synced_folder "www", "/var/www"
      config.ssh.username = "vagrant"
    end

    config.ssh.forward_agent = true
    config.ssh.insert_key = false

    config.trigger.before :halt do |trigger|
      trigger.run_remote = {inline: "box database backup"}
    end

#    config.trigger.after [:up, :reload] do |trigger|
#      trigger.run_remote = {inline: "box status"}
#    end
  end
  
  
end

