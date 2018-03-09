FROM php:5.6-apache

MAINTAINER Murilo Henrique

COPY . /var/www/html/
WORKDIR /var/www/html/

RUN apt-get update
RUN apt-get install zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer --version \
  && composer install

EXPOSE 80
EXPOSE 443

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]