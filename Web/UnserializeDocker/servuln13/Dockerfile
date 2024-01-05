FROM ctftraining/base_image_nginx_mysql_php_73

COPY src /var/www/html

RUN mv /var/www/html/flag.sh / \
    && chmod +x /flag.sh

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini