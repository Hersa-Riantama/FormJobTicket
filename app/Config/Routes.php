<?php

use CodeIgniter\Router\RouteCollection;

/*
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Include module routes
$modulePath = ROOTPATH . 'app/Modules/';
$modules = scandir($modulePath);

foreach ($modules as $module) {
    if ($module === '.' || $module === '..') continue;
    $moduleRoutes = $modulePath . $module . '/Config/Routes.php';
    if (file_exists($moduleRoutes)) {
        require $moduleRoutes;
    }
}
