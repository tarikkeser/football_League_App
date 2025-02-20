FROM php:8.2-fpm

# Install PDO and MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql

# PHP upload limits 
RUN echo "upload_max_filesize = 10M" > /usr/local/etc/php/conf.d/uploads.ini
RUN echo "post_max_size = 10M" >> /usr/local/etc/php/conf.d/uploads.ini