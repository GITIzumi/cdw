<?php

class ArticleForm
{
  private $usr_id;
  private $art_id;
  private $art_sTitre;
  private $art_sContenu;
  private $art_dDateCreation;
  private $art_dDateLastModif;
  private $art_sSlug;
  private $art_bActif;


  function __construct()
  {

  }

  public function ShowForm()
  {
    return "
      <form action=\"#\" method=\"post\">
        <p>
          <label for=\"art_sTitre\">Titre de l'article</label>
          <input id=\"art_sTitre\" class=\"form-control\" type=\"text\" name=\"art_sTitre\" value=\"\">
        </p>
        <p>
          <label for=\"art_sSlug\">Résumé</label>
          <input id=\"art_sSlug\" class=\"form-control\" type=\"text\" name=\"art_sSlug\" value=\"\">
        </p>
        <p>
          <label for=\"art_sTitre\">Contenu de l'article</label>
          <textarea name=\"art_sContenu\" class=\"form-control\" id=\"art_sContenu\" cols=\"30\" rows=\"10\"></textarea>
        </p>
        <p>
          <label for=\"art_bActif\">Résumé</label>
          <input type=\"checkbox\" id=\"art_bActif\" name=\"art_bActif\" value=\"actif\">Article actif>
        </p>
        <p>
          <input type=\"submit\" class=\"form-control\" name=\"Envoyer\" value=\"Envoyer\">
        </p>
      </form>
    ";
  }

  // hydratons
  public function hydrate()
  {
    $tbleau = array(
        "art_sTitre",
        "art_sContenu",
        "art_sSlug",
    );

    foreach ($tbleau as $value => $key )
    {
      if (isset($_POST[$key]))
      {
        $meth = "set_$key";

        $value = strip_tags(trim($_POST[$key]));

        if(method_exists($this,$meth))
        {
          echo $meth;
          echo '<br>';
          echo $value;
          echo '<br>';
          $this->{$meth}($value);
        }
      }
      else
      {
        // FAIRE LE CONTROLE DES VALEURS
      }
    }


    if (isset($_POST["art_bActif"]))
    {
      $this->set_art_bActif(1);
    }
    else
    {
      $this->set_art_bActif(0);
    }


    $this->set_usr_id(1);

    $this->set_art_bActif(1);

    $this->set_usr_id(1);

  }

  public function set_usr_id($usr_id)
  {
    $this->usr_id = $usr_id;
  }
  public function set_art_id($art_id)
  {
    $this->art_id = $art_id;
  }
  public function set_art_sTitre($art_sTitre)
  {
    $this->art_sTitre = $art_sTitre;
  }
  public function set_art_sContenu($art_sContenu)
  {
    $this->art_sContenu = $art_sContenu;
  }
  public function set_art_dDateCreation($art_dDateCreation)
  {
    $this->art_dDateCreation = $art_dDateCreation;
  }
  public function set_art_dDateLastModif($art_dDateLastModif)
  {
    $this->art_dDateLastModif = $art_dDateLastModif;
  }
  public function set_art_sSlug($art_sSlug)
  {
    $this->art_sSlug = $art_sSlug;
  }
  public function set_art_bActif($art_bActif)
  {
    $this->art_bActif = $art_bActif;
  }


  public function get_usr_id()
  {
    return $this->usr_id;
  }
  public function get_art_sTitre()
  {
    return $this->art_sTitre;
  }
  public function get_art_sContenu()
  {
    return $this->art_sContenu;
  }
  public function get_art_dDateCreation()
  {
    return $this->art_dDateCreation;
  }
  public function get_art_dDateLastModif()
  {
    return $this->art_dDateLastModif;
  }
  public function get_art_sSlug()
  {
    return $this->art_sSlug;
  }
  public function get_art_bActif()
  {
    return $this->art_bActif;
  }
}
