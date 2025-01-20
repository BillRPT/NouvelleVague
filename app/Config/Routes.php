<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Controleur principal
$routes->get('/', 'Moncontroleur::index');
//Les différentes routes
$routes->get('connexion', 'c_Connexion::index');
$routes->post('c_Connexion/connexionUtilisateur', 'c_Connexion::connexionUtilisateur');
$routes->get('inscription', 'c_Inscription::index');
$routes->post('c_Inscription/inscriptionUtilisateur', 'c_Inscription::inscriptionUtilisateur');
$routes->get('deconnexion', 'c_Connexion::deconnexionUtilisateur');
$routes->get('immersion-foret', 'c_ImmersionForet::index');
$routes->get('culture', 'c_Culture::index');

