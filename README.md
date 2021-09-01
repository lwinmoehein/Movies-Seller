<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Movies Reviewer Website ( with admin panel )



This repo can be used by Movie,Serie retailers who need a website for their movie retailer shops instead of using old photo albums systems.It contains following functions:

## In User App
- Browse Movies , Series and read reviews , compatible for both mobile and desktop.
- Order favorite items(movie,serie) after registering an account.

## In Admin App
- Manage Tags,Categories,Years 
- Add new movies,Update Movies 
- Add new series,Update Series
- Browse current registered Users
- Browse current orders by users
- Update order status ordered by users

# how to run this site on your own machine

1. clone this repository from a terminal or download it as zip
2. cd into cloned project folder
3. composer install to get dependencies to vender folder
4. cp .env.example .env
5. update your own database credentials (mysql recommended)
6. php artisan storage:link (for image upload,access)
7. php artisan key:generate
8. php artisan serve


## License

This site is lincensed under the [MIT license](https://opensource.org/licenses/MIT).
