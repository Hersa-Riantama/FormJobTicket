<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group(
    'index',
    ['namespace' => '\Modules\Form\Controllers'],
    function ($routes) {
        $routes->get('/', 'Form::index');
    }
);

$routes->group(
    '',
    ['namespace' => '\Modules\Form\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('form', 'Form::form');
        $routes->get('formc2/(:segment)', 'Form::detailFormc2/$1');
        $routes->get('tampilbuku', 'Form::getBukuOptions');
        $routes->get('tampilbuku/(:segment)', 'Form::getBukuDetails/$1');
        $routes->post('form', 'Form::createForm');
        $routes->post('updateForm/(:segment)', 'Form::updateForm/$1');
        $routes->post('approveTiket', 'Form::approveTicket');
        $routes->post('approveOrderKoord', 'Form::approvedOrderKoord');
        $routes->post('approveAccKoord', 'Form::approvedAccKoord');
        $routes->post('approved', 'Form::approveTicketD');
        $routes->post('disapproveTicket', 'Form::disapproveTicket');
        $routes->get('detail/(:segment)', 'Form::detailForm/$1');
        $routes->post('tambahC2', 'Form::createFormc2');
        $routes->post('saveC2', 'Form::saveFormc2');
        $routes->get('tiket/ekstensi', 'Form::getEkstensiKonten');
        $routes->delete('delete/(:segment)', 'Form::delete/$1');
        $routes->get('tiket/getData', 'Form::getData');
        $routes->delete('tiket/hapus/(:segment)', 'Form::hapus/$1');
    }
);

$routes->post('/get-email', '\Modules\User\Controllers\User::getEmail');
$routes->post('/kategori', '\Modules\Kategori\Controllers\Kategori::getKategori');

$routes->group(
    '',
    ['namespace' => '\Modules\Form\Controllers'],
    ['filter' => 'sessionCheck'],
    function ($routes) {
        $routes->get('listform', 'Form::data_form');
    }
);
