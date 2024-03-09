<?php

// Espace de noms pour la classe Router
namespace Router\path;

// Importation de l'exception RouteNotFoundException
use Exception\exception\RouteNotFoundException;

// Définition de la classe Router
class Router
{
    // Tableau privé pour stocker les routes et les actions associées
    private array $routes = [];

    // Méthode publique pour enregistrer une route avec son action associée dans le tableau des routes
    public function register(string $path, callable|array $action, string $HTTPVerb): void
    {
        $this->routes[$HTTPVerb][$path] = $action;
    }

    // Méthode publique pour enregistrer une route GET
    public function get(string $path, callable|array $action): void
    {
        $this->register($path, $action, 'GET');
    }

    // Méthode publique pour enregistrer une route POST
    public function post(string $path, callable|array $action): void
    {
        $this->register($path, $action, 'POST');
    }

    // Méthode publique pour récupérer toutes les routes enregistrées
    public function getRoutes(): array
    {
        return $this->routes;
    }

    // Méthode publique pour résoudre une URI donnée
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
        

        // Vérifie si l'action est callable
        if (is_callable($action)) {
            // Exécute l'action et retourne le résultat
            return $action();
        }

        // Vérifie si l'action est un tableau
        if (is_array($action)) {
            // Récupère le nom de la classe et de la méthode à partir du tableau
            [$className, $method] = $action;
            // Vérifie si la classe existe et si la méthode existe dans la classe
            if (class_exists($className) && method_exists($className, $method)) {
                // Instancie la classe
                $class = new $className();
                // Appelle la méthode de la classe et retourne le résultat
                return call_user_func_array([$class, $method], []);
            }
        }

        // Si l'action n'est ni callable ni un tableau valide, lance une exception
        throw new RouteNotFoundException("L'action associée à cette route n'est pas callable.");
    }
}
