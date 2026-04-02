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

<<<<<<< HEAD
$routes->get('voirlesliaisons', 'Visiteur::voirlesliaisons');
=======
$routes->match(['get', 'post'], 'voirlesliaisons', 'Visiteur::voirLesLiaisons');
>>>>>>> 128827b574f1af997b87aa7936ae421d3dc674f6
