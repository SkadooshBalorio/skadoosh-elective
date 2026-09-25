FROM php:8.3-apache

ENV PORT=10000

WORKDIR /var/www/html

COPY lab3/ /var/www/html/lab3/
COPY index.php /var/www/html/index.php

EXPOSE 10000

CMD sed -ri "s!Listen 80!Listen ${PORT:-10000}!g" /etc/apache2/ports.conf \
    && sed -ri "s!<VirtualHost \\*:80>!<VirtualHost *:${PORT:-10000}>!g" /etc/apache2/sites-available/*.conf \
    && exec apache2-foreground