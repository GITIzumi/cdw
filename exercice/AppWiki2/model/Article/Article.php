<?php
class Article
{
  // propriétés
  protected $art_id;
  protected $usr_id;
  protected $art_sTitre;
  protected $art_sContenu;
  protected $art_dDateCreation;
  protected $art_dDateLastModif;
  protected $art_bActif;
  protected $art_sSlug;
  protected $aCategories;

  public function __construct()
  {

  }

  // setters
  public function set_art_id($art_id)
  {
    $this->art_id = $art_id;
  }
  public function set_usr_id($usr_id)
  {
    $this->usr_id = $usr_id;
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
  public function set_art_bActif($art_bActif)
  {
    $this->art_bActif = $art_bActif;
  }
  public function set_art_sSlug($art_sSlug)
  {
    $this->art_sSlug = $art_sSlug;
  }
  public function set_aCategories($aCategories)
  {
    $this->aCategories = $aCategories;
  }

  public function get_art_id()
  {
    return $this->art_id;
  }
  public function get_art_sContenu()
  {
    return $this->art_sContenu;
  }
  public function get_art_sTitre()
  {
    return $this->art_sTitre;
  }
  public function get_art_dDateCreation()
  {
    return $this->art_dDateCreation;
  }
  public function get_art_dDateLastModif()
  {
    return $this->art_dDateLastModif;
  }
  public function get_art_bActif()
  {
    return $this->art_bActif;
  }
  public function get_art_sSlug()
  {
    return $this->art_sSlug;
  }
  public function get_aCategories()
  {
    return $this->aCategories;
  }

  // hydratons
  public function hydrate($aValeurs)
  {
    if(!empty($aValeurs))
    {
      foreach($aValeurs as $prop => $val)
      {
        $meth = "set_$prop";
        if(method_exists($this,$meth))
        {
          $this->{$meth}($val);
        }
      }
    }
  }

  public function __get($property)
  {
    return 'La propriété '.$property.' n\existe pas.';
  }
  public function __set($property,$values)
  {
    return 'Tu ne peux pas faire ça à la propriété '.$property.'.';
  }

}



?>
