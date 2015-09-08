<?php

class ListeProduitLinkPeer extends BaseListeProduitLinkPeer
{   
    public static function retrieveOneNotCheckedByListeAndProduct($idListe,$idProduct)
    {
        $crit = new Criteria();        
        $crit->add(self::ID_LISTE,$idListe,  Criteria::EQUAL);    
        $crit->add(self::COCHE,0);
        $crit->add(self::ID_PRODUIT,$idProduct,  Criteria::EQUAL);
        return parent::doSelectOne($crit);
    }
}
