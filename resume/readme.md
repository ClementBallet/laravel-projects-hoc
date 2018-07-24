<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Résumé des fonctionnalités vues sur Laravel

- Je créé mon projet laravel<br>
```composer create-projet --prefer-dist laravel/laravel NOMPROJET "5.4.*"```

- Je créé mon virtual host
- Je créé ma bdd
- Je configure mon .env
- Je suis en 5.4 donc je modifie config>database.php pour enlever les mb4
- Je créé mes models et mes migrations<br>
```php artisan make:model Post -m```<br>
```php artisan make:model Address -m```
- Je créé mes controllers<br>
```php artisan make:controller PostsController --resource```<br>
```php artisan make:controller AddressesController --resource```<br>
```php artisan make:controller UsersController --resource```
- Je créé mes vues
- Je créé mon authentification<br>
```php artisan make:auth```
- Je créé mes routes
- Je remplis mes migrations
- Je migre<br>
```php artisan migrate```
- Je lis mes méthodes de controllers à mes vues
- Je met en place mes relations
- Je remplis mes vues
- Je remplis mes controlleurs


### Si je récupère le projet d'un GIT:
- git clone
- composer update
- npm i
- Créer la BDD
- Modifier le .env
- php artisan key:generate
- php artisan config:clear
- php artisan migrate
- Configurer le localhost