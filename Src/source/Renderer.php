<?php

namespace Src\source;

class Renderer
{
    public function __construct(private string $viewPath, private array $params)
    {}

    public function view() : string
    {
        ob_start(); // Démarre la temporisation de sortie

        extract($this->params); // Extrait les paramètres pour les rendre accessibles dans la vue

        require BASE_VIEW_PATH . $this->viewPath .'.php'; // Inclut le fichier de vue

        return ob_get_clean(); // Récupère le contenu du tampon de sortie et le vide
    }

    public static function make(string $viewPath, array $params) : static // Méthode statique pour créer une nouvelle instance de Renderer
    {
        return new static($viewPath, $params); // Retourne une nouvelle instance de Renderer  
    }

    public function __toString() // Méthode magique pour convertir l'objet en chaîne de caractères
    {
        return $this->view(); // Retourne la vue rendue sous forme de chaîne de caractères
    }
}