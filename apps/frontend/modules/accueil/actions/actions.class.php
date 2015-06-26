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
      //var_dump($this->getUser());die;
  }
  
  public function executeIndexdepuissecure(sfWebRequest $request)
  {
      $this->getUser()->setFlash("error", "vous devez vous connecter pour accéder aux fonctionnalités du site");
      $this->redirect('accueil/index');
  }
  
  public function executeDeconnexion(sfWebRequest $request)
  {
    $this->getUser()->setModelUtilisateur(null);
    $this->getUser()->setAuthenticated(false);
    $this->redirect('accueil/index');
  }
  
  public function executeConnexion(sfWebRequest $request)
  {
    if($request->hasParameter('pseudo') && $request->hasParameter('mdp'))
    {
        $modelUtilisateur = UtilisateurPeer::retrieveByPseudo($request->getParameter('pseudo'));
        if($modelUtilisateur != null && $modelUtilisateur->getPwd() == $request->getParameter('mdp'))
        {
            $modelUtilisateur->setDatelastconn(date('Y-m-d H:i:s'));
            $modelUtilisateur->save();
            $this->getUser()->setModelUtilisateur($modelUtilisateur);
            $this->getUser()->setAuthenticated(true);
            //termine le script et affiche la page d'acceuil
            $this->redirect('accueil/index');            
        }           
    }               
    // s'il y a un problème, l'utilisateur n'est plus authentifié
    $this->getUser()->setAuthenticated(false);
    //$('#menu1').css('visibility','hidden');
  }
  
  public function executeInscription(sfWebRequest $request)
  {
    if($request->hasParameter('pseudo') && $request->hasParameter('mdp'))
    {
        $modelUtilisateur = UtilisateurPeer::retrieveByPseudo($request->getParameter('pseudo'));
        if($modelUtilisateur == null && strlen($request->getParameter('pseudo')) > 0)
        {
            if($request->getParameter("mdp") != null && strlen($request->getParameter("mdp")) > 0)
            {
                $modelUtilisateur = new Utilisateur();
                $modelUtilisateur->setPseudo($request->getParameter('pseudo'));
                $modelUtilisateur->setPwd($request->getParameter('mdp'));
                if($request->hasParameter('mail'))
                {
                    $modelUtilisateur->setMail($request->getParameter('mail'));                    
                }
                $date = date('Y-m-d H:i:s');
                $modelUtilisateur->setDatecreate($date);
                $modelUtilisateur->setDatelastconn($date);
                $modelUtilisateur->save();
                $this->getUser()->setModelUtilisateur($modelUtilisateur);
                $this->getUser()->setAuthenticated(true);
                $this->msg = "Inscription réussie";
            }
            else
            {
                $this->msg = "Vous devez entrer un mot de passe";
            }            
        }
        else
        {
            $this->msg = "Votre nom d'utilisateur est déjà utilisé";
        }
    }  
  }
  
  public function executeInvitation(sfWebRequest $request)
  {
      if($request->hasParameter("ticket"))
      {
          $modelListe = ListePeer::retrieveByPK($request->getParameter("ticket"));
          if($modelListe != null)
          {
              $this->liste = $modelListe;
          }
          else
          {
            $this->getUser()->setFlash("warning", "Votre code d'invitation est erroné");
            $this->redirect("accueil/index");
          }
      }
      else
      {
        $this->getUser()->setFlash("warning", "Il manque votre code d'invitation");
        $this->redirect("accueil/index");
      }
  }
  
  public function executeObjectif(sfWebRequest $request)
  {

  }   
}
