<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



# Product Import Command (Laravel)

This project implements a custom Artisan command to import products from CSV or JSON files, applying validation, business rules, and saving the data into a database.

---

## 🛠 Available Command

```bash
php artisan app:product-import --type=csv --test
```

we still need to implement a bd on docker to be allowed using the following command to run the project
```bash
docker run --name laravel-db -e MYSQL_ROOT_PASSWORD=secret \
  -e MYSQL_DATABASE=laravel -p 3306:3306 -d mysql:8
```
