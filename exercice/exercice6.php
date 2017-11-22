<?php
 ini_set('display_errors','on');
 error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercice 6</title>
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
        <h1>CDW <small>Connexion PDO</small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12">
          <?php

          try
          {
            $connexion = new PDO(
                'mysql:host=db710754300.db.1and1.com;dbname=db710754300',   // mysql::hote et dbname
                'dbo710754300',                                        // user
                'V5bR+swe',                                             // mdp
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')       // Pour lui dire qu'on veut récupérer du utf-8
            );
          }
          catch(Exception $e)
          {
            var_dump($e->getMessage());
            die('Pour faire plaisir à Joris');
          }
          echo "<pre>";
          var_dump($connexion);
          echo "</pre>";

          echo "<p>Requête sans variables</p>";

          $requete1 = 'SHOW COLUMNS FROM user';
          $resultats = $connexion->query($requete1);    // exécution de la requete
          $resultats->setFetchMode(PDO::FETCH_OBJ);    //  ou FETCH_ASSOC
          while($resultat = $resultats->fetch())
          {
            echo "<pre>";
            var_dump($resultat);
            echo "</pre>";
          }
          $resultats->closeCursor();

          // Requete variables
          $requete2 = 'INSERT INTO user
          (
           usr_sNom, 
           usr_sPrenom,
           usr_sMail,
           usr_sPwd
           ) VALUES (
           :nom,
           :prenom,
           :mail,
           :pass
           )';

          $nom    = 'toto';
          $prenom = 'Gudule';
          $mail   = 'toto@aries.grenoble';
          $pass   = hash('sha512',uniqid());

          $stmt = $connexion->prepare($requete2); //On prépare la requête
          $stmt->bindValue('nom',$nom, PDO::PARAM_STR);
          $stmt->bindValue('prenom',$prenom, PDO::PARAM_STR);
          $stmt->bindValue('mail',$mail, PDO::PARAM_STR);
          $stmt->bindValue('pass',$pass, PDO::PARAM_STR);

//          $stmt->execute();

          // PDO::PARAM8STR / PARAM_NULL / PARAM_INT / PARAM_ BOOL

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
