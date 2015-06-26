<?php

class MagasinPeer extends BaseMagasinPeer
{
    public static function retriveTous() {
        $crit = new Criteria();
        //$crit->add(self::ID_VISIBILITE,5,  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
    
     public static function retriveTousPourUnUtilisateur($idUtilisateur) {
        $crit = new Criteria();
        //$crit->add(self::ID_VISIBILITE,5,  Criteria::EQUAL);
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur,  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
}
