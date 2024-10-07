# Erlangga Media
 
### Prerequisites
1. PHP 7.4 or above
2. Composer required
2. CodeIgniter 4.4.8

### Installation Guide

Clone project to your project root folder
```bash
composer create-project Hersa-Riantama/FormJobTicket erlangga_media
```
Or
```bash
git clone https://github.com/Hersa-Riantama/FormJobTicket.git erlangga_media
```
Then
```bash
cd erlangga_media
``` 

Copy some require file to root folder (Upgrading to v4.4.8)
```bash
composer update
cp vendor/codeigniter4/framework/public/index.php public/index.php
cp vendor/codeigniter4/framework/spark spark
```

Copy `env` file
```bash
cp env .env
```

Run the composer update
```bash
composer update
```

Run the app, using different port, add options `--port=9000`
```bash
php spark serve
```


---
## Module Commands
```bash
php spark make:module [module] 
```

### Example
Create a buku module
```bash
php spark make:module buku
```

###  Result Directory
    App 
    ├── Config       
    │   └── Routes.php (Added group called buku)
    ├── Modules      
    │   └── Buku
    │       ├──  Controllers
    │           └──  Buku.php
    │       ├──  Models
    │           └──  BukuModel.php
    │       └──  Views
    │           └──  index.php
    └── ...  

### Route Group
After generate `Buku` Module, add a route group for the module at `App\Config\Routes.php`
```php
$routes->group(
    'buku', ['namespace' => '\Modules\Buku\Controllers'], function ($routes) {
        $routes->get('/', 'Buku::index');
    }
);
```

## PSR4
At `App/Config/Autoload.php`, you can configure your custom namespace:
```php
public $psr4 = [
    // Sample
    "$module" => APPPATH . "$module",

    // Base on Example above
    "Buku" => APPPATH . "Modules/Buku", // Example 
    // ...
];
```# FormJobTicket
