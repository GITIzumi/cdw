<?php

include_once('model/Article/ArticleManager.php');
include_once('model/Article/ArticleForm.php');


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
  public static function ShowForm()
  {

    $formArticles = new ArticleForm;

    $formArticle = $formArticles->ShowForm();


    if (isset($_POST["Envoyer"]))
    {
      $formArticles->hydrate();
    }
    else
    {
      include("view/Article/articlesAdd.html");
    }

//    echo "<pre>";
//    var_dump($formArticles);
//    echo "</pre>";
  }
  public static function ArticleShow()
  {
    $ArticleManager = new ArticleManager();

    if (isset($_GET["id"]))
    {
      $id = trim(strip_tags($_GET["id"]));

      if (is_numeric($id))
      {
        $articles = $ArticleManager->getArticleById($id);


        if ($articles == false)
        {
          header("location:index.php");
        }
        else
        {
          $categories = $ArticleManager->getArticleCategorie();
          if ($categories !== false)
          {
//            echo "<pre>";
//            var_dump($categories);
//            echo "</pre>";
            include("view/Article/articlesShow.html");

          }
          else
          {
            header("location:index.php?c=Article&a=ShowAll");
            die;
          }

        }

      }
      else
      {
        header("location:index.php?c=Article&a=ShowAll");
        die;
      }

    }
    else
    {
      header("location:index.php?c=Article&a=ShowAll");
      die;
    }
  }

  public static function Admin()
  {
    $ArticleManager = new ArticleManager();

    $articles = $ArticleManager->getArticleByCategorie();

    include("view/Article/articlesAdmin.html");
  }
  public static function AdminModif()
  {
    $ArticleManager = new ArticleManager();

    if (isset($_GET["id"]))
    {
      $id = trim(strip_tags($_GET["id"]));

      if (is_numeric($id))
      {
        $articles = $ArticleManager->getArticleById($id);


        if ($articles == false)
        {
          header("location:index.php?c=Article&a=Admin");
        }
        else
        {
          $categories = $ArticleManager->getArticleCategorie();
          if ($categories !== false)
          {

            if (isset($_POST["Envoyer"]))
            {

              // Appeler une méthode de vérification
              $retour = $ArticleManager->ControleForm($articles);




              echo "<pre>";
                var_dump($articles);
              echo "</pre>";


              if (!empty($retour))
              {
                $formarticle = $ArticleManager->ShowForm($articles);
              }
              else
                {

              }

              include("view/Article/articleModif.html");
            }
            else
            {
              $formarticle = $ArticleManager->ShowForm($articles);

              include("view/Article/articleModif.html");
            }

          }
          else
          {
            header("location:index.php?c=Article&a=Admin");
            die;
          }

        }

      }
      else
      {
        header("location:index.php?c=Article&a=Admin");
        die;
      }

    }
    else
    {
      header("location:index.php?c=Article&a=Admin");
      die;
    }
  }

}