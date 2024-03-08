<?php

use Src\source\App;
use Router\path\Router;

require '../vendor/autoload.php';

// Définition de la constante BASE_VIEW_PATH qui contient le chemin vers le répertoire des vues
define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);

// Création d'une instance de la classe Router pour gérer le routage des requêtes HTTP
$router = new Router();

// Enregistrement d'une route pour le chemin '/Prof_Jatsu_Youtube_Routeur/public/index.php' qui pointe vers la méthode 'index' du contrôleur 'HomeController'
$router->get('/Prof_Jatsu_Youtube_Routeur/public/index.php', ['Controllers\controller\HomeController', 'index']);
$router->post('/Prof_Jatsu_Youtube_Routeur/public/store.php', ['Controllers\controller\HomeContactController', 'store']);

// Création d'une instance de la classe App en passant le routeur et l'URI de la requête actuelle
// Puis appel de la méthode 'run()' pour exécuter l'application
(new App($router, ['uri' => $_SERVER['REQUEST_URI'], 
                  'method' => $_SERVER['REQUEST_METHOD']]))->run();

