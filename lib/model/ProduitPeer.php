<?php

class ProduitPeer extends BaseProduitPeer
{
    public static function retrievePourUnUtilisateurEtUneListe($utilisateur, $liste, $recherche = "")
    {
        //Ne marche pas correctement et je ne sais pas pourquoi
        
        $crit = new Criteria();
        //$crit->addJoin(self::ID, ListeProduitLinkPeer::ID_PRODUIT);
        $criterion = self::getCriterionPourUnUtilisateur($utilisateur,$crit);   
        
        //$criterion1 = $crit->getNewCriterion(ListeProduitLinkPeer::ID_PRODUIT, parent::ID, Criteria::EQUAL);
        //$criterion2 = $crit->getNewCriterion(ListeProduitLinkPeer::ID_LISTE, $liste->getId(), Criteria::EQUAL);
        //$criterion3 = $crit->getNewCriterion(parent::ID_VISIBILITE, 2, Criteria::EQUAL);
        
//        $criterion2->addAnd($criterion1);
//        $criterion2->addAnd($criterion3);
//        $criterion->addOr($criterion2);
        $crit->add($criterion);
        $crit->setDistinct();        
        
        return parent::doSelect($crit);
    }
    
    public static function retrievePourUnUtilisateur($utilisateur, $recherche = "")
    {
        $crit = new Criteria();
        $criterion = self::getCriterionPourUnUtilisateur($utilisateur,$crit);
        $crit->add($criterion);
        $crit->setDistinct();
        return parent::doSelect($crit);
    }
    
    protected static function getCriterionPourUnUtilisateur($utilisateur,$c)
    {       
        $cton1 = $c->getNewCriterion(self::ID_UTILISATEUR, $utilisateur->getId());
        $cton2 = $c->getNewCriterion(self::ID_VISIBILITE, 3);
        
        $cton1->addOr($cton2);        
        return $cton1;
    }
}
