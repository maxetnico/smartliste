<?php

class MagasinPeer extends BaseMagasinPeer
{
    public static function retriveTous() {
        $crit = new Criteria();
        return parent::doSelect($crit);
    }
    
     public static function retriveTousPourUnUtilisateur($idUtilisateur) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur,  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
    
    public static function retriveMagasinDejaPresent($idUtilisateur,$nomMagasin) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur,  Criteria::EQUAL);
        $crit->add(self::NOM,$nomMagasin,  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
}
