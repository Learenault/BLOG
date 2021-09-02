<?php

// Recupère les éléments indispensable à chaque classe pour éviter les doublons
require_once('librairies/database.php');
abstract class Model{

    // ni public, ni privé = disponible pour les classes enfants
protected $pdo;
protected $table;

    public function __construct()
    {
        $this->pdo = getPdo();
   
    }



    // pour trouver une chose dans la base de donnée 
    public function find(int $id){

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query-> execute(['id' => $id]);
        $item = $query->fetch();
        
        return $item;
        }

    //pour trouver toutes les choses dans la base de donnée
    // insertion d'une string qui n'est pas obligatoire
        public function findAll(?string $order = "date_creation_article DESC"): array
        {
            $sql = "SELECT * FROM {$this->table}";

            if($order){
                $sql .= " ORDER BY " . $order;
            }

            $resultat = $this->pdo->query($sql);
            $items = $resultat->fetchAll();
        
            return $items;
        }
   
            

}
?>