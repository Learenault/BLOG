<?php 

// Ce fichier doit afficher un article et ses commentaires ! //
// Pour ce faire, nous devons nous connecter à la base de données, récurérer l'ID par GET de l'article en question et afficher par la suite l'articles et les commentaires//
require('./header.php');
require_once('librairies/models/Article.php');
require_once('librairies/models/Comment.php');

// appels des differentes fonctions (base de données, article, commentaire)

$id = $_GET["id"];

$model = new Article();
$article = $model->find($id);
$models2 = new Comment();

$nomcomplet = $article['id'].'.'.$article['photo'];

?>
<section class="detail_article">
<div id="detail_article_img">
<img src="templates/images/<?php echo $nomcomplet?>" alt="image" width="80%">
</div>
<h1><?= $article['titre']?></h1>
<small>Ecrit le <?= $article['date_creation_article'] ?></small>
<p><?= $article['contenus_article'] ?></p>
</section>
<?php





$commentaire = $models2->findAllComments($id);

?>
<section class="commentaires_affiche_ajout">
<div class="commentaires_article">
  <?php if(count($commentaire) === 0): ?>

   <h3>Il n'y a pas encore de commentaires pour cet article... Soyez le premier !</h3>
<?php else: ?>
  
  <h3>Il y'a déjà <?php echo (count($commentaire)) ?> réactions : </h3>
        <div class="commentaire"><?php
        foreach($commentaire as $commentaire){
        ?><div class="commentaire-unit">
        <?php
        ?><h4>Commentaires de <?php echo $commentaire['auteur'] ?> :</h4><?php
        ?><small>Ecrit le : <?php echo $commentaire['date_de_creation']?></small><?php
        ?><p> <?php echo $commentaire['contenus']?></p>
        <?php
        ?></div><?php
    } ?> 
    
  </div>
    <?php endif ; ?>
<a href="index.php"><button id="retour">Retour aux articles</button></a>




<?php
?>
  </div>
<div id="ajout_commentaire">
    <h3>Ajouter votre réaction :</h3>
<form action="templates/save_comment.php?id=<?php echo $article_id ?>" method="POST">
    <input type="text" name="auteur" id="auteur" placeholder="auteur" required>
    <br>
    <textarea name="contenus" id="contenus" cols="30" rows="15" placeholder="votre commentaire..."></textarea>
    <br>
    <input type="submit">
</form>
</div>
</section>
  <?php
  require './footeur.php';
?>

