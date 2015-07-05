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
        $this->getContext()->getResponse()->addMeta('description', 'liste des magasins disponibles ou a compléter');

    //$this->forward('default', 'module');
  //  $this->magasins = MagasinPeer::retriveTous(); 
  }
  
  public function executeMag(sfWebRequest $request)
  {
      
  } 
  
  public function executeSearch(sfWebRequest $request)
  {
  //$this->forwardUnless($query = $request->getParameter('query'),'magasin', 'index');
 
    if (!$query = $request->getParameter('query'))
    {
        echo "ok2".$query;
        return $this->forward('magasin', 'index');
    }
      return "ok3".$query;
  //$this->magasins = MagasinPeer::retriveTous();
 
  if ($request->isXmlHttpRequest())
  {
    if ('*' == $query || !$this->magasins)
    {
      return $this->renderText('No results.');
    }
    //return $this->renderPartial("magasin/magasin",array("magasins" => $this->magasins));
    return $this->renderPartial("magasin/magasin");
  }
}
  
  public function executeNouveauMagasin(sfWebRequest $request)
  {
    if($request->getParameter('nommag') != null && $request->getParameter('visiblepar') != null && $request->getParameter('lienimg') != null)
    {
        $iduser = $this->getUser()->getModelUtilisateur()->getId();
        $modelMagasin = MagasinPeer::retriveMagasinDejaPresent($iduser,$request->hasParameter('nommag'));
        if($modelMagasin == null)
        {
            $modelMagasin = new Magasin();
            $modelMagasin->setNom($request->getParameter("nommag"));
            $modelMagasin->setIdUtilisateur($iduser);
            $modelMagasin->setImg($request->getParameter("lienimg"));
            $modelMagasin->setDateCreation(getdate());
            
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
