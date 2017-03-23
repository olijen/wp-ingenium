#!/bin/bash

#== Import script args ==

timezone=$(echo "$1")

#== Bash helpers ==

info() {
  echo " "
  echo "--> $1"
  echo " "
}

#== Provision script ==

info "Provision-script user: `whoami` ----------------------------------------------------------------------------------"

info "Allocate swap for MySQL 5.6"
fallocate -l 2048M /swapfile
chmod 600 /swapfile
mkswap /swapfile
swapon /swapfile
echo '/swapfile none swap defaults 0 0' >> /etc/fstab

info "Configure locales"
update-locale LC_ALL="C"
dpkg-reconfigure locales

info "Configure timezone"
echo ${timezone} | tee /etc/timezone
dpkg-reconfigure --frontend noninteractive tzdata

info "Prepare root password for MySQL"
debconf-set-selections <<< "mysql-server-5.6 mysql-server/root_password password \"''\""
debconf-set-selections <<< "mysql-server-5.6 mysql-server/root_password_again password \"''\""
echo "Done!"

info "Update OS software"
apt-get update
apt-get upgrade -y

info "Install additional software"
apt-get install -y git php5-curl php5-cli php5-intl php5-mysqlnd php5-gd php5-fpm nginx mysql-server-5.6 php5-xdebug

info "Configure MySQL"
sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
echo "Done!"

info "Configure PHP-FPM"
sed -i 's/user = www-data/user = vagrant/g' /etc/php5/fpm/pool.d/www.conf
sed -i 's/group = www-data/group = vagrant/g' /etc/php5/fpm/pool.d/www.conf
sed -i 's/owner = www-data/owner = vagrant/g' /etc/php5/fpm/pool.d/www.conf
echo "Done!"

info "Enabling php configuration"
ln -f -s /app/vagrant/php5/xdebug.ini /etc/php5/cli/conf.d/20-xdebug.ini
echo "Done!"

info "Configure NGINX"
sed -i 's/user www-data/user vagrant/g' /etc/nginx/nginx.conf
echo "Done!"

info "Enabling site configuration"
ln -s /app/vagrant/nginx/app.conf /etc/nginx/sites-enabled/app.conf
echo "Done!"

info "Initailize databases for MySQL"
mysql -uroot <<< "CREATE DATABASE wpi"
mysql -uroot <<< "CREATE DATABASE wpi_test"
echo "Done!"

info "Install composer"
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

info "Install Node and NPM"
apt-get install -y g++
curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -
apt-get install -y nodejs
su vagrant
mkdir /home/vagrant/node_modules
ln -s /home/vagrant/node_modules/ /app/client/node_modules

info "Angular cli"
npm install -g @angular/cli

cd /app/client
npm install

#apt-get install nodejs
#apt-get install nodejs-legacy
#apt-get install npm
#npm install npm -g