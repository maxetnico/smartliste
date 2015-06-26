<?php

class ListePeer extends BaseListePeer
{
    public static function retrievePourUnUtilisateur($idUtilisateur)
    {
        $crit = new Criteria();
        $crit->addJoin(self::ID, UtilisateurListeLinkPeer::ID_LISTE);
        $crit->add(UtilisateurListeLinkPeer::ID_UTILISATEUR,$idUtilisateur);
        return parent::doSelect($crit);
    }
    
    public static function retrieveOneParIdPartage($idPartage)
    {
        $crit = new Criteria();        
        $crit->add(self::ID_PARTAGE,$idPartage);
        return parent::doSelectOne($crit);
    }
}
