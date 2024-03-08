<?php

namespace Router\path;

use Exception\exception\RouteNotFoundException;

class Router
{
    // Tableau privé pour stocker les routes et les actions associées
    private array $routes; 

    // Méthode publique register pour enregistrer une route avec son action associée dans le tableau des routes.
    public function register(string $path, callable|array $action, string $HTTPVerb): void
    {
        $this->routes[$HTTPVerb][$path] = $action; // le path sera la cle et action sera la valeur
    }

    public function get(string $path, callable|array $action) : void
    {
        $this->register($path, $action, 'GET');
    }
    
    public function post(string $path, callable|array $action) : void
    {
        $this->register($path, $action, 'POST');
    }

    public function getRoutes() : array
    {
        return $this->routes;
    }

   /* Méthode publique resolve pour résoudre une URI donnée. Elle extrait 
    le chemin de l'URI (en ignorant les paramètres de requête), récupère 
    l'action associée à ce chemin à partir du tableau des routes, puis
     vérifie si l'action est callable. Si l'action n'est pas callable,
      une exception RouteNotFoundException est levée. Sinon, l'action est
       exécutée et son résultat est retourné.*/

    public function resolve(string $uri, string $requestMethod): mixed
    {
        // Récupère le chemin de l'URI en ignorant les paramètres de requête
        $path = explode('?', $uri)[0];

        // Vérifie si le chemin est enregistré dans le routeur
        if (!array_key_exists($requestMethod, $this->routes)) {
            throw new RouteNotFoundException();
        }

        // Si le chemin existe dans le routeur, récupère l'action associée
        $action = $this->routes[$requestMethod][$path] ?? null;

        // soit on est dans un callable on execute l'action
        // Vérifie si l'action est callable
        if (is_callable($action)) {
            // Exécute l'action et retourne le résultat
            return $action();
        }
        // soit on est dans un tableau
        // on verifie si c'est un array
        if(is_array($action))
        {
            // si c bien un tableau on retourne le nom de la class(HomeController) a $className et le nom de la method a $method
            [$className, $method] = $action;
            // on verifie si la class existe qui prend en parametre le nom de la class et verifie si la methode existe qui prend en parametre le nom de la class et de la method
            if(class_exists($className) && method_exists($className, $method))
            {
                // s'il existe on instancier notre class
                $class = new $className();
                // on utilise la fonction call_user_func_array qui va predre en parametre une instance de la class et la method; il peut aussi prendre un argument
                return call_user_func_array([$class, $method], []);
            }
        }
        // sinon on retourne l'exception
        throw new RouteNotFoundException("L'action associée à cette route n'est pas callable.");
    }
}
