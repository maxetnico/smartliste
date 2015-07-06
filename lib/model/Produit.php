<?php

class Produit extends BaseProduit
{
     public function getEtatNom(){
        return EtatPeer::retrieveByPK(parent::getIdEtat())->getCode();
    }
    public function getVisibleNom(){
        return VisibilitePeer::retrieveByPK(parent::getIdVisibilite())->getNom();
    }
    public function getCategorieNom(){
        return CategoriePeer::retrieveByPK(parent::getIdCategorie())->getNom();
    }
}
