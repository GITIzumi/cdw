<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercice 1</title>
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
        <h1>CDW <small>Les boucles</small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-6">
          <h2>Boucle while</h2>
          <?php

          $a = 0;

          while ( $a <51)
          {
            echo $a;
            echo ' / ';
            $a++;
          }
          ?>

        </div>
        <div class="col-xs-12 col-md-6">
          <h2>Boucle foreach</h2>
          <?php

          $range = range( 0 , 50, 1 );

          foreach($range AS $key => $value)
          {
            echo $value;
            echo ' / ';
          }
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
