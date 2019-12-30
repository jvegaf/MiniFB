FROM phpstorm/php-73-apache-xdebug-27
#FROM phpstorm/php-71-apache-xdebug-26
RUN docker-php-ext-install pdo_mysql
#Install git
RUN apt-get update \
    && apt-get install -y git
##Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/
