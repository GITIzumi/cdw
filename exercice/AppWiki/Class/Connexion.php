<?php

class Connexion
{
  //propriétés
  private $connexion;

  public function __construct()
  {
    try
    {
      $this->connexion = new PDO(
          'mysql:host='.HOST.';dbname='.BDD,                           // mysql::hote et dbname
          USER,                                                   // user
          PASS,                                                    // mdp
          array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')         // Pour lui dire qu'on veut récupérer du utf-8
      );
    }
    catch(Exception $e)
    {
      var_dump($e->getMessage());
      die();
    }
  }

  public function requete($type, $table, $values)
  {
    $requete1 = 'SHOW COLUMNS FROM '.$table.' ';
    $resultats = $this->connexion->query($requete1);    // exécution de la requete
    $resultats->setFetchMode(PDO::FETCH_OBJ);    //  ou FETCH_ASSOC
    $resultat = $resultats->fetch();

//    echo "<pre>";
//    var_dump($resultat);
//    echo "</pre>";

    $field   = $resultat->Field;
    $prefixe = explode('_',$field)["0"].'_';
    echo "<pre>";
    var_dump($prefixe);
    echo "</pre>";

    $sChamp = '';
    $sValeur = '';
    $a = 0;
    foreach ($values as $champ => $value)
    {
      if ($a == 0)
      {
        $sChamp  .= $prefixe.''.$champ;
        $sValeur .= $value;
        $a = 1;
      }
      else
      {
        $sChamp  .= ','.$prefixe.''.$champ;
        $sValeur .= ','.$value;
      }
    }

    $requettage = $type.' '.$table.' ('.$sChamp.') VALUES ('.$sValeur.')';


    $stmt = $this->connexion->prepare($requettage); //On prépare la requête

    foreach ($values as $champ => $value)
    {
      $tychamp = substr($champ,0,1);

      if ($tychamp == "s")
      {
        $typeParam = 'PDO::PARAM_STR';
      }
      $stmt->bindValue($champ,$value, $typeParam);
    }
    $resultats->closeCursor();
  }



  // Hydratation
//  public function hydrate(array $aValeurs)
//  {
//    if (!empty($aValeurs))
//    {
//      foreach ($aValeurs as $prop => $val)
//      {
//        $meth = "set_".$prop;
//        if (method_exists($meth))
//        {
//          $this->$meth($val);
//        }
//      }
//    }
//  }

  public function __get($property)
  {
    return 'La propriété'.$property.'n\'existe pas.';
  }

  //SETTERS
//  public function set_iAuteurId(int $idAuteur)
//  {
//    $this->iAuteurId = $idAuteur;
//  }


  //GETTERS
//  public function get_iAuteurId()
//  {
//    return $this->iAuteurId;
//  }


}
