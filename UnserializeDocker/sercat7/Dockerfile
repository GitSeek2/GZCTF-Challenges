FROM ctftraining/base_image_nginx_mysql_php_73

COPY src /var/www/html

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN echo 'auto_append_file = "d0g3_f1ag.php"' >> /usr/local/etc/php/php.ini
RUN mv /var/www/html/flag.sh / \
    && chmod +x /flag.sh