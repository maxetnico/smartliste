<?php

/**
 * adminsmartliste actions.
 *
 * @package    smartliste
 * @subpackage adminsmartliste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class adminsmartlisteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->getLevel() == "GoodleveL")
    {
        $this->magasins = MagasinPeer::retriveTousEtat(2);
        $this->magasins2 = MagasinPeer::retriveTousEtat(3);
        $this->magasins3 = MagasinPeer::retriveTousEtat(1);
        $this->Produits = ProduitPeer::retriveTousEtat(2);
        $this->Produits2 = ProduitPeer::retriveTousEtat(3);
        $this->Produits3 = ProduitPeer::retriveTousEtat(1);
    }
    else {
        $this->redirect('accueil/index');
    }
  }
  
  public function executeChangeParamMagasin(sfWebRequest $request)
  {
	  if($request->getParameter('mode') == "valider")
	  {
		$valeur = 1;		  	  
	  }
	  else if($request->getParameter('mode') == "attente")
	  {
		$valeur = 2;
	  }
	  else if($request->getParameter('mode') == "refuser")
	  {
		$valeur = 3;
	  }
	  if($request->hasParameter('magsel'))
	  {
		  $mags = $request->getParameter('magsel');
		  foreach($mags as $mag)
		  {
				$tmp = MagasinPeer::retriveByPK($mag);
				$tmp->setIdEtat($valeur);
				$tmp->save();
		  }
	  }  
	  if($request->hasParameter('prodsel'))
	  {
		  foreach($prods as $prod)
		  {
				$tmp = ProduitPeer::retriveByPK($prod);
				$tmp->setIdEtat($valeur);
				$tmp->save();
		  }
	  }  	
      $this->redirect('adminsmartliste/index');
  }
}
