<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



# Product Import Command (Laravel)

This project implements a custom Artisan command to import products from CSV or JSON files, applying validation, business rules, and saving the data into a database.

---

## 🛠 Available Command
To spin up the project, simple run 

```
docker-compose up -d
```
This will start both services (MYSQL, LARAVEL APP).
# After start up, 
wait a few seconds for the database to finish initializing and run migrations. Then, run the migrations from insde the container if necessary
```
docker exec -it laravel-app php artisan app:product-import --type=${WHATEVER FORMAT YOU HAVE}
```
or if you want to run it from your local machine run but you need to set localhost at your DB_HOST var
```bash
php artisan app:product-import --type=csv --test
```

