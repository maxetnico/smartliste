<?php

class VisibilitePeer extends BaseVisibilitePeer
{
    public static function retrieveAll()
    {
        return parent::doSelect(new Criteria());
    }
    public static function retriveIdDuCode($code) {
        $crit = new Criteria;
        $crit->add(self::CODE,$code,  Criteria::EQUAL);
        return parent::doSelect($crit);
    }
}
