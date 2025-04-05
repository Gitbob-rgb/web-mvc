// routes.php
<?php
require_once 'core/Router.php';
require_once 'controllers/EntrepriseController.php';
require_once 'controllers/PiloteController.php';
require_once 'controllers/EtudiantController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/WishListController.php';

// Initialisation du routeur
$router = new Router();

// Routes pour l'authentification
$router->get('login', 'AuthController@login'); // Formulaire de login
$router->post('login', 'AuthController@login'); // Traiter la connexion (POST)
$router->get('logout', 'AuthController@logout'); // Déconnexion

// Routes pour Pilote
$router->get('liste_pilotes', 'PiloteController@liste'); // Liste des pilotes
$router->get('pilote/affiche/{id}', 'PiloteController@affiche'); // Afficher les entreprises notées par un pilote

// Routes pour Etudiant
$router->get('liste_etudiants', 'EtudiantController@liste'); // Liste des étudiants

// Routes pour Entreprise
$router->get('liste_entreprises', 'EntrepriseController@liste'); // Liste des entreprises

// Routes pour Wish List
$router->get('wish_list', 'WishListController@index'); // Afficher la wish list de l'étudiant

// Routes pour les dashboards
$router->get('admin_dashboard', 'AdminController@dashboard'); // Dashboard de l'admin
$router->get('pilote_dashboard', 'PiloteController@dashboard'); // Dashboard du pilote
$router->get('etudiant_dashboard', 'EtudiantController@dashboard'); // Dashboard de l'étudiant

// Traitement de la requête en cours
$router->handleRequest();
