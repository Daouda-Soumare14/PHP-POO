<?php

// Espace de noms pour les tests unitaires
namespace Tests\Unit;

// Utilisation de la classe de base pour les tests PHPUnit
use PHPUnit\Framework\TestCase;

// Importation de la classe Router à tester
use Router\path\Router;

// Définition de la classe de test RouterTest, qui étend la classe TestCase de PHPUnit
class RouterTest extends TestCase
{
    // Méthode de test pour vérifier l'enregistrement des routes GET
    public function test_it_registers_get_routes(): void
    {
        // Création d'une instance de Router
        $router = new Router();

        // Enregistrement d'une route GET dans le routeur
        $router->get('/Prof_Jatsu_Youtube_Routeur/public/index.php', ['Controllers\controller\HomeController', 'index']);

        // Assertion pour vérifier si les routes GET sont correctement enregistrées
        $this->assertEquals(
            // Tableau attendu de routes GET
            ['GET' => ['/Prof_Jatsu_Youtube_Routeur/public/index.php' => ['Controllers\controller\HomeController', 'index']]],
            // Obtention des routes actuellement enregistrées dans le routeur
            $router->getRoutes()
        );
    }

    // Méthode de test pour vérifier l'enregistrement des routes POST
    public function test_it_registers_post_routes(): void
    {
        // Création d'une instance de Router
        $router = new Router();

        // Enregistrement d'une route POST dans le routeur
        $router->post('/Prof_Jatsu_Youtube_Routeur/public/index.php', ['Controllers\controller\HomeController', 'index']);

        // Assertion pour vérifier si les routes POST sont correctement enregistrées
        $this->assertEquals(
            // Tableau attendu de routes POST
            ['POST' => ['/Prof_Jatsu_Youtube_Routeur/public/index.php' => ['Controllers\controller\HomeController', 'index']]],
            // Obtention des routes actuellement enregistrées dans le routeur
            $router->getRoutes()
        );
    }

    // Méthode de test pour vérifier qu'il n'y a aucune route avant l'enregistrement des routes
    public function test_there_is_no_routes_before_registering_routes(): void
    {
        $router = new Router();

        $this->assertEmpty($router->getRoutes());
    }
}
