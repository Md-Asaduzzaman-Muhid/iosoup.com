FROM php:7.2-apache
RUN docker-php-ext-install mysqli
COPY demo/ /var/www/html/
EXPOSE 80