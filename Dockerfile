FROM php:5.6-apache

# Point apt sources to the archived Stretch repositories
RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list \
 && sed -i 's|security.debian.org|archive.debian.org/debian-security|g' /etc/apt/sources.list \
 && apt-get update -o Acquire::Check-Valid-Until=false \
 && apt-get install -y --no-install-recommends mariadb-client unzip \
 && docker-php-ext-install mysql \
 && a2enmod rewrite headers expires \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . /var/www/html
COPY railway-entrypoint.sh /usr/local/bin/railway-entrypoint.sh
RUN chmod +x /usr/local/bin/railway-entrypoint.sh

EXPOSE 8080
CMD ["railway-entrypoint.sh"]
