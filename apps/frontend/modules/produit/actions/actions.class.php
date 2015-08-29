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
    $iduser = $this->getUser()->getModelUtilisateur()->getId();  
    if($request->hasParameter("liste") && $this->utilisateurPossedeListe($request->getParameter("liste")))
    {
        $this->liste = ListePeer::retrieveByPK($request->getParameter("liste"));
        $this->produits = ProduitPeer::retrievePourUnUtilisateurSaufListeAvecCollaborateurs($this->getUser()->getModelUtilisateur(),$this->liste);  
    }
    else
    {
        $this->produits = ProduitPeer::retrievePourUnUtilisateur($this->getUser()->getModelUtilisateur());
    }
    
    //Création du tableau qui sert à dire si l'utilisateur peut supprimer le produit ou non
    $this->arrProduitsSupprimable = array();
    foreach($this->produits as $key => $produit)
    {
        $this->arrProduitsSupprimable[$key] = $produit->getIdUtilisateur() == $iduser?true:false;
    }    
    $this->categories = CategoriePeer::retrieveAll();
  }
  
  //Ajout d'un ou plusieurs Produits à une liste
  public function executeAjout(sfWebRequest $request)
  {    
    if($request->hasParameter("liste") && $this->utilisateurPossedeListe($request->getParameter("liste")))
    {
        $liste = ListePeer::retrieveByPK($request->getParameter("liste"));
        foreach ($request->getParameterHolder()->getAll() as $param => $value) {
            if(is_int($param) && $value != "0" && $value != 0)
            {
                $modelListeProduitLink = new ListeProduitLink();
                $modelListeProduitLink->setQuantite($value);
                $modelListeProduitLink->setIdListe($liste->getId());
                $modelListeProduitLink->setIdProduit($param);
                $modelListeProduitLink->save();
            }
        }
        $this->redirect("liste/detail?liste=".$liste->getId());            
    }
    $this->redirect("liste/index");    
  }
  
  //Ajout d'un produit par l'utilisateur
  public function executeAjouter(sfWebRequest $request)
  {
    if($request->getParameter('nom') != null && $request->getParameter('partage') != null && $request->getParameter('categorie') != null)
    {
        $iduser = $this->getUser()->getModelUtilisateur()->getId();
        $modelProduit = new Produit();
        $modelProduit->setNom($request->getParameter("nom"));
        $modelProduit->setIdUtilisateur($iduser);        
        //$modelProduit->setDateCreation(new \DateTime());
        $modelProduit->setIdEtat(EtatPeer::retriveIdDuCode('VAL'));
        $modelProduit->setIdVisibilite(VisibilitePeer::retriveIdDuCode($request->getParameter('partage')));
        $modelProduit->save();
                    
        if($request->getParameter('lienimg') != null)
        {
            $arrInfoImage = getimagesize($request->getParameter("lienimg"));            
            
            switch ($arrInfoImage[2]){
                case IMAGETYPE_JPEG:$ext=".jpg";break;
                case IMAGETYPE_PNG:$ext=".png";break;
                case IMAGETYPE_GIF:$ext=".gif";break;
                default:$ext="";
            }
            if($ext != "" )
            {
                $in=fopen($request->getParameter("lienimg"), "rb");
                //$out=fopen('images/test/'.$request->getParameter("nommag").'.'.substr($request->getParameter("lienimg"),-3), "wb");

                $cpt=3;$brut="";
                while (($brut .= fread($in,8192)) && $cpt>=0 ){
                    $cpt--;
                }
                fclose($in);
                if($cpt==0) {
                    $this->getUser()->setFlash("warning", "taille du fichier image trop grande");
                }
                else {
                    file_put_contents('images/produits/'.$modelProduit->getId().$ext, $brut );

                    $modelProduit->setImg("produits/".$modelProduit->getId().$ext);               
                    $modelProduit->save();              
                }   
            }
        }
        
        $this->getUser()->setFlash("info", "Le produit a été créé"); 
              
    }
    else
    {
        $this->getUser()->setFlash("warning", "Vous n'avez pas entré assez d'informations sur le produit."); 
    }
    $this->redirect('produit/index'); 
  }
  
  public function executeSupprimer(sfWebRequest $request)
  {
      $modelProduit = ProduitPeer::retrieveByPK($request->getParameter("produit"));
      if($modelProduit->getIdUtilisateur() == $this->getUser()->getModelUtilisateur()->getId())
      {
          $modelProduit->delete();
          $this->getUser()->setFlash("info", "Le produit a été supprimé"); 
      }
      $this->redirect('produit/index'); 
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
