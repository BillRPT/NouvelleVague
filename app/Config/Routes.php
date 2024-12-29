<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Moncontroleur::index');
$routes->get('/Moncontroleur/nbContacts', 'Moncontroleur::nbContacts');
$routes->get('/Moncontroleur/lesContacts', 'Moncontroleur::lesContacts');
$routes->get('/Moncontroleur/index', 'Moncontroleur::index');
$routes->get('/Moncontroleur/ajouterContacts', 'Moncontroleur::ajouterContacts');
$routes->post('Moncontroleur/ajouterContacts', 'Moncontroleur::ajouterContacts');

$routes->get('Moncontroleur/testConnexion', 'Moncontroleur::testConnexion');
$routes->post('Moncontroleur/testConnexion', 'Moncontroleur::testConnexion');