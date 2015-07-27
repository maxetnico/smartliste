<?php

class ListeProduitLinkPeer extends BaseListeProduitLinkPeer
{   
    public static function retrieveOneByListeAndProduct($idListe,$idProduct)
    {
        $crit = new Criteria();        
        $crit->add(self::ID_LISTE,$idListe,  Criteria::EQUAL);       
        $crit->add(self::ID_PRODUIT,$idProduct,  Criteria::EQUAL);
        return parent::doSelectOne($crit);
    }
}
