<?php

namespace Src\source;

use Router\path\Router;
use Exception\exception\RouteNotFoundException;

class App 
{
    public function __construct(private Router $router, private array $request)
    {}

    public function run() // Déclaration de la méthode run pour exécuter l'application
    {
        try {
            echo $this->router->resolve($this->request['uri'], $this->request['method']); // Résout la route en utilisant le routeur et l'URI de la requête, puis affiche le résultat
        } catch (RouteNotFoundException $e) {  // Attrape une exception de type RouteNotFoundException
            echo $e->getMessage() . ' dans le fichier '. $e->getFile(). ' a la ligne N° '. $e->getLine(); // Affiche le message de l'exception ainsi que les informations sur le fichier et la ligne où elle s'est produite
        }    
    }
}