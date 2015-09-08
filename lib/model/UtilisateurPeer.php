<?php

class UtilisateurPeer extends BaseUtilisateurPeer
{
    public static function retrieveAll()
    {
        $crit = new Criteria();
        return parent::doSelect($crit);
    }
    
    public static function retrieveParListe($liste)
    {
        $crit = new Criteria();
        $crit->addJoin(self::ID,  UtilisateurListeLinkPeer::ID_UTILISATEUR);
        $crit->add(UtilisateurListeLinkPeer::ID_LISTE,$liste->getId());
        return parent::doSelect($crit);
    }
    
    public static function retrieveByPseudo($pseudo)
    {
        $crit = new Criteria();
        $crit->add(self::PSEUDO,$pseudo,Criteria::EQUAL);
        return parent::doSelectOne($crit);
    }
    
    //exemple de recherche
    public static function retrieveJean()
    {
        $crit = new Criteria();
        $crit->add(self::PSEUDO,"Jean",Criteria::EQUAL);
        return parent::doSelect($crit);
    }
}
