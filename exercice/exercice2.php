<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercice 2</title>
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
        <h1>CDW <small>Tableaux</small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12">

          <?php
            $etudiant =
            [
                2 => "Romain qui a faim",
                4 => "Joris",
                9 => "Coralie qui a réinstallé ?",
               11 => "Jonathan"
            ];



            echo "<pre>";
          var_dump($etudiant);
           echo "</pre>";

            arsort($etudiant);
          echo "<pre>";
          var_dump($etudiant);
          echo "</pre>";

            krsort($etudiant);
          echo "<pre>";
          var_dump($etudiant);
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
