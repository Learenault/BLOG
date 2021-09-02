
<?php

require_once('librairies/database.php');

class Comment extends Model{

    

// fonction pour afficher tous les commentaires de l'article passé en GET
    public function findAllComments(int $article_id){

    $query = $this->pdo->prepare("SELECT * from commentaires where article_id = :article_id"); 
    $query-> execute(['article_id' => $article_id]);
    $commentaires = $query->fetchAll();
    
    
    return $commentaires;
    }
    
    
    public function insert(string $auteur, string $contenus, string $article_id) : void{
    $query = $this->pdo->prepare('INSERT INTO commentaires SET auteur = :auteur, contenus = :contenus, article_id = :article_id, date_de_creation = NOW()');
    $query->execute(compact('auteur','contenus','article_id'));
    }
}
?>