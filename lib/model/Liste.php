<?php

class Liste extends BaseListe
{
    public function save(\PropelPDO $con = null) {
        if(parent::getIdPartage() == null)
        {
            $boolOk = false;            
            while(!$boolOk)
            {
                $id = $this->random_str(15);
                // on teste si il n'existe pas déjà
                if(ListePeer::retrieveOneByIdPartage($id) == null)
                {
                    $boolOk = true;
                    parent::setIdPartage($id);
                }
            }
        }
        parent::save($con);
    }
    
    protected function random_str($nbr) {
    $str = "";
    $chaine = "abcdefghijklmnopqrstuvwxyz0123456789";
    $nb_chars = strlen($chaine);

    for($i=0; $i<$nbr; $i++)
    {
        $str .= $chaine[ rand(0, ($nb_chars-1)) ];
    }

    return $str;
}
}
