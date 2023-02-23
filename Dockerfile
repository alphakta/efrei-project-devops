FROM php:7.4-apache

RUN apt-get update && apt-get install -y git curl && \
apt-get install -y apt-transport-https ca-certificates gnupg2 && \
curl -fsSL https://download.docker.com/linux/debian/gpg | apt-key add - && \
add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable" && \
apt-get update && apt-get install -y docker-ce docker-ce-cli containerd.io && \
curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose && \
chmod +x /usr/local/bin/docker-compose && \
apt-get install -y python3-pip && \
pip3 install ansible && \
docker-php-ext-install mysqli 

WORKDIR /var/www/html/
RUN rm -rf /var/www/html/Be-Primeur
RUN git clone https://gitlab.com/AlphaKeita/Be-Primeur.git /var/www/html/
EXPOSE 80