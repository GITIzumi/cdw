<?php
session_start();
ini_set('display_errors','on');
error_reporting(E_ALL);

// appel du fichier de config
include_once('inc/config.php');

// appel des classes
require_once('Class/Connexion.php');
require_once('Class/Article.php');
require_once('Class/ArticleManager.php');

?>


<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercice 8</title>
  <script type="text/javascript" src="../../js/jquery-3.2.0.min.js"></script>
  <script type="text/javascript" src="../../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
  <link rel="stylesheet" href="../../font/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/bouton.css">
</head>
<body>
<div class="container general">

  <div class="page-header">
    <h1>CDW <small>App Wiki</small></h1>
  </div>

  <div class="row">
    <div class="col-xs-12 col-md-12">
      <?php

      // Initialisation connexion à la bdd
      $gb_cnx         = new Connexion();
      $ArticleManager = new ArticleManager();

      //  $article1 = $ArticleManager->getArticleById(1);
      //  echo $article1->get_art_sTitre();

      $articlebycategorie = $ArticleManager->getArticleByCategorie(3);

      echo "<pre>";
      var_dump($articlebycategorie);
      echo "</pre>";

      foreach ($articlebycategorie as $key => $value)
      {
        echo "<pre>";
        var_dump($value["art_sTitre"]);
//        var_dump($value["usr_sNom"]);
        echo "</pre>";
      }



      $insertarticle = new Article();
      $values = array(
        "usr_id"             => 1,
        "art_sTitre"         => "Faire un insert",
        "art_sContenu"       => "bla bla bla bla",
        "art_dDateCreation"  => "2001-03-10 17:16:18",
        "art_dDateLastModif" => NULL,
        "art_bActif"         => 0,
        "art_sSlug"          => 'Faire un insert'
      );

      $insertarticle->hydrate($values);
      echo "<pre>";
      var_dump($insertarticle);
      echo "</pre>";

      $requete2 = 'INSERT INTO article (
        usr_id, 
        art_sTitre, 
        art_sContenu, 
        art_dDateCreation, 
        art_dDateLastModif, 
        art_bActif, 
        art_sSlug
        ) VALUES (
        :usr_id, 
        :art_sTitre, 
        :art_sContenu, 
        :art_dDateCreation, 
        :art_dDateLastModif, 
        :art_bActif, 
        :art_sSlug
        )';

      $insert_id =  $gb_cnx->queryOther($requete2, $values);

      if ($insert_id > 0 )
      {
        echo 'Insertion réussie';
      }
      else
      {
        echo 'Echec d\'insertion';
      }

      ?>
    </div>
  </div>
  <?php
  include_once('../../boutonretour.php');
  ?>
</div>

<script type="text/javascript">

</script>
</body>
</html>



