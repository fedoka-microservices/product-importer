#!/bin/sh

# echo "Esperando a que MySQL esté disponible..."

# # Intenta conectarse a la base de datos hasta que responda
# until php artisan migrate --force; do
#   echo "Base de datos no disponible aún. Esperando 5 segundos..."
#   sleep 5
# done

# echo "Base de datos lista, continuando..."

# Instalar dependencias si no están
composer install

# Arrancar Laravel
php artisan serve --host=0.0.0.0 --port=80
