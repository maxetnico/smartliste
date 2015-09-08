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
//      $level = DroitsPeer::retrieveByPK($this->getUser()->getModelUtilisateur()->getId())->getLevel();
//      if($level == 99)
//      {$this->level = "GoodLeveL";}
          
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
            
            $level = DroitsPeer::retrieveByPK($this->getUser()->getModelUtilisateur()->getId());

            if($level != null && $level->getLevel() == "99")
                {$this->getUser()->setLevel("GoodleveL");}
            else 
                {$this->getUser()->setLevel("none");}
            
            if($request->hasParameter("ticket"))
            {
                $modelListe = ListePeer::retrieveOneParIdPartage($request->getParameter("ticket"));
                if($modelListe != null)
                {
                    $this->liste = $modelListe;
                    $modelUtilisateurListeLink = UtilisateurListeLinkPeer::retrieveParIdUtilisateurEtIdListe($this->getUser()->getModelUtilisateur()->getId(), $modelListe->getId());                 
                     if($modelUtilisateurListeLink == null)
                     {
                         $this->getUser()->getModelUtilisateur()->ajouterALaListe($modelListe->getId());
                         $this->getUser()->setFlash("info", "Vous avez rejoint une nouvelle liste");                         
                     }
                     else
                     {
                       $this->getUser()->setFlash("info", "Vous faites déjà partie de cette liste");                       
                     }                   
                }
                else
                {
                  $this->getUser()->setFlash("warning", "Votre code d'invitation est erroné");                  
                }
            } 
            //termine le script et affiche la page d'acceuil
            $this->redirect('accueil/index');
        }           
    }               
    // s'il y a un problème, l'utilisateur n'est plus authentifié
    $this->getUser()->setFlash("error", "Votre identifiant ou votre mot de passe est incorrect");
    $this->getUser()->setAuthenticated(false);
    $this->redirect('accueil/index');
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
                $this->getUser()->setFlash("info", "Inscription réussie");
                
                if($request->hasParameter("ticket"))
                {
                    $modelListe = ListePeer::retrieveOneParIdPartage($request->getParameter("ticket"));
                    if($modelListe != null)
                    {
                        $this->liste = $modelListe;                       
                        $this->getUser()->getModelUtilisateur()->ajouterALaListe($modelListe->getId());
                        $this->getUser()->setFlash("info", "Vous avez rejoint une nouvelle liste");
                        $this->redirect("liste/index");                                           
                    }
                    else
                    {
                      $this->getUser()->setFlash("warning", "Votre code d'invitation est erroné");                      
                    }
                }
            }
            else
            {
                 $this->getUser()->setFlash("error", "Vous devez entrer un mot de passe");                 
            }            
        }
        else
        {
             $this->getUser()->setFlash("error", "Votre nom d'utilisateur est déjà utilisé");            
        }
    }
    $this->redirect("accueil/index");
  }
  
  public function executeInvitation(sfWebRequest $request)
  {
      if($request->hasParameter("ticket"))
      {
          $modelListe = ListePeer::retrieveOneParIdPartage($request->getParameter("ticket"));
          if($modelListe != null)
          {
              $this->liste = $modelListe;
              if($this->getUser()->isAuthenticated())
              {                  
                  $modelUtilisateurListeLink = UtilisateurListeLinkPeer::retrieveParIdUtilisateurEtIdListe($this->getUser()->getModelUtilisateur()->getId(), $modelListe->getId());                 
                  if($modelUtilisateurListeLink == null)
                  {
                      $this->getUser()->getModelUtilisateur()->ajouterALaListe($modelListe->getId());
                      $this->getUser()->setFlash("info", "Vous avez rejoint une nouvelle liste");
                      $this->redirect("liste/index");
                  }
                  else
                  {
                    $this->getUser()->setFlash("info", "Vous faites déjà partie de cette liste");
                    $this->redirect("liste/index");
                  }
              }
              //On affiche la page
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
