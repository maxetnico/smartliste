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
        $this->getContext()->getResponse()->addMeta('description', 'liste des produits disponibles ou a compléter');
    }
  
    public function executeProd1(sfWebRequest $request)
    {
        $this->forward('produit', 'index');
 
        //$this->jobs = JobeetJobPeer::getForLuceneQuery($query);

        if ($request->isXmlHttpRequest())
        {
          return $this->renderPartial('produit/prod1');//, array('jobs' => $this->jobs));
        }
    }
    public function executeProd2(sfWebRequest $request)
    {
      // do things
      return $this->renderPartial('produit/prod2');
    }

}
