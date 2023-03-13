Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/focal64"
  config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "10.3.220.169", guest_ip: "10.0.2.15" 
  config.vm.network "forwarded_port", guest: 22, host: 2222, host_ip: "10.3.220.169", guest_ip: "10.0.2.15" 
  config.vm.network "forwarded_port", guest: 8001, host: 8001, host_ip: "10.3.220.169", guest_ip: "10.0.2.15" 
  config.vm.network "forwarded_port", guest: 8082, host: 8082, host_ip: "10.3.220.169", guest_ip: "10.0.2.15" 
  config.vm.provider "virtualbox" do |vb|
    vb.memory = "4096" 
    vb.cpus = 2 
  end

  config.vm.provision "shell", inline: <<-SHELL
    sed -i 's/ChallengeResponseAuthentication no/ChallengeResponseAuthentication yes /g' /etc/ssh/sshd_config
    service ssh restart
  SHELL
end