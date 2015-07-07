<?php

class Magasin extends BaseMagasin
{
    public function getEtatNom(){
        return EtatPeer::retrieveByPK(parent::getIdEtat())->getCode();
    }
    public function getVisibleNom(){
        return VisibilitePeer::retrieveByPK(parent::getIdVisibilite())->getCode();
    }
    public function quitterMagasin($idUtiliateur,$idMagasin)
    {
        MagasinPeer::UpdateIdUtilisateurEtIdListe($idUtiliateur,$idMagasin);
    }
    
}
