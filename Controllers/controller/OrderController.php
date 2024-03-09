<?php

// Définition de l'espace de noms pour le contrôleur
namespace Controllers\controller;

// Importation de la classe Renderer depuis l'espace de noms Src\source
use Src\source\Renderer;

// Importation de l'énumération OrderStatus depuis l'espace de noms Src\enum
use Src\enum\OrderStatus;

// Importation de la classe Order depuis l'espace de noms Models\mesModels
use Models\mesModels\Order;

// Définition de la classe du contrôleur OrderController
class OrderController
{
    // Définition de la méthode index qui renvoie un objet Renderer
    public function index() : Renderer 
    {
        // Instanciation d'un nouvel objet Order
        $orderModel = new Order();

        // Appel de la méthode withStatus() de l'objet Order avec l'état "Delivered"
        $orders = $orderModel->withStatus(OrderStatus::Delivered);

        // Renvoie d'une vue Renderer avec le fichier 'orders/index' et les données compactées sous le nom 'orders'
        return Renderer::make('orders/index', compact('orders'));
    }
}
