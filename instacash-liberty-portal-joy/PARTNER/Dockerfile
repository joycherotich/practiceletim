# Use the official PHP image with Apache as the web server
FROM php:8-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the composer.json and composer.lock files to install dependencies
COPY composer.json composer.lock /var/www/html/

# Install dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libzip-dev zip unzip && \
    docker-php-ext-configure zip && \
    docker-php-ext-install zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

    # Install the MySQL PDO driver
RUN docker-php-ext-install pdo_mysql

# Copy the entire application
COPY . /var/www/html/

# Copy the entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/

# Set the entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Install application dependencies
RUN composer install --optimize-autoloader --no-dev
# RUN echo 'SetEnv MYSQL_DB_CONNECTION ${MYSQL_DB_CONNECTION}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv MYSQL_DB_NAME ${MYSQL_DB_NAME}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv MYSQL_PASSWORD ${MYSQL_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv SITE_URL ${SITE_URL}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod rewrite &&\
    a2enmod headers &&\
    a2enmod rewrite &&\
    a2dissite 000-default &&\
    service apache2 restart 
   
    

# Set up Apache for Laravel
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80



