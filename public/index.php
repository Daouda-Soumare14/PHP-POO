<?php

// Importation des classes nécessaires
use Src\source\App;
use Router\path\Router;

// Inclusion du fichier d'autoloading de Composer
require '../vendor/autoload.php';

// Définition de la constante BASE_VIEW_PATH contenant le chemin vers le répertoire des vues
define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);

// Création d'une instance de la classe Router pour gérer le routage des requêtes HTTP
$router = new Router();

// Enregistrement des routes pour les chemins '/Prof_Jatsu_Youtube_Routeur/public/index.php' et '/Prof_Jatsu_Youtube_Routeur/public/store.php'
// avec les méthodes correspondantes des contrôleurs associés
$router->get('/Prof_Jatsu_Youtube_Routeur/public/index.php', ['Controllers\controller\HomeController', 'index']);
// Définition d'une route GET avec le chemin '/Prof_Jatsu_Youtube_Routeur/public/orders.php'
// Cette route est associée à une action dans le contrôleur OrderController
// Lorsque cette route est accédée via une requête HTTP GET, elle déclenchera l'action 'index' du contrôleur OrderController
$router->get('/Prof_Jatsu_Youtube_Routeur/public/orders.php', ['Controllers\controller\OrderController', 'index']);
$router->post('/Prof_Jatsu_Youtube_Routeur/public/index.php', ['Controllers\controller\HomeContactController', 'store']);

// Création d'une instance de la classe App en passant le routeur et les données de la requête actuelle (URI et méthode HTTP)
$app = new App($router, [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
]);

// Exécution de l'application
$app->run();
