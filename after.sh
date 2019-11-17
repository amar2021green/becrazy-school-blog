#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

# If you're not quite ready for Node 12.x
# Uncomment these lines to roll back to
# v11.x or v10.x

# Remove Node.js v12.x:
#sudo apt-get -y purge nodejs
#sudo rm -rf /usr/lib/node_modules/npm/lib
#sudo rm -rf //etc/apt/sources.list.d/nodesource.list

# Install Node.js v11.x
#curl -sL https://deb.nodesource.com/setup_11.x | sudo -E bash -
#sudo apt-get install -y nodejs

# Install Node.js v10.x
#curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -
#sudo apt-get install -y nodejs
if [ -d /home/vagrant/phpmyadmin ]; then
    sudo echo '--- phpMyAdmin already installed. --- '
else
    sudo wget -k https://files.phpmyadmin.net/phpMyAdmin/4.9.1/phpMyAdmin-4.9.1-all-languages.tar.gz
    sudo tar -xzf phpMyAdmin-4.9.1-all-languages.tar.gz -C /home/vagrant/
    sudo rm phpMyAdmin-4.9.1-all-languages.tar.gz
    sudo mv /home/vagrant/phpMyAdmin-4.9.1-all-languages/ /home/vagrant/phpmyadmin
    sudo echo '--- phpMyAdmin 4.9.1 install complete ---'
fi
