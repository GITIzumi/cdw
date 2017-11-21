<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercice 5</title>
    <script type="text/javascript" src="../js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
    <link rel="stylesheet" href="../font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bouton.css">
  </head>
  <body>
    <div class="container general">

      <div class="page-header">
        <h1>CDW <small>Objet test</small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12">
          <?php

          include_once('AppWiki/Class/Article.php');

          $tableau = array(
           sTitre         => "Titre",
           iAuteurId      => "1",
           sContenu       => "Contenu",
           dDateAjout     => "21/11/17",
           dDateLastModif => "21/11/17",
           bActif         => 1,
           aCategories    => NULL
          );

          $article = new Article();

          $article->hydrate($tableau);

          echo "<pre>";
          var_dump($tableau);
          echo "</pre>";
          ?>
        </div>
      </div>
      <?php
      include_once('../boutonretour.php');
      ?>
    </div>

    <script type="text/javascript">

    </script>
  </body>
</html>
