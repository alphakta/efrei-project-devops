Vagrant.configure("2") do |config|

  # Définition de la box utilisée pour la machine virtuelle
  config.vm.box = "ubuntu/focal64"

  # Configuration des ressources allouées à la machine virtuelle
  config.vm.provider "virtualbox" do |vb|
    vb.memory = "4096" # 4 Go de RAM
    vb.cpus = 2 # 2 processeurs
  end

  # Configuration du réseau de la machine virtuelle en NAT
  config.vm.network "private_network", type: "dhcp"
  config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "192.168.1.44", guest_ip: "10.0.2.15" # Redirection du port 80 de la machine virtuelle vers le port 8080 de la machine hôte
  config.vm.network "forwarded_port", guest: 22, host: 2222, host_ip: "192.168.1.44", guest_ip: "10.0.2.15" # Redirection du port 22 de la machine virtuelle vers le port 2222 de la machine hôte
end