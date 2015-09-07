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
            $modelListe->setDateCreation(new \DateTime());
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
          $produits = ProduitPeer::retrievePourUneListeNonCoche($this->liste);
          $this->produits = array();
          foreach ($produits as $arr) {
              $produit = $arr[0];
              if(!isset($this->produits[$produit->getCategorieNom()]))
              {
                  $this->produits[$produit->getCategorieNom()] = array();
              }
              $this->produits[$produit->getCategorieNom()][] = $arr;
          }
          
          $this->magasins = MagasinPeer::retrieveValidePourUnUtilisateurFavorisEtUneListe($this->getUser()->getModelUtilisateur()->getId(),$this->liste);
          if(count($this->magasins)==0)
          {
            $this->magasins = MagasinPeer::retrieveTousValidePourUnUtilisateurEtUneListe($this->getUser()->getModelUtilisateur()->getId(),$this->liste);          
          }
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
  
  //Fonction appelée en ajax qui vérifie et coche en base le produit
  public function executeCoche(sfWebRequest $request)
  {
      $modelListeProduitLink = ListeProduitLinkPeer::retrieveByPK($request->getParameter("link"));
      if($this->utilisateurPossedeListe($modelListeProduitLink->getIdListe()))
      {
          if($modelListeProduitLink->getCoche() == 1)
          {
              if($modelListeProduitLink->getCocheIdUtilisteur() != $this->getUser()->getModelUtilisateur()->getId())
              {
                  $modelUtilisateurQuiACoche = UtilisateurPeer::retrieveByPK($modelListeProduitLink->getCocheIdUtilisteur());
                  echo $modelUtilisateurQuiACoche->getPseudo()." a déjà coché ce produit";
              }
              else
              {
                  //Si c'est le bon utilisateur qui a déjà coché précédemment la case : 
                  if($request->getParameter("coche") == 0)
                  {
                      $modelListeProduitLink->setCoche(0);
                      $modelListeProduitLink->save();                      
                  }
                  echo "ok";
              }
          }
          else
          {
            if($request->getParameter("coche") == 1)
            {
                $modelListeProduitLink->setCoche(1);
                $modelListeProduitLink->setCocheDate(new DateTime());
                $modelListeProduitLink->setCocheIdUtilisteur($this->getUser()->getModelUtilisateur()->getId());
                $modelListeProduitLink->save();
                echo "ok";
            }
          }         
      }      
      return sfView::NONE;
  }
  
  //Fonction appelée en ajax qui permet de changer de magasin
  public function executeMagasin(sfWebRequest $request)
  {
      $modelListeProduitLink = ListeProduitLinkPeer::retrieveByPK($request->getParameter("link"));
      if($this->utilisateurPossedeListe($modelListeProduitLink->getIdListe()))
      {
          $modelListeProduitLink->setIdMagasin($request->getParameter("magasin"));
          $modelListeProduitLink->save();
      }
      return sfView::NONE;
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