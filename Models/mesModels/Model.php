<?php

namespace Models\mesModels;

use Src\source\Constant;

class Model
{
    protected static \PDO $pdo;  // Propriété statique pour stocker la connexion PDO
    protected string $table; // Propriété pour stocker le nom de la table

    public function __construct()
    {
        try {
            // Tentative de connexion à la base de données en utilisant les informations de Constant
            static::$pdo = new \PDO(
                'mysql:dbname=' . Constant::DB_NAME . '; host=' . Constant::DB_HOST,
                Constant::DB_USERNAME,
                Constant::DB_PASSWORD,
                [
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }
        // Génération du nom de la table en prenant le troisième élément du namespace de la classe et ajoutant un "s" à la fin
        $this->table = strtolower(explode('\\', get_class($this))[2]) . 's';
    }

    protected function getPDO(): \PDO // Méthode pour récupérer la connexion PDO
    {
        return static::$pdo; // Retourne la connexion PDO stockée
    }

    public function all(): array
    {
        $statement = $this->getPDO()->query("SELECT * FROM {$this->table}"); // Exécution d'une requête SQL pour récupérer toutes les lignes
        return $statement->fetchAll(); // Renvoie un tableau contenant toutes les lignes
    }

    public function where(string $column, int $value): array
    {
        // Prépare une requête SQL pour sélectionner toutes les colonnes de la table associée à cet objet
        // où la valeur de la colonne spécifiée correspond à la valeur fournie en paramètre
        $statement = $this->getPDO()->prepare("SELECT * FROM {$this->table} WHERE {$column} = ?");

        // Exécute la requête SQL en remplaçant le paramètre de la clause WHERE par la valeur fournie
        $statement->execute([$value]);

        // Récupère toutes les lignes de résultats de la requête et les retourne sous forme de tableau
        return $statement->fetchAll();
    }
}
