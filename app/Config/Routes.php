<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('accueil', 'Visiteur::accueil');

$routes->match(['get', 'post'], 'seconnecter', 'Visiteur::seConnecter');    
$routes->match(['get', 'post'], 'creeruncompte', 'Visiteur::creerUnCompte');
$routes->match(['get', 'post'], 'sedeconnecter', 'Client::seDeconnecter');
$routes->match(['get', 'post'], 'sedeconnecter', 'Administrateur::seDeconnecter');
$routes->match(['get', 'post'], 'modifiermoncompte', 'Client::modifierMonCompte');
$routes->match(['get', 'post'], 'afficherreservations', 'Client::afficherReservations');

$routes->get('voirlesliaisons/(:alphanum)', 'Visiteur::voirlesliaisons/$1');
$routes->get('voirlesliaisons', 'Visiteur::voirlesliaisons');
$routes->match(['get', 'post'], 'voirlesliaisons', 'Visiteur::voirLesLiaisons');

$routes->match(['get', 'post'], 'voirleshoraires/(:alphanum)', 'Visiteur::voirleshoraires/$1');
$routes->match(['get', 'post'], 'voirleshoraires', 'Visiteur::voirleshoraires');

$routes->match(['get', 'post'], 'reserver/(:alphanum)', 'Client::reserver/$1');