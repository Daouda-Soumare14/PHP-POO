<?php

// Espace de noms pour la classe App
namespace Src\source;

// Importation de la classe Router et de l'exception RouteNotFoundException
use Router\path\Router;
use Exception\exception\RouteNotFoundException;

// Définition de la classe App
class App 
{
    // Constructeur de la classe prenant comme paramètres une instance de Router et un tableau contenant les données de la requête
    public function __construct(private Router $router, private array $request)
    {}

    // Méthode publique pour exécuter l'application
    public function run()
    {
        try {
            // Résout la route en utilisant le routeur et l'URI de la requête, puis affiche le résultat
            echo $this->router->resolve($this->request['uri'], $this->request['method']);
        } catch (RouteNotFoundException $e) {  // Attrape une exception de type RouteNotFoundException
            // Affiche le message de l'exception ainsi que les informations sur le fichier et la ligne où elle s'est produite
            echo $e->getMessage() . ' dans le fichier '. $e->getFile(). ' a la ligne N° '. $e->getLine();
        }    
    }
}
