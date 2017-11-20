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
        <h1>CDW <small>Fonction</small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-12">
         <p>Calculer un prix de vente ttc : fonction avec 3 arguments :</p>
          <ul>
            <li>Prix ht</li>
            <li>taux de tva en % : par défaut 20%</li>
            <li>remise en % qui peut être Null</li>
          </ul>


          <?php
            function GetPrixTTC($prix,$remise=null, $taux=20 )
            {

              if (!empty($remise))
              {
                $ttc = $prix - ( $prix * ( $remise / 100 ) );
                $ttc = $ttc + ( $ttc * ( $taux / 100 ) );
              }
              else
              {
                $ttc = $prix + ( $prix * ( $taux / 100 ) );
              }

              if ($ttc < 0)
              {
                $ttc = 0;
              }

              $ttc = number_format($ttc, 2);

              return $ttc;
            }

            echo GetPrixTTC(153.2251654684,20);
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
