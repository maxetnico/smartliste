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
    {    $this->magasins = MagasinPeer::retriveTousSaufMoi($this->getUser()->getModelUtilisateur()->getId());}
    else
    {
        $this->magasins = MagasinPeer::retrivePourUnUtilisateur($this->getUser()->getModelUtilisateur()->getId());
        $this->magasinsfav = MagasinsFavorisPeer::retriveFavPourUnUtilisateur($this->getUser()->getModelUtilisateur()->getId());
    }
  }
    
  public function executeQuitter(sfWebRequest $request)
  {
    if($request->getParameter('magasin') != null)
    {
      // faire la mise a 0 du champ magasin.id_utilisteur
      $idMagasin = $request->getParameter('magasin');
      $iduser = $this->getUser()->getModelUtilisateur()->getId();
      $magasin = MagasinPeer::UpdateIdUtilisateurEtIdListe($iduser,$idMagasin);
      if($magasin != null)
      {
            $magasin->setIdUtilisateur(null);
            $magasin->setIdVisibilite(3);
            $magasin->setIdEtat(3);
            $magasin->save();
            $this->getUser()->setFlash("warning", "Magasin retiré de votre liste.");
            $this->redirect('magasin/index');
      }
    }    
  }
  
  public function executeAjoutFavoris(sfWebRequest $request)
  {
    $iduser = $this->getUser()->getModelUtilisateur()->getId();
    $idMagasin = $request->getParameter('magasin');
    $FavMagasin = MagasinsFavorisPeer::retriveFavMagasinDejaPresent($iduser,$idMagasin);
    if($FavMagasin == null)
    {
        $FavMagasin = new MagasinsFavoris();
        $FavMagasin->setIdUtilisateur($iduser);
        $FavMagasin->setIdMagasin($idMagasin);
        $FavMagasin->save();
        $this->getUser()->setFlash("info", "Le magasin a été ajouter à vos favoris"); 
    }
    else
    {
        $this->getUser()->setFlash("warning", "Ce magasin existe déjà dans vos favoris");   
    }
    $this->redirect('magasin/index/aff/tous');  
  }
  
  public function executeQuitterFavoris(sfWebRequest $request)
  {
    $idFav = $request->getParameter('magasin2');
    MagasinsFavorisPeer::deleteFavQuitterListe($idFav);
    $this->getUser()->setFlash("warning", "Magasin retiré de vos favoris.");   
    $this->redirect('magasin/index');
  }
  
  public function executeNouveauMagasin(sfWebRequest $request)
  {
    if($request->getParameter('nommag') != null && $request->getParameter('partage') != null && $request->getParameter('lienimg') != null)
    {
        $iduser = $this->getUser()->getModelUtilisateur()->getId();
        $modelMagasin = MagasinPeer::retriveMagasinDejaPresent($iduser,$request->getParameter('nommag'));
        if($modelMagasin == null)
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
                    file_put_contents('images/magasins/'.$request->getParameter("nommag").$ext, $brut );

                    $modelMagasin = new Magasin();
                    $modelMagasin->setNom($request->getParameter("nommag"));
                    $modelMagasin->setIdUtilisateur($iduser);
                    $modelMagasin->setImg(addslashes ($request->getParameter("nommag").$ext));
                    $modelMagasin->setDateCreation(new \DateTime());
                    $modelMagasin->setIdEtat(2);
                    $modelMagasin->setIdVisibilite($request->getParameter('partage'));
                    $modelMagasin->save();

                    $this->getUser()->setFlash("info", "Le magasin a été ajouter à votre liste"); 
                }   
            }
        }
        else
        {
            $this->getUser()->setFlash("warning", "Ce nom de magasin existe déjà dans votre liste");   
        }
    }
    else
    {
        $this->getUser()->setFlash("warning", "Tous les champs sont requis.");   
    }
    $this->redirect('magasin/index'); 
  }
}
