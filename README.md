<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Trade Mogul

Technical Interview by Solutech.


#### Installation

###### Prerequisites:
- PHP 8.1
- Laravel 9.x
- MySQL server
- Node.js v17.7.1 or later
- NPM v8.5.2 or later
- Composer 2.2.4 or later

##### Instructions

1. Clone the project via your preffered authenticated method,
2. ```cd trade-mogul``` into the project folder
3. Create a instance of a database e.g trade_mogul
4. Open terminal and run this command to get a copy of .env file ```cp .env.example .env``` and configure your environment variables.
5. Run the following commands:
   ```
   composer install
   php artisan key:generate
   php artisan config:clear ; php artisan config:cache
   php artisan storage:link
   php artisan migrate --seed
   php artisan serve
   ```
6. Open your application on your preffered browser via the link provided after serving.