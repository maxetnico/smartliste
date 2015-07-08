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
  
  public function executeNouveauMagasin(sfWebRequest $request)
  {
    if($request->getParameter('nommag') != null && $request->getParameter('partage') != null && $request->getParameter('lienimg') != null)
    {
        $iduser = $this->getUser()->getModelUtilisateur()->getId();
        $modelMagasin = MagasinPeer::retriveMagasinDejaPresent($iduser,$request->getParameter('nommag'));
        if($modelMagasin == null)
        {
            $ext = substr($request->getParameter("lienimg"),-4);
            
            
            switch ($ext){
                case ".png":break;
                case ".jpg":break;
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
                    $this->redirect('magasin/index'); 
                }
                else {
                   // if(!file_exists('images/magasins/'.$request->getParameter("nommag").$ext))
                   // {
                        file_put_contents('images/magasins/'.$request->getParameter("nommag").$ext, $brut );
                        
                        $modelMagasin = new Magasin();
                        $modelMagasin->setNom($request->getParameter("nommag"));
                        $modelMagasin->setIdUtilisateur($iduser);
                        $modelMagasin->setImg(addslashes ($request->getParameter("nommag").$ext));//http://www.grandfrais.com/charte/base/img/visual/logo.png
                        $modelMagasin->setDateCreation(new \DateTime());
                        $modelMagasin->setIdEtat(EtatPeer::retriveIdDuCode('ATT'));
                        $modelMagasin->setIdVisibilite(VisibilitePeer::retriveIdDuCode($request->getParameter('partage')));
                        $modelMagasin->save();

                        $this->getUser()->setFlash("info", "Le magasin a été ajouter à votre liste"); 


                        $this->redirect('magasin/index');        
                        
                   // }
                }
            }
         //   list($width,$height,$type,$attr) = file_get_contents($request->getParameter("lienimg"));
         //   file_put_contents('images/test/test.txt', $width." - ".$height." - ".$type." - ".$attr);
         //   file_put_contents('images/test/test.jpg', $current);
            

        }
        else
        {
            $this->getUser()->setFlash("warning", "Ce nom de magasin existe déjà dans votre liste");   
            $this->redirect('magasin/index'); 
        }
    }
  }
}
