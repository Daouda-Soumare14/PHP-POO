<?php

// Définition de l'espace de noms pour la classe Order
namespace Models\mesModels;

// Importation de l'énumération OrderStatus depuis l'espace de noms Src\enum
use Src\enum\OrderStatus;

// Définition de la classe Order qui étend la classe Model
class Order extends Model
{
    // Définition de la méthode withStatus qui prend un objet OrderStatus en argument et renvoie un tableau
    public function withStatus(OrderStatus $orderStatus) : array
    {
        // Appel de la méthode where() de la classe parente (probablement Model) avec le champ 'status' et la valeur de l'état de la commande
        return $this->where('status', $orderStatus->value);
    }
}
