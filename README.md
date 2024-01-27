
# Laravel Blog

This Laravel project is a basic blogging platform. It includes functionality for creating, managing, and viewing blog posts. The project is built using Laravel, a popular PHP framework known for its elegant syntax and robust features.

## Key Features

- Blog post creation and management.
- User authentication and authorization.
- RESTful API endpoints.
- Integration with Laravel Sanctum for API token handling.
- Swagger documentation for APIs.

## Technologies and Tools Used

- Laravel Framework (version 10.10)
- PHP (version 8.1)
- MySQL for the database.
- Guzzle for HTTP requests.
- Laravel Sanctum for API authentication.

## Installation

```bash
git clone https://github.com/voskanyanarman/blog.git
cd blog
composer install
npm install
cp .env.example .env
php artisan key:generate
# Set your database credentials in the .env file
php artisan migrate
php artisan serve
```

## Usage

- Access the blog platform through the provided URL after running `php artisan serve`.
- Use API endpoints for blog management (refer to Swagger documentation).

## License

The project is open-sourced under the MIT license.
---
