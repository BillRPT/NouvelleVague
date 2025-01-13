<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Controleur principal
$routes->get('/', 'Moncontroleur::index');
$routes->get('c_Connexion/afficherConnexion', 'c_Connexion::afficherConnexion');