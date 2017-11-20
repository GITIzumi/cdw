<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercice 3</title>
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
        <h1>CDW <small>Dates</small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12">
          <?php
            echo "<p>Afficher le timestamp</p>";
            echo time();
            echo "<hr>";

            echo "<p>Date à un format précis</p>";
            echo date('d/m/Y H:i:s');
            echo "<hr>";


            echo "<p>Afficher la différence entre ces deux dates en nombre de jour</p>";
            $date1 = '25/11/2017';
            $date2 = '05/03/2018';

            echo $date1;
            echo "<br>";
            echo $date2;
            echo "<br>";
            echo "<br>";

            $objectDate1 = DateTime::createFromFormat('d/m/Y',$date1);
            $objectDate2 = DateTime::createFromFormat('d/m/Y',$date2);
            $diff = $objectDate1->diff($objectDate2);
            echo $diff->days.' jours';



            echo "<hr>";



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
