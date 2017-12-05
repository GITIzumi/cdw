<?php

include_once('Article.php');

Class ArticleManager
{
  // On ne met rien dans le constructeur

  public function ShowForm($article)
  {
//  echo "<pre>";
//    var_dump($article);
//    echo "</pre>";

    if($article->get_art_bActif() == 1)
    {
      $checked = "checked";
    }
    else
    {
      $checked = "";
    }

    return "
      <form action=\"#\" method=\"post\">
        <p>
          <label for=\"art_sTitre\">Titre de l'article</label>
          <input id=\"art_sTitre\" class=\"form-control\" type=\"text\" name=\"art_sTitre\" value=\"".$article->get_art_sTitre()."\">
        </p>
        <p>
          <label for=\"art_sSlug\">Résumé</label>
          <input id=\"art_sSlug\" class=\"form-control\" type=\"text\" name=\"art_sSlug\" value=\"".$article->get_art_sSlug()."\">
        </p>
        <p>
          <label for=\"art_sTitre\">Contenu de l'article</label>
          <textarea name=\"art_sContenu\" class=\"form-control\" id=\"art_sContenu\" cols=\"30\" rows=\"10\">".$article->get_art_sContenu()."</textarea>
        </p>
        <p>          
          <input ".$checked." type=\"checkbox\" id=\"art_bActif\" name=\"art_bActif\" value=\"1\">
          <label for=\"art_bActif\">Article actif </label>
        </p>
        <p>
          <input type=\"submit\" class=\"form-control\" name=\"Envoyer\" value=\"Envoyer\">
        </p>
      </form>
    ";
  }

  // Récupération d'un article en fonction de son ID
  public function getArticleById($id)
  {
    global $gb_cnx;

    $requete = '
      SELECT art_id, art_sTitre, art_sContenu, usr_id, art_bActif, art_dDateCreation, art_dDateLastModif, art_sSlug
      FROM article 
      WHERE art_id = :art_id
      AND art_bActif = 1
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

  public function getArticleByCategorie($cat_id = NULL)
  {
    global $gb_cnx;

    if(is_null($cat_id))
    {
      $variable = "";
    }
    else
    {
      $variable = "WHERE join_article_categorie.cat_id = :cat_id";
    }

    $requete = '
      SELECT article.art_id, art_sTitre, art_sContenu, usr_id, art_bActif, art_dDateCreation, art_dDateLastModif, cat_sNom
      FROM article
      INNER JOIN join_article_categorie
        ON article.art_id = join_article_categorie.art_id
      INNER JOIN categorie
        ON categorie.cat_id = join_article_categorie.cat_id '.$variable.'
        
     
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

  public function getArticleCategorie()
  {
    global $gb_cnx;

    $requete = '
      SELECT cat_id, cat_sNom, cat_sResume, cat_bActif, cat_sSlug, cat_sCodeHexa FROM categorie
    ';
    $values = array();
    $categorie  = $gb_cnx->querySelect($requete, $values, PDO::FETCH_ASSOC, true);

    if ($categorie !== false)
    {
      return $categorie;
    }
    return false;
  }


  public function ControleForm($article)
  {
    if (isset($_POST["Envoyer"]))
    {
      $MessageErreur = "";
      if (!empty($_POST["art_sTitre"]))
      {
        $article->set_art_sTitre(trim(strip_tags($_POST["art_sTitre"])));
      }
      else
      {
        $MessageErreur .=  "Le titre ne doit pas être vide <br>";
      }

      if (!empty($_POST["art_sSlug"]))
      {
        // vérifier que le slug est unique
         // requete facile
        $article->set_art_sSlug(trim(strip_tags($_POST["art_sSlug"])));
      }
      else
      {
        $MessageErreur .=  "Le slug ne doit pas être vide <br>";
      }

      if (!empty($_POST["art_sContenu"]))
      {
        $article->set_art_sContenu(trim(strip_tags($_POST["art_sContenu"])));
      }
      else
      {
        $MessageErreur .=  "Le contenu ne doit pas être vide <br>";
      }

      if (!empty($_POST["art_bActif"]))
      {
        if ($_POST["art_bActif"] == 0)
        {
          $article->set_art_bActif(0);
        }
        else if($_POST["art_bActif"] == 1)
        {
          $article->set_art_bActif(1);
        }
        else
        {
          $MessageErreur .=  "Erreur est survenu avec le checkbox <br>";
        }

      }
      else
      {
        $MessageErreur .=  "Le contenu ne doit pas être vide <br>";
      }
    }

    return $MessageErreur;
  }
}