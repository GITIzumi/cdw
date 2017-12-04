<?php

include_once('model/Article/ArticleManager.php');

class ArticleController
{
  public static function ShowAll()
  {
//    echo 'Tous les articles seront ici';
    $ArticleManager = new ArticleManager();

    $articles = $ArticleManager->getArticleByCategorie();

    include("view/Article/articlesListe.html");

//    foreach ($articlebycategorie as $key => $value)
//    {
//      echo "<pre>";
//      var_dump($value["art_sTitre"]);
//      echo "</pre>";
//    }

  }
}