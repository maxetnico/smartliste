<?php

/**
 * accueil actions.
 *
 * @package    smartliste
 * @subpackage accueil
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class accueilActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      //Le $this->variable sert à passer des paramètres au template
//      $this->jeans = UtilisateurPeer::retrieveJean();
//      
//      $user = new Utilisateur();
//      $user->setPseudo("bibi");      
//      $user->save();     
     $this->jeans = array();
    }
}
