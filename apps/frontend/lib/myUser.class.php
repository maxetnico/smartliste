<?php

class myUser extends sfBasicSecurityUser
{
    public function setModelUtilisateur($modelUtilisateur)            
    {
        $this->setAttribute('modelUtilisateur', $modelUtilisateur);
    }
    
    public function getModelUtilisateur()            
    {
        return $this->getAttribute('modelUtilisateur');
    }
}
