<p align="center"><img src="demo-images/admin.png"></p>

# Movies Seller Website ( with admin panel )
> Laravel with blade


This repo can be used by Movie,Series retailers who need a website for their movie retailer shops instead of using old photo albums systems.Live demonstration can be checked at [phoopwintwai.com](https://phoopwintwai.com).

## Functions In User App
- Browse Movies , Series and read reviews , compatible for both mobile and desktop.
- Order favorite items(movie,serie) after registering an account.

## User Functions Demos

### -movies list (mobile)
<div align="center">
    <img src="demo-images/user.png" width="300">
</div>

### -movies list (desktop)
<div align="center">
    <img src="demo-images/user-desktop.png" width="500">
</div>

### -movie item detail
<div align="center">
    <img src="demo-images/show-movie-detail.png" width="300">
</div>

### -added to cart
<div align="center">
    <img src="demo-images/show-added-cart.png" width="300">
</div>

### -view cart items
<div align="center">
    <img src="demo-images/show-orders.png" width="300">
</div>



## Functions In Admin-Panel App
- Manage Tags,Categories,Years 
- Add new movies,Update Movies 
- Add new series,Update Series
- Browse current registered users
- Browse current orders by users
- Update order status ordered by users

## Admin Panel Function Deoms

### manage movies

<div align="center">
    <img src="demo-images/movies.png" width="500">
</div>

### manage orders

<div align="center">
    <img src="demo-images/copy-orders.png" width="500">
</div>


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

Lincensed under the [MIT license](https://opensource.org/licenses/MIT).
