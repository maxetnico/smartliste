<?php

class Utilisateur extends BaseUtilisateur
{
    public function quitterListe($idListe)
    {
        UtilisateurListeLinkPeer::deleteByIdUserAndIdListe(parent::getId(),$idListe);
    }
    
    public function ajouterALaListe($idListe)
    {
        $modelUtilisateurListeLink = new UtilisateurListeLink();
        $modelUtilisateurListeLink->setIdUtilisateur(parent::getId());
        $modelUtilisateurListeLink->setIdListe($idListe);
        $modelUtilisateurListeLink->save();
    }
}
