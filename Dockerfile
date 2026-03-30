# Use PHP 5.6 with Apache
FROM php:5.6-apache

# Set Apache document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html

# Fix Debian Stretch repositories and install needed packages
# Replace deb.debian.org and security.debian.org with archive mirrors and update apt
RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list \
 && sed -i 's|security.debian.org|archive.debian.org/debian-security|g' /etc/apt/sources.list \
 && apt-get update -o Acquire::Check-Valid-Until=false \
 && apt-get install -y --no-install-recommends \
    mariadb-client \
    unzip \
 && docker-php-ext-install mysql \
 && a2enmod rewrite headers expires \
 && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html

# Copy the entrypoint script and make it executable
COPY railway-entrypoint.sh /usr/local/bin/railway-entrypoint.sh
RUN chmod +x /usr/local/bin/railway-entrypoint.sh

# Expose port 8080
EXPOSE 8080

# Run the entrypoint script on container start
CMD ["railway-entrypoint.sh"]
