<?php

namespace Controllers\controller;

use Models\mesModels\User;
use Src\source\Renderer;

class HomeController
{
    public function index() : Renderer // Déclaration de la méthode index qui renvoie un objet Renderer
    {
        // Création d'une instance de la classe User pour interagir avec la table des utilisateurs
        $userModel = new User();

        // Récupération de tous les utilisateurs à partir du modèle User
        $users = $userModel->all();

        // Création et renvoi d'un objet Renderer pour afficher la vue 'home/index' en passant les utilisateurs en tant que paramètre
        return Renderer::make('home/index', compact('users'));

    }
}