<?php

class VisibilitePeer extends BaseVisibilitePeer
{
    public static function retrieveAll()
    {
        return parent::doSelect(new Criteria());
    }
}
