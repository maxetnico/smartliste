<?php

class MagasinPeer extends BaseMagasinPeer
{
    public static function retriveTous() {
        $crit = new Criteria();
        $crit->addJoin(self::ID_ETAT,  EtatPeer::ID);
        $crit->add(EtatPeer::CODE,'VAL',  Criteria::EQUAL);
        $crit->addJoin(self::ID_VISIBILITE, VisibilitePeer::ID);
        $crit->add(VisibilitePeer::CODE,'SIT',  Criteria::EQUAL);
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
}
