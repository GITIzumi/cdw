<?php
 ini_set('display_errors','on');
 error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercice 7</title>
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
        <h1>CDW <small>Class Connexion</small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12">
          <p>Remettre la class Connexion.moiphp</p>
          <?php

          include_once('connexion.php');
          include_once('AppWiki/Class/Connexion.php');

          $values = array(
            'sNom'    => 'Toto',
            'sPrenom' => 'Gugusse',
            'sMail'   => 'tottoo@gmail.com',
            'sPwd'    => hash('sha512','momo')
          );
//          $requete = 'INSERT INTO user
//          (
//           usr_sNom,
//           usr_sPrenom,
//           usr_sMail,
//           usr_sPwd
//           ) VALUES (
//           :sNom,
//           :sPrenom,
//           :sMail,
//           :sPwd
//           )';

          $requete = 'SELECT * FROM user ';

          $requeterie = new Connexion();
          $panier = $requeterie->fetchSelect($requete, $values);

          if (count($panier)>0)
          {
            foreach ($panier as $key => $value)
            {
              echo "<pre>";
              var_dump($value["usr_sPrenom"]);
              var_dump($value["usr_sNom"]);
              echo "</pre>";
            }
          }
          else
          {
            echo "<p>Aucuns résultats</p>";
          }

//          echo "<pre>";
//          var_dump($panier);
//          echo "</pre>";
//
//          echo "<hr>";



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
