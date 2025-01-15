<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Controleur principal
$routes->get('/', 'Moncontroleur::index');
$routes->get('connexion', 'c_Connexion::index');
$routes->post('c_Connexion/connexionUtilisateur', 'c_Connexion::connexionUtilisateur');
$routes->get('inscription', 'c_Inscription::index');
$routes->post('c_Inscription/inscriptionUtilisateur', 'c_Inscription::inscriptionUtilisateur');