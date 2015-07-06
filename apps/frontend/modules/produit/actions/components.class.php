<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Max
 */
class produitComponents extends sfComponents {
    public function executeProduitPagination(sfRequest $request)
    {
        $this->produits = ProduitPeer::retrievePourUnUtilisateurEtUneListe($this->getUser()->getModelUtilisateur(),$this->liste);
    }
}