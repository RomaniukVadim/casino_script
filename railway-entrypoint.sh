#!/usr/bin/env bash
set -e

cd /var/www/html

: "${PORT:=8080}"

cat >/etc/apache2/ports.conf <<EOF
Listen ${PORT}
EOF

cat >/etc/apache2/sites-available/000-default.conf <<EOF
<VirtualHost *:${PORT}>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html

    <Directory /var/www/html>
        AllowOverride All
        Require all granted
        Options FollowSymLinks
    </Directory>

    ErrorLog /proc/self/fd/2
    CustomLog /proc/self/fd/1 combined
</VirtualHost>
EOF

if [ -n "${DB_HOST}" ]; then
  sed -i 's|$dbhost = "localhost";|$dbhost = "'"${DB_HOST}"'";|g' engine/config/config_db.php || true
fi

if [ -n "${DB_USERNAME}" ]; then
  sed -i 's|$dbuname = "bduser";|$dbuname = "'"${DB_USERNAME}"'";|g' engine/config/config_db.php || true
fi

if [ -n "${DB_PASSWORD+x}" ]; then
  sed -i 's|$dbpass = "pass";|$dbpass = "'"${DB_PASSWORD}"'";|g' engine/config/config_db.php || true
fi

if [ -n "${DB_DATABASE}" ]; then
  sed -i 's|$dbname = "bdname";|$dbname = "'"${DB_DATABASE}"'";|g' engine/config/config_db.php || true
fi

if [ "${APP_SUBPATH:-/}" = "/" ]; then
  sed -i "s|\$path = '/kazino/';|\$path = '/';|g" engine/config/config.php || true
else
  esc_path=$(printf '%s' "${APP_SUBPATH}" | sed 's/[\/&]/\\&/g')
  sed -i "s|\$path = '/kazino/';|\$path = '${esc_path}';|g" engine/config/config.php || true
fi

exec apache2-foreground
