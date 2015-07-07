<?php

class MagasinPeer extends BaseMagasinPeer
{
    public static function retriveTous() {
        $crit = new Criteria();
        return parent::doSelect($crit);
    }
    
     public static function retrivePourUnUtilisateur($idUtilisateur) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur);
        return parent::doSelect($crit);
    }
    
    public static function retriveMagasinDejaPresent($idUtilisateur,$nomMagasin) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur);
        $crit->add(self::NOM,$nomMagasin);
        return parent::doSelect($crit);
    }
}
