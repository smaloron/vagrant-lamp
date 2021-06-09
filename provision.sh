#!/usr/bin/env bash

PASSWORD='123'
PHPVERSION='8.0'

# Dépôts pour PHP 8
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo add-apt-repository ppa:ondrej/apache2

# Mise à jour des logiciels disponibles
sudo apt update
sudo apt-get -y upgrade

# Installation du serveur web Apache
sudo apt-get install -y apache2

# Installation de PHP
sudo apt-get install -y php$PHPVERSION
# Installation de l'extension de déboguage de PHP
sudo apt-get install -y php$PHPVERSION-xdebug
# Installation du pont entre Apache et PHP
sudo apt-get install -y libapache2-mod-php$PHPVERSION

# mysql
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get install -y mysql-server
sudo apt-get install php$PHPVERSION-mysql

# phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get install -y phpmyadmin

# réécriture d'url
sudo a2enmod rewrite

# Copie des fichiers de configuration
sudo cp -f /vagrant-conf/000-default.conf /etc/apache2/sites-available
sudo cp -f /vagrant-conf/xdebug.ini /etc/php/$PHPVERSION/mods-available

chmod -R a+rwx /vagrant-conf

# Copie de toutes les config dans la machine vituelle
sudo /vagrant-conf/update-conf.sh

# lancement d'Apache
service apache2 restart

# Intallation de Git
sudo apt-get -y install git

git config --global user.name "user"
git config --global user.email "user@mail.com"

# Intallation de Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer







