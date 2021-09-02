<?php
require('header.php');
require_once('librairies/models/Article.php');
require_once('librairies/utils.php');


?><section class="principal"><?php 
$model = new Article("");
$articles = $model->findAll();
?>
<div id="nos_articles"><h1>Nos derniers articles</h1></div>


<?php

 foreach($articles as $article): 
 $nomcomplet = $article['id'].'.'.$article['photo'];
 ?>
 
 <div id="un_article">
    <div id="flex1">
    <h2><?= $article['titre']?></h2>
    <small>Ecrit le <?= $article['date_creation_article'] ?></small>
    <p><?= $article['introduction']?></p>
    <a href="article.php?id=<?= $article['id'] ?>"> Lire la suite </a>
    </div>
    <div id="flex2">
    <img src="templates/images/<?php echo $nomcomplet?>" alt="image" width="80%">
    </div>
    </div>
    <?php endforeach;

$pageTitle = "Accueil";

// appel de la fonction redirect -> utils 
?></section><?php
//redirect("article.php?id=".$article_id);


require './footeur.php';

?>