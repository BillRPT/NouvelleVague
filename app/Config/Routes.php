<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Moncontroleur::index');
$routes->get('/', 'c_Connexion::afficherConnexion');