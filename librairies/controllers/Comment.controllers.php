<?

// CODE NECESSAIRE POUR GERER LES ACTIONS // ACTIONS POUR GERER LES ARTICLES //

namespace controlers;

require('header.php');
require_once('librairies/models/Article.php');
require_once('librairies/utils.php');

class Article 
{
public function index(){


$model = new Article("");
$articles = $model->findAll();
} }
?>