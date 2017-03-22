require 'yaml'
require 'fileutils'

domains = {
  frontend: 'wp-ingenium.loc',
  backend:  'admin.wp-ingenium.loc'
}

options = YAML.load_file './vagrant/config/vagrant-local.yml'

if options['github_token'].nil? || options['github_token'].to_s.length != 40
  puts "You must place REAL GitHub token into configuration:\n/yii2-app-advanced/vagrant/config/vagrant-local.yml"
  exit
end

# CONFIGURE ------------------------------------------------------------------------------

Vagrant.configure(2) do |config|

  config.vm.box = 'ubuntu/trusty64'                 # select the box

  config.vm.provider 'virtualbox' do |vb|
    vb.cpus     = options['cpus']
    vb.memory   = options['memory']
    vb.name     = options['machine_name']           # machine name (for VirtualBox UI)
  end

  config.vm.define options['machine_name']          # machine name for vagrant console
  config.vm.hostname = options['machine_name']      # machine name for guest machine console

  # NETWORK SETTINGS ---------------------------------------------------------------------

  # config.vm.network 'public_network', ip: options['ip']           # 192.168.0.x
  # config.vm.network 'private_network', ip: options['static_ip']   # My static IP
  config.vm.network 'private_network', type: "dhcp"                 # Autodetect (I don't test)

  config.vm.synced_folder './', '/app', owner: 'vagrant', group: 'vagrant'
  config.vm.synced_folder '.', '/vagrant', disabled: true

  # hosts settings (host machine)
  config.vm.provision :hostmanager
  config.hostmanager.enabled            = true
  config.hostmanager.manage_host        = true
  config.hostmanager.ignore_private_ip  = false
  config.hostmanager.include_offline    = true
  config.hostmanager.aliases            = domains.values

  # provisioners
  config.vm.provision 'shell', path: './vagrant/provision/once-as-root.sh', args: [options['timezone']]
  config.vm.provision 'shell', path: './vagrant/provision/once-as-vagrant.sh', args: [options['github_token']], privileged: false
  config.vm.provision 'shell', path: './vagrant/provision/always-as-root.sh', run: 'always'

  # post-install message (vagrant console)
  config.vm.post_up_message = "Frontend URL: http://#{domains[:frontend]}\nBackend URL: http://#{domains[:backend]}"
end