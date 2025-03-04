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
$routes->get('administration', 'c_Administration::index');
$routes->get('sport-mecanique', 'c_SportMecanique::index');
$routes->get('accueil', 'Accueil::index');
$routes->get('consulterinscriptionEvenement', 'c_Administration::inscriptionEvenement');
//Mettre any pour faire passer en para des valeurs
$routes->get('listeparticipantEvenement/(:any)', 'c_Administration::listeparticipantEvenement/$1');
$routes->get('consulterpopulariterEvenement', 'c_Administration::lesevenementsPopulaire');
$routes->get('creerEvenements', 'c_Administration::creerEvenements');
$routes->post('c_Administration/creerEvenements', 'c_Administration::creerEvenements');
$routes->get('retour', 'Moncontroleur::index');
$routes->get('supprimerEvenement', 'c_Administration::supprimerEvenement');

$routes->get('supressiondeEvenement/(:any)', 'c_Administration::supressiondeEvenement/$1');

$routes->get('modifierEvenement', 'c_Administration::modifierEvenement');

$routes->get('modificationdelevenement/(:any)', 'c_Administration::modificationdelevenement/$1');

$routes->post('modificationdelevenement/(:any)', 'c_Administration::modificationdelevenement/$1');

$routes->get('evenementpopulairePdf', 'c_Administration::evenementpopulairePdf');
$routes->get('accueil', 'Accueil::index');
// Réservation (calendrier / wizard simplifié)
$routes->get('calendrier-wizard', 'c_Reservation::calendrierWizard');
$routes->get('getEventsJson', 'c_Reservation::getEventsJson');
$routes->post('finaliserReservation', 'c_Reservation::finaliserReservation');

// Réservation simple (accès via Moncontroleur)
$routes->get('reservation', 'Moncontroleur::reservation');
$routes->post('reservation/reserve', 'Moncontroleur::reserve');

$routes->get('evenementpopulairePdf', 'c_Administration::evenementpopulairePdf');
