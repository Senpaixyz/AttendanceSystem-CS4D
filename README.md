# Simple Attendance Management System
### Laravel Project CS4D (BSCS-4)


[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)
![images_alt](https://github.com/Senpaixyz/attendance-system-cs4d/blob/master/public/Manage/img/cover-page.JPG?raw=true)
### Groupmates
- JHENO CERBITO
- DANA MIRANDA
- JANINE SALAZAR
- TRICIA BLANCA

#### Role (Administrator)
```sh
email: test@gmail.com
```
```sh
password: 12345678
```
#### Role (Teacher)
```sh
email: teacher@gmail.com
```
```sh
password: 12345678
```

## Installation

Make sure that you installed updated composer

Install the dependencies and devDependencies and start the server. 
Got to this link for [Laravel](https://laravel.com/docs/9.x/installation) installation using composer

```sh
git clone <this repo>
```
```sh
cd / <repo path>
```
```sh
Copy .env.example and rename it to .env
```
```sh
Open .env and set DB_DATABASE=school_attendance_system
```
```sh
Open phpmyadmin and create database name: school_attendance_system
```
```sh
php artisan key:generate
```
```sh
composer install
```
```sh
php artisan migrate:fresh --seed
```


```sh
php artisan serve
```


## Development


Once server is up go to


```sh
http://127.0.0.1:8000/
```

> Note: `--port=8000` can be changed

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
127.0.0.1:8000
```

## License

MIT
