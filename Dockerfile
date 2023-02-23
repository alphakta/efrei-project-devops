FROM php:7.4-apache

# Install all depedencies (docker, docker-compose, python3 ansible, extension mysqli)
# RUN apt-get remove docker docker-engine docker.io containerd runc python3-pip
RUN apt-get update && apt-get install -y git
RUN apt-get -y install ca-certificates curl gnupg lsb-release
RUN mkdir -m 0755 -p /etc/apt/keyrings
RUN curl -fsSL https://download.docker.com/linux/debian/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
RUN echo \   "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian \   $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null
RUN apt-get update && apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
RUN apt-get -y install -y python3-pip && pip3 install ansible
RUN docker-php-ext-install mysqli 

WORKDIR /var/www/html/
RUN rm -rf /var/www/html/Be-Primeur
RUN git clone https://gitlab.com/AlphaKeita/Be-Primeur.git /var/www/html/
EXPOSE 80