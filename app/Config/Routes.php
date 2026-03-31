<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('accueil', 'Visiteur::accueil');
$routes->match(['get', 'post'], 'seconnecter', 'Visiteur::seConnecter');
$routes->match(['get', 'post'], 'creeruncompte', 'Visiteur::creerUnCompte');
$routes->match(['get', 'post'], 'sedeconnecter', 'Visiteur::seDeconnecter');

