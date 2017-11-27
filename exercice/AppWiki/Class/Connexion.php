<?php

/**
 * Class de connexion à la bdd
 */
class Connexion
{
    /**
     * objet PDO
     * @var object
     */
    private $pdo;


    /**
     * Constructeur qui établi la connexion à la bdd - no param
     */
    public function __construct(){
        try {
            $this->pdo = new PDO(
                TYPE.':host='.HOST.';dbname='.DB_NAME, //sgdbr::hote et dbname
                USER, //usr
                PASS, //pwd
                array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8') //pour dire qu'on veut récupérer du utf8
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }


    /**
     * Permet de retourner un tableau de résutats pour un select
     * @param  string $sql    la requete sql
     * @param  array  $values les valeurs à bind
     * @return array|false  le tableau de resultat de la requete ou false si aucun resultat
     */
    public function querySelect($sql, $values, $typeResultat = PDO::FETCH_OBJ, $alwaysFetchAll = false){
        $stmt = $this->pdo->prepare($sql);

        if (!empty($values))
        {
            foreach ($values as $key => $value)
            {
                $dataType = $this->defineType($key);
                $stmt->bindValue($key,$value,$dataType);
            }
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 1 || $alwaysFetchAll)
        {
            return $stmt->fetchAll($typeResultat);
        }
        elseif ($count == 1)
        {
            return $stmt->fetch($typeResultat);
        }
        else
        {
            return false;
        }
    }


    /**
     * Permet d'executer update/create/insert/delete
     * @param  string $sql    la requete sql
     * @param  array  $values les valeurs de la requete à bind
     * @return int    le nombre de ligne affecté par cette requete
     */
    public function queryOther( $sql,  $values) {
        $stmt = $this->pdo->prepare($sql);

        foreach ($values as $key => $value) {
            $dataType = $this->defineType($key);
            $stmt->bindValue($key,$value,$dataType);
        }
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;
    }

    /**
     * Permet de définir un type de donnée grace au nom du champs
     * @param  string $nomChamp le nom du champ
     * @return int        le type de parm ex 'PDO::PARAM_STR'
     */
    private function defineType( $nomChamp){
        $array=explode('_',$nomChamp);
        $nom = $array[1];
        $type = $nom[0];
        switch ($type) {
            case 's':
                $param = PDO::PARAM_STR;
                break;
            case 'b':
                $param = PDO::PARAM_BOOL;
                break;
            case 'i' :
                $param = PDO::PARAM_INT;
                break;
            default:
                $param = PDO::PARAM_STR;
                break;
        }
        return $param;
    }
}

?>
