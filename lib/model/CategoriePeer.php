<?php

class CategoriePeer extends BaseCategoriePeer
{
    public static function retrieveAll()
    {
        return parent::doSelect(new Criteria());
    }
}
