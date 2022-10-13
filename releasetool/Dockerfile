FROM ubuntu:22.04

#	Replace standard shell with bash
RUN	rm -rf /bin/sh && \
	ln -s /bin/bash /bin/sh

RUN apt-get update && \
    apt-get upgrade -y && \
    debconf-set-selections <<< 'debconf debconf/frontend select Noninteractive' && \
    apt-get install -y git \
        php-cli php-xml php-mbstring php-curl php-zip libapache2-mod-php \
        apache2 unzip joe wget

# Install composer
RUN cd /usr/local/bin && \
	EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig) && \
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
	ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');") && \
	if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; \
	   then echo 'ERROR: Invalid installer signature' \
	     rm composer-setup.php \
	     exit 1; \
	fi && \
	php composer-setup.php --quiet --filename=composer && \
	RESULT=$? && \
	rm composer-setup.php && \
	chmod a+x composer && \
#   Enable ReWrite engine
    a2enmod rewrite

VOLUME /var/www/html
VOLUME /mnt/checkouts/diloc
VOLUME /mnt/commits
VOLUME /var/log

COPY docker/90-php-apache.ini /etc/php/8.1/apache2/conf.d
COPY docker/90-php-cli.ini    /etc/php/8.1/cli/conf.d

WORKDIR /var/www/html

ENTRYPOINT ["apachectl"]
CMD ["-D", "FOREGROUND"]
