<?php

/**
 * magasin actions.
 *
 * @package    smartliste
 * @subpackage magasin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class magasinActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
    if($request->getParameter('aff') == 'tous')
        $this->magasins = MagasinPeer::retriveTous();
    else
        $this->magasins = MagasinPeer::retrivePourUnUtilisateur($this->getUser()->getModelUtilisateur()->getId()); 
  }
    
  public function executeQuitter(sfWebRequest $request)
  {
      $idMagasin = $request->getParameter('magasin');
      $this->quitterMagasin($this->getUser()->getModelUtilisateur()->getId(),$idMagasin);
      $this->redirect('magasin/index');
  }
  
  public function executeIndex2(sfWebRequest $request)
  {
    $this->magasins = MagasinPeer::retriveTous();
    //$this->redirect('magasin/index');
    return $this->renderPartial('magasin/index', array('magasins' => $this->magasins));
    
  }
  
  public function executeNouveauMagasin(sfWebRequest $request)
  {
    if($request->getParameter('nommag') != null && $request->getParameter('visiblepar') != null && $request->getParameter('lienimg') != null)
    {
        $iduser = $this->getUser()->getModelUtilisateur()->getId();
        $modelMagasin = MagasinPeer::retriveMagasinDejaPresent($iduser,$request->hasParameter('nommag'));
        if($modelMagasin == null)
        {
               $etatatt = new Criteria;
               $etatatt->add(EtatPeer::CODE,'ATT')
            $modelMagasin = new Magasin();
            $modelMagasin->setNom($request->getParameter("nommag"));
            $modelMagasin->setIdUtilisateur($iduser);
            $modelMagasin->setImg($request->getParameter("lienimg"));
            $modelMagasin->setDateCreation(getdate());
            $modelMagasin->setIdEtat();
            
            $this->getUser()->getModelUtilisateur()->ajouterALaListe($modelMagasin);
            $this->getUser()->setFlash("info", "Le magasin a été ajouter à votre liste");  
        }
        else
        {
            $this->getUser()->setFlash("warning", "Ce nom de magasin existe déjà dans votre liste");    
        }
    }
  }
}
