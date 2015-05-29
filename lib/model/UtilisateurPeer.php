<?php

class UtilisateurPeer extends BaseUtilisateurPeer
{
    public static function retrieveAll()
    {
        $crit = new Criteria();
        return parent::doSelect($crit);
    }
    
    //exemple de recherche
    public static function retrieveJean()
    {
        $crit = new Criteria();
        $crit->add(self::PSEUDO,"Jean",Criteria::EQUAL);
        return parent::doSelect($crit);
    }
}
