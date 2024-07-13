## Sub App Demo

This is a simple demo on subscription web application (backend).

## There will be constant changes as time goes on.

It covers the following:

* Use PHP 8.*
* Write migrations for the required tables.
* Endpoint to create a **post** for a **particular website**.
* Endpoint to make a user subscribe to a **particular website** with all the tiny
validations included in it.
* Use of command to send email to the subscribers (command must check all
websites and send all new posts to subscribers which have not been sent yet).
* Use of queues to schedule sending in background.
* No duplicate stories should get sent to subscribers.
* Tests

# Postman API Sample

### 1. Create a new website with POST method

- [Website API Endpoint](https://www.postman.com/cla-bit/workspace/ship29ja/request/27786069-d13075d5-fd34-4526-9340-a3b6fa63e48d?action=share&creator=27786069&ctx=documentation)

### 2. Create a new website post with POST method

- [Post API Endpoint](https://www.postman.com/cla-bit/workspace/ship29ja/request/27786069-63d2571c-5382-4009-8f2c-e162a54ad14e?action=share&creator=27786069&ctx=documentation)

### 3. Create a new user with POST method

- [Register API Endpoint](https://www.postman.com/cla-bit/workspace/ship29ja/request/27786069-88b325ed-659e-4f02-b517-718a3cbafb5e?action=share&creator=27786069&ctx=documentation)

### 4. Create a subscribe with POST method

- [Subscribe API Endpoint](https://www.postman.com/cla-bit/workspace/ship29ja/request/27786069-40defc02-64bb-49b4-b2bd-39e7fc17c066?action=share&creator=27786069&ctx=documentation)


## Installation

#### 1. Download

      git clone https://github.com/cla-bit/SubApp

#### 2. Environment Files
This package ships with a .env.example file in the root of the project.

You must rename this file to just .env

Note: Make sure you have hidden files shown on your system.

#### 3. Composer
This project dependencies are managed through the PHP Composer tool. The first step is to install the depencencies by navigating into your project in terminal and typing this command:

        composer install

#### 4. Create Database
You must create your database on your server and on your .env file update the following lines:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=

Change these lines to reflect your new database settings.

#### 5. Enable Mail Configurations

        MAIL_MAILER=log
        MAIL_HOST=127.0.0.1
        MAIL_PORT=2525
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        MAIL_FROM_ADDRESS="hello@example.com"
        MAIL_FROM_NAME="${APP_NAME}"

Fill these Env fields to enable email sending configuration.


We are going to run the built in migrations to create the database tables:

        php artisan migrate

You should see a message for each table migrated.


To Run the application

      php artisan serve

To Run the Scheduling, open another terminal

      php artisan queue:work


Kindly note, Run cronjob on Unix based OS not on Windows OS, as Windows do not support cronjob tasks. Other alternative is to use Celery or Redis.
-----------

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
