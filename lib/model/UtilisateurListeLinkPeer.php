<?php

class UtilisateurListeLinkPeer extends BaseUtilisateurListeLinkPeer
{
    public static function deleteParIdUtilisateurEtIdListe($idUtilisateur, $idListe)
    {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$idUtilisateur);
        $crit->add(self::ID_LISTE,$idListe);
        parent::doDelete($crit);
        
        //si il n'y a plus d'utilisateur pour une liste, on supprime la liste
        $crit = new Criteria();       
        $crit->add(self::ID_LISTE,$idListe);
        $count = count(parent::doSelect($crit));
        if($count == 0)
        {
            $crit = new Criteria();       
            $crit->add(ListePeer::ID,$idListe);
            ListePeer::doDelete($crit);
        }
    }
}
