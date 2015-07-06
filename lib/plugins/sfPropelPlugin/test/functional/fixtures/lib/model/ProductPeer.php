<?php

/**
 * Subclass for performing query and update operations on the 'product' table.
 *
 * 
 *
 * @package    lib.model
 * @subpackage model
 */
class ProductPeer extends BaseProductPeer
{
    public static function retrieveProduitPourUnUtilisateurEtUneListe($utilisateur, $liste, $recherche)
    {
        $crit = new Criteria();
        $crit->addJoin(parent::ID_UTILISATEUR, $utilisateur->getId());
        return parent::doSelect($crit);
    }
}
