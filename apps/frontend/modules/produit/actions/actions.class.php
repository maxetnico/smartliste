<?php

/**
 * produit actions.
 *
 * @package    smartliste
 * @subpackage produit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class produitActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($request->hasParameter("liste") && $this->utilisateurPossedeListe($request->getParameter("liste")))
    {
        $this->liste = ListePeer::retrieveByPK($request->getParameter("liste"));
        $this->produits = ProduitPeer::retrievePourUnUtilisateurEtUneListe($this->getUser()->getModelUtilisateur(), $this->liste);
        
    }
    else
    {
        $this->produits = ProduitPeer::retrievePourUnUtilisateur($this->getUser()->getModelUtilisateur());
    }        
  }
  
  protected function utilisateurPossedeListe($idListe)
  {    
    $modelUtilisateur = $this->getUser()->getModelUtilisateur();
    foreach (ListePeer::retrievePourUnUtilisateur($modelUtilisateur->getId()) as $liste) {
        if($liste->getId() == $idListe)
        {
            return true;
        }
    }
    return false;
  }
}
