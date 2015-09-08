<?php

class EtatPeer extends BaseEtatPeer
{
    public static function retriveIdDuCode($code) {
        $crit = new Criteria;
        $crit->add(self::CODE,$code,  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
}
