<?php

/**
 * liste actions.
 *
 * @package    smartliste
 * @subpackage liste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class listeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->listes = ListePeer::retrievePourUnUtilisateur($this->getUser()->getModelUtilisateur()->getId());
    //$this->visibilites = VisibilitePeer::retrieveAll();
  }
  
  public function executeAdd(sfWebRequest $request)
  {
    if($request->hasParameter("nom") && $request->hasParameter("icone") && $request->hasParameter("couleur"))
    {
        if(strlen($request->getParameter("nom")) > 0)
        {
            $modelListe = new Liste();            
            $modelListe->setUtilisateur($this->getUser()->getModelUtilisateur());
            $modelListe->setNom($request->getParameter("nom"));
            $modelListe->setIcone($request->getParameter("icone"));
            $modelListe->setCouleur($request->getParameter("couleur"));
            $modelListe->save();
            
            $this->getUser()->getModelUtilisateur()->ajouterALaListe($modelListe->getId());
            
            $this->redirect('liste/detail/liste/'.$modelListe->getId());
            return;
        }
        else
        {
            $this->getUser()->setFlash("error","Vous devez spécifier un nom pour votre nouvelle liste");
        }
    }
    else
    {
        $this->getUser()->setFlash("error","Une erreur est survenue lors de votre demande");
    }
    $this->redirect('liste/index');
  }
  
  public function executeDetail(sfWebRequest $request)
  {
      if($request->hasParameter("liste") && $this->utilisateurPossedeListe($request->getParameter("liste")))
      {
          $this->liste = ListePeer::retrieveByPK($request->getParameter("liste"));
      }
      else
      {
          $this->redirect("liste/index");
      }
  }
  
  public function executeQuitter(sfWebRequest $request)
  {
      $idListe = $request->getParameter('liste');
      $this->getUser()->getModelUtilisateur()->quitterListe($idListe);
      $this->redirect('liste/index');
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