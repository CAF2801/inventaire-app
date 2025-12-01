FROM php:8.2-apache
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 775 /var/www/html/data/ \
    && chmod 664 /var/www/html/data/db.sqlite
EXPOSE 80
CMD ["apache2-foreground"]
