<?php

class MagasinPeer extends BaseMagasinPeer
{
    public static function retriveTous() {
        $crit = new Criteria();
        $crit->addJoin(self::ID_ETAT,  EtatPeer::ID);
        $crit->add(EtatPeer::CODE,'SIT',  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
    
     public static function retrivePourUnUtilisateur($idUtilisateur) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur, Criteria::EQUAL);
        return parent::doSelect($crit);
    }
    
    public static function retriveMagasinDejaPresent($idUtilisateur,$nomMagasin) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur);
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
}
