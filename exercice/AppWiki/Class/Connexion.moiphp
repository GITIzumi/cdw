<?php

class Connexion
{
  //propriétés
  private $connexion;
  private $stmt;

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

  public function requete($requete, $values)
  {
    $stmt = $this->connexion->prepare($requete); //On prépare la requête

    foreach ($values as $champ => $value)
    {
      $tychamp = substr($champ,0,1);

      if ($tychamp == "s")
      {
        $typeParam = PDO::PARAM_STR;
      }
      $stmt->bindValue($champ,$value, $typeParam);
    }

    $stmt->execute();
//    $stmt->closeCursor();

   if (substr($requete,0,3) == "DEL")
   {
      return $stmt->rowCount();
   }
   elseif(substr($requete,0,3) == "INS")
   {
     return $this->connexion->lastInsertId();
   }
   elseif(substr($requete,0,3) == "UPD")
   {
     return $stmt->rowCount();
   }
   elseif(substr($requete,0,3) == "SEL")
   {
     $this->stmt = $stmt;
     return $stmt->rowCount();
   }
  }

  public function fetchSelect($requete, $values)
  {
      $this->requete($requete, $values);
      $tableau = array();
      while($row = $this->stmt->fetch(PDO::FETCH_ASSOC))
      {
        array_push($tableau,$row);
      }
      return $tableau;


  }

}
