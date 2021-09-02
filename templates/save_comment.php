
<?php

require_once('../librairies/database.php');
require_once('../librairies/utils.php');
$article = new Article();
$comment = new Comment();

$auteur = null;
if(!empty($_POST['auteur'])){
    $auteur = $_POST['auteur'];
}

$contenus = null;
if(!empty($_POST['contenus'])){
    $contenus = $_POST['contenus'];
}

$article_id = $_GET["id"];

$article = $article->find($article_id);

$comment->insert($auteur, $contenus,$article_id);
    


redirect("/BLOG/article.php?id=".$article_id);
?>