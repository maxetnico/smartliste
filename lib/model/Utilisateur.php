<?php

class Utilisateur extends BaseUtilisateur
{
    public function quitterListe($idListe)
    {
        UtilisateurListeLinkPeer::deleteParIdUtilisateurEtIdListe(parent::getId(),$idListe);
    }
    
    public function ajouterALaListe($idListe)
    {
        $modelUtilisateurListeLink = new UtilisateurListeLink();
        $modelUtilisateurListeLink->setIdUtilisateur(parent::getId());
        $modelUtilisateurListeLink->setIdListe($idListe);
        $modelUtilisateurListeLink->save();
    }
    
    public function quitterMagasin($idMagasin)
    {
        MagasinPeer::UpdateIdUtilisateurEtIdMagasin(parent::getId(),$idMagasin);
    }
}
