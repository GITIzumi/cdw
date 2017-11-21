<?php

class Article
{
  //propriétés
  protected $id;
  protected $sTitre;
  protected $iAuteurId;
  protected $sContenu;
  protected $dDateAjout;
  protected $dDateLastModif;
  protected $bActif;
  protected $aCategories;

  public function __construct()
  {

  }

  // Hydratation
  public function hydrate(array $aValeurs)
  {
    if (!empty($aValeurs))
    {
      foreach ($aValeurs as $prop => $val)
      {
        $meth = "set_".$prop;
        if (method_exists($meth))
        {
          $this->$meth($val);
        }
      }
    }
  }

  public function __get($property)
  {
    return 'La propriété'.$property.'n\'existe pas.';
  }

  //SETTERS
  public function set_iAuteurId(int $idAuteur)
  {
    $this->iAuteurId = $idAuteur;
  }
  public function set_sTitre(string $sTitre)
  {
    $this->sTitre = $sTitre;
  }
  public function set_sContenu(string $sContenu)
  {
    $this->sContenu = $sContenu;
  }
  public function set_dDateAjout(DateTime $dDateAjout)
  {
    $this->dDateAjout = $dDateAjout;
  }
  public function set_dDateLastModif(DateTime $dDateLastModif)
  {
    $this->dDateLastModif = $dDateLastModif;
  }
  public function set_bActif(bool $bActif)
  {
    $this->bActif = $bActif;
  }
  public function set_aCategories(array $aCategories)
  {
    $this->aCategories = $aCategories;
  }
  public function set_Id(int $id)
  {
    $this->id = $id;
  }

  //GETTERS
  public function get_iAuteurId()
  {
    return $this->iAuteurId;
  }
  public function get_sTitre()
  {
    return $this->sTitre;
  }
  public function get_sContenu()
  {
    return $this->sContenu;
  }
  public function get_dDateAjout()
  {
    return $this->dDateAjout;
  }
  public function get_dDateLastModif()
  {
    return $this->dDateLastModif;
  }
  public function get_bActif()
  {
    return $this->bActif;
  }
  public function get_aCategories()
  {
    return $this->aCategories;
  }
  public function get_id()
  {
    return $this->id;
  }

}
