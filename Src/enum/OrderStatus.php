<?php

// Définition de l'espace de noms pour l'énumération OrderStatus
namespace Src\enum;

// Définition de l'énumération OrderStatus
enum OrderStatus : int
{
    // Définition des différentes valeurs de l'énumération avec leurs attributs
    case Delivered  = 1; // Valeur 1 représente l'état "Livré"
    case Cancelled  = 2; // Valeur 2 représente l'état "Annulé"
    case Processing = 3; // Valeur 3 représente l'état "En cours"

    // Définition d'une méthode toFrench qui convertit l'état de la commande en français
    public function toFrench() : string
    {
        // Utilisation d'une expression match pour associer chaque valeur de l'énumération à une chaîne de caractères en français
        return match($this)
        {
            self::Delivered => 'Livré',    // Si la valeur est Delivered, retourne 'Livré'
            self::Cancelled => 'Annulé',   // Si la valeur est Cancelled, retourne 'Annulé'
            self::Processing => 'En cours' // Si la valeur est Processing, retourne 'En cours'
        };
    }
}

// Fin de la définition de l'énumération OrderStatus
