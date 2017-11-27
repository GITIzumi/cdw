<?php

Class ArticleManager
{
  // On ne met rien dans le constructeur

  // Récupération d'un article en fonction de son ID
  public function getArticleById($id)
  {
    global $gb_cnx;

    $requete = '
      SELECT art_id, art_sTitre, art_sContenu, usr_id, art_bActif, art_dDateCreation, art_dDateLastModif
      FROM article 
      WHERE art_id = :art_id
    ';
    $values = array(':art_id'=>$id);
    $infos  = $gb_cnx->querySelect($requete, $values, PDO::FETCH_ASSOC);
    if ($infos !== false)
    {
      $article = new Article();
      $article->hydrate($infos);
      return $article;
    }
    return false;
  }

  public function getArticleByCategorie($cat_id)
  {
    global $gb_cnx;

    $requete = '
      SELECT article.art_id, art_sTitre, art_sContenu, usr_id, art_bActif, art_dDateCreation, art_dDateLastModif, cat_sNom
      FROM article
      INNER JOIN join_article_categorie
        ON article.art_id = join_article_categorie.art_id
      INNER JOIN categorie
        ON categorie.cat_id = join_article_categorie.cat_id
      WHERE join_article_categorie.cat_id = :cat_id
    ';
    $values = array(':cat_id'=>$cat_id);
    $infos  = $gb_cnx->querySelect($requete, $values, PDO::FETCH_ASSOC, true);

//    echo "<pre>";
//    echo var_dump($infos);
//    echo "</pre>";
    if ($infos !== false)
    {
       $articles = array();

       foreach ($infos as $key => $value)
       {
         $article = new Article();
         $article->hydrate($infos);
         array_push($articles, $value);
       }
      return $articles;
    }
    return false;
  }
}