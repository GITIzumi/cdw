
<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercice 9</title>
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
    <h1>CDW <small>Expressions régulières</small></h1>
  </div>

  <div class="row">
    <div class="col-xs-12 col-md-12">

      <?php
      $regex  = '#hello#i';          // i sert à le rendre insensible à la casse
      $regex  = '#hello|bonjour#i'; // l'un ou l'autre
      $regex  = '#[0-9]#';         // Les nombres
      $regex  = '#[A-Z]#';        // La présence de majuscule

      $string = 'hello les pro du php';
      $exists = preg_match($regex, $string);
      var_dump($exists);

      $regex  = '#^cours#';  // teste si "cours" est au début de la chaine
      $regex  = '#cours$#'; // teste si "cours" est à la fin de la chaine
      $chaine = 'Bienvenue dans le cours de php';
      preg_match($regex, $chaine);


      $string = 'Bienvenue 5 à Aries !';
      echo '<br>';
      echo $string;
      echo '<br>';

      echo '<p>Tester si Aries est contenu dans la chaine</p>';
      $regex= '#Aries#';
      echo '<pre>';
      echo $regex;
      echo '<br>';
        var_dump(preg_match($regex, $string));
      echo '</pre>';

      echo '<p>Tester si Aries est à la fin de la chaine</p>';
      $regex = '#Aries$#';
      echo '<pre>';
      echo $regex;
      echo '<br>';
      var_dump(preg_match($regex, $string));
      echo '</pre>';

      echo '<p>Test si le chaine contient des minuscultes et un à la fin</p>';
      $regex= '#[a-z]*!$#';
      echo '<pre>';
      echo $regex;
      echo '<br>';
      var_dump(preg_match($regex, $string));
      echo '</pre>';


      echo '<p>Test s\'il y a des chiffres </p>';
      $regex = '#[^0-9]#';
      $regex = '#\D#';
      echo '<pre>';
      echo $regex;
      echo '<br>';
      var_dump(preg_match($regex, $string));
      echo '</pre>';

//      $regex= '/^[0-9]{0,3}$/';


      echo "<p>Test de date";

      $date    = "06/12/196";
      $matches = explode($date,"/");

      if(preg_match("/(\d{2})\/(\d{2})\/(\d{4})$/", $date,$matches))
      {
        echo '<pre>';
        var_dump(checkdate((int) $matches[2],(int)$matches[1],(int) $matches[3]) );
        echo '</pre>';
      }
      else
      {
        echo "false" ;
      }


      $regex = '/^[a-z][a-z0-9_\-\.]{2,}@[a-z][a-z0-9_\-\.]{2,}\.[a-z]{2,4}$/';
      // Tester qu'une adresse mail contient :
      // - Des caractères alphanumériques mais aucun chiffre au ddébut
      // - Au moins 3 caractères, dont éventuellement . - et _ avant le @
      // - un @
      // - Au moins 3 caractères après le @ (alphanumérique) mais pas de chiffre au début
      // - un .
      // de 2 à 4 caractères alpha après le .


      $regex = '/([Cc]opyright) 200(5|6)/';
      $chaine = "Copyright 2006";
      echo preg_replace($regex, "$1 2007", $chaine);
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


