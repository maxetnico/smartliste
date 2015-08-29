<?php

class MagasinPeer extends BaseMagasinPeer
{    
    public static function retriveFav2PourUnUtilisateur($isu) {
        
        $crit = new Criteria();
        $crit->addJoin(self::ID, MagasinsFavorisPeer::ID_MAGASIN);
        $crit->add(MagasinsFavorisPeer::ID_UTILISATEUR,$isu,  Criteria::EQUAL);
      //  $crit->addAsColumn('idfav',MagasinsFavorisPeer::ID);
        return parent::doSelect($crit);
    }
    
    public static function retriveFavPourUnUtilisateur($isu) {
        
        $crit = new Criteria();
        $crit->add(MagasinsFavorisPeer::ID_UTILISATEUR,$isu);
        $crit->add(self::ID,  MagasinsFavorisPeer::ID); 
        return parent::doSelect($crit);
    }
    
    public static function retriveTous() {
        $crit = new Criteria();
        $crit->addJoin(self::ID_ETAT,  EtatPeer::ID);
        $crit->add(EtatPeer::CODE,'VAL',  Criteria::EQUAL);
        $crit->addJoin(self::ID_VISIBILITE, VisibilitePeer::ID);
        $crit->add(VisibilitePeer::CODE,'SIT',  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
    public static function retriveTousSaufMoi($idu) {
        $crit = new Criteria();
        $crit->addJoin(self::ID_ETAT,  EtatPeer::ID);
        $crit->add(EtatPeer::CODE,'VAL',  Criteria::EQUAL);
        $crit->addJoin(self::ID_VISIBILITE, VisibilitePeer::ID);
        $crit->add(VisibilitePeer::CODE,'SIT',  Criteria::EQUAL);
        $crit->add(self::ID_UTILISATEUR,$idu,  Criteria::NOT_EQUAL);
        return parent::doSelect($crit);
    }
    
    public static function retrivePourUnUtilisateur($idUtilisateur) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur, Criteria::EQUAL);
        return parent::doSelect($crit);
    }
    
    public static function retriveMagasinDejaPresent($idUtilisateur,$nomMagasin) {
        $crit = new Criteria();
       // $crit->add(self::ID_UTILISATEUR,$idUtilisateur);
        $crit->add(self::NOM,$nomMagasin);
        return parent::doSelect($crit);
    }
    public static function UpdateIdUtilisateurEtIdListe($idUtilisateur,$nomMagasin) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur);
        $crit->add(self::NOM,$nomMagasin);
        $crit->put(self::ID_UTILISATEUR,0);
        return parent::doUpdate($crit);
    }
    
    public static function retrieveOneByListeAndProduct($idListe,$idProduct)
    {
        $crit = new Criteria();
        $crit->addJoin(self::ID, ListeProduitLinkPeer::ID_MAGASIN);
        $crit->add(ListeProduitLinkPeer::ID_LISTE,$idListe,  Criteria::EQUAL);       
        $crit->add(ListeProduitLinkPeer::ID_PRODUIT,$idProduct,  Criteria::EQUAL);
        return parent::doSelectOne($crit);
    }
    
    public static function retrieveTousValidePourUnUtilisateur($idUtilisateur)
    {
        $crit = new Criteria();
        $crit->addJoin(self::ID_ETAT,  EtatPeer::ID);        
        $crit->addJoin(self::ID_VISIBILITE, VisibilitePeer::ID); 
       
        
        $criterion1 = $crit->getNewCriterion(EtatPeer::CODE,'VAL',  Criteria::EQUAL);
        $criterion1->addAnd($crit->getNewCriterion(VisibilitePeer::CODE,'SIT',  Criteria::EQUAL));   
        
        
        $criterion2 = $crit->getNewCriterion(VisibilitePeer::CODE,'MOI',  Criteria::EQUAL);
        $criterion2->addAnd($crit->getNewCriterion(parent::ID_UTILISATEUR,$idUtilisateur,  Criteria::EQUAL));
        $criterion1->addOr($criterion2);
        
        $crit->add($criterion1);
        
        //TODO récupérer les magasins des autres utilisateurs de la liste
        
        $crit->setDistinct();        
        return parent::doSelect($crit);
    }
}
