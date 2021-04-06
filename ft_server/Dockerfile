#######
#
#	Operating System
#
# Mandatory by the subject.
#
####
FROM debian:buster

#######
#
#	Update Operating System
#
# Should always keep the OS updated before doing anything.
#
####
RUN apt-get update && apt-get upgrade -y

#######
#
#	Install Dependencies
#
# 	Mandatory by the subject:
# nginx mariadb-server openssl wordpress phpmyadmin
#
# 	Others:
# php dependencies are necessary. See link below.
# https://computingforgeeks.com/install-lamp-stack-on-debian-10-buster/
# wget is to download files from links.
# Vim is vim.
#
####
RUN apt-get install -y nginx mariadb-server openssl vim
RUN	apt-get install -y php7.3 php-mysql php-fpm php-pdo php-gd php-cli php-mbstring
RUN apt-get install -y wget
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.1/phpMyAdmin-5.0.1-english.tar.gz
RUN wget https://wordpress.org/latest.tar.gz

#######
#
# Following sections will use mostly guides from:
# https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mariadb-php-lemp-stack-on-debian-10
# https://forhjy.medium.com/how-to-install-lemp-wordpress-on-debian-buster-by-using-dockerfile-1-75ddf3ede861
# https://forhjy.medium.com/42-ft-server-how-to-install-lemp-wordpress-on-debian-buster-by-using-dockerfile-2-4042adb2ab2c
#
####

#######
#
#	NGINX Server Configuration
#
# You need to copy an already built nginx.conf from the computer ./srcs/ to
# /etc/nginx/sites-available/ inside the container.
# You need to symlink it to sites-enabled. Two linked nginx.conf should be at sites-available
# and sites-enabled.
# I will add a index page of my own.
#
####
COPY ./srcs/nginx.conf /etc/nginx/sites-available/
RUN rm /var/www/html/index.nginx-debian.html
COPY ./srcs/index.nginx-debian.html /var/www/html/
RUN ln -sf /etc/nginx/sites-available/nginx.conf /etc/nginx/sites-enabled

#######
#
#	SSL Configuration
#
# https://phoenixnap.com/kb/generate-openssl-certificate-signing-request
#
####
RUN openssl req -x509 -nodes -days 365 \
	-newkey rsa:2048 -subj "/C=PT/ST=Portugal/L=Lisboa/O=42Lisboa/CN=tisantos" \
	-keyout /etc/ssl/private/tisantos.key \
	-out /etc/ssl/certs/tisantos.crt

#######
#
#	phpMyAdmin Configuration
#
####
RUN mv phpMyAdmin-5.0.1-english.tar.gz /var/www/html/
WORKDIR /var/www/html/
RUN tar -xf phpMyAdmin-5.0.1-english.tar.gz && rm -rf phpMyAdmin-5.0.1-english.tar.gz
RUN mv phpMyAdmin-5.0.1-english phpmyadmin
COPY ./srcs/config.inc.php /var/www/html/phpmyadmin

#######
#
#	Wordpress Configuration
#
####
WORKDIR /
COPY ./srcs/wp-config.php /var/www/html
RUN mv latest.tar.gz /var/www/html/
WORKDIR /var/www/html/
RUN tar -xvzf latest.tar.gz && rm -rf latest.tar.gz

#######
#
# Necessary commands
#
####
RUN chown -R www-data:www-data /var/www/* && \
	chmod -R 755 /var/www/* && \
	chmod 700 /etc/ssl/private

#######
#
# Copy the start.sh to the /tmp/ folder.
# It's a bash file that contains important commands that has to be ran on the bash
# when it's live. Read "Why not use RUN service nginx start here?" below.
# Copy the auto indexer to /tmp/ folder and give it privs.
####
WORKDIR /
COPY ./srcs/bash_commands.sh /tmp/
COPY ./srcs/auto_index.sh /tmp/
RUN chmod -R 755 /tmp/auto_index.sh

#######
#
# Runs the start.sh on the bash after everything above is done.
#
####
WORKDIR /etc/nginx/sites-available/
CMD bash /tmp/bash_commands.sh

# wget is a computer program that retrieves content from web servers.
# You will need it to get .tar files of phpMyAdmin and WordPress.

# Why apt-get and not just apt?
# Because you'll get a warning otherwise saying you need to install apt-utils.
# Annoying stuff.

# Why -y before installing?
# You need to press Y or n when installing an application, -y makes it say Yes automatically.

# Why not use RUN service nginx start here?
# Because this image will be closed after it's built. And when it's ran again, nginx service
# is off. That's why we bash bash_commands.sh when we "docker run" it.


