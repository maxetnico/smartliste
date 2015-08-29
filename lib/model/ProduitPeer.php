<?php

class ProduitPeer extends BaseProduitPeer
{
    public static function retrievePourUnUtilisateurSaufListeAvecCollaborateurs($utilisateur,$liste)
    {
        $arrRetour = array();
        $crit = new Criteria();
        $crit->addJoin(ListeProduitLinkPeer::ID_PRODUIT,self::ID);
        $crit->add(ListeProduitLinkPeer::ID_LISTE,$liste->getId(),  Criteria::EQUAL);
        $crit->add(ListeProduitLinkPeer::COCHE,0,  Criteria::EQUAL);
        $crit->setDistinct();
        $arrExclus = parent::doSelect($crit);
        
        $crit = new Criteria();
        $criterion = self::getCriterionPourUnUtilisateur($utilisateur,$crit);
        $crit->add($criterion);
        $arrInclus = parent::doSelect($crit);        
        
        $utilisateurs = UtilisateurPeer::retrieveParListe($liste);
        foreach ($utilisateurs as $user) {
            $arrInclus = array_merge($arrInclus, self::retrievePourUnUtilisateur($user));
        }
        
        foreach ($arrInclus as $inclu) {
            $boolOk = true;
            foreach ($arrExclus as $exclu) {
                if($inclu->getId() == $exclu->getId())
                {
                    $boolOk = false;
                    break;
                }
            }
            if($boolOk)
            {
                $arrRetour[$inclu->getId()] = $inclu;
            }
        }
        
        return $arrRetour;
    }
    
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
    
    public static function retrievePourUneListe($liste,$crit = null)
    {        
        if($crit == null)
        {
            $crit = new Criteria();
        }
        $crit->addJoin(self::ID, ListeProduitLinkPeer::ID_PRODUIT);
        $crit->add(ListeProduitLinkPeer::ID_LISTE,$liste->getId());
        $produits = parent::doSelect($crit);
        $retour = array();
        foreach ($produits as $produit) {
            $modelMagasin = MagasinPeer::retrieveOneByListeAndProduct($liste->getId(),$produit->getId());
            $modelLink = ListeProduitLinkPeer::retrieveOneByListeAndProduct($liste->getId(),$produit->getId());
            $retour[] = array($produit,$modelMagasin,$modelLink);
        }
        return $retour;
    }
    
    public static function retrievePourUneListeNonCoche($liste)
    {        
        $crit = new Criteria();
        $crit->add(ListeProduitLinkPeer::COCHE,0);
        return self::retrievePourUneListe($liste,$crit);
    }
    
    protected static function getCriterionPourUnUtilisateur($utilisateur,$c)
    {       
        $cton1 = $c->getNewCriterion(self::ID_UTILISATEUR, $utilisateur->getId());
        $cton2 = $c->getNewCriterion(self::ID_VISIBILITE, 3);
        
        $cton1->addOr($cton2);        
        return $cton1;
    }   
}