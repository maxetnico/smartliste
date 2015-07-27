<?php



class MagasinsFavorisPeer extends BaseMagasinsFavorisPeer {

    public static function retriveFavPourUnUtilisateur($isu) {
        
       /* $crit = new Criteria();
        $crit->add(MagasinsFavorisPeer::ID_UTILISATEUR,$isu);
        $crit->addJoin(MagasinsFavorisPeer::ID_MAGASIN, MagasinPeer::ID);
        $crit->clearSelectColumns();
        //$crit->addAsColumn('idm', self::ID);
        $crit->addSelectColumn(self::ID);
       // $crit->addAsColumn('nomm', MagasinPeer::NOM);
        $crit->addSelectColumn(MagasinPeer::NOM);
       // $crit->addAsColumn('imgm', MagasinPeer::IMG);
        $crit->addSelectColumn(MagasinPeer::IMG);
        $crit->addAsColumn('imgm', MagasinPeer::ID_ETAT);
        $crit->
        return parent::doSelect($crit);*/
        
        $crit = new Criteria();
        $crit->clearSelectColumns();
        $crit->add(MagasinsFavorisPeer::ID_UTILISATEUR,$isu);
        $crit->addJoin(MagasinsFavorisPeer::ID_MAGASIN, MagasinPeer::ID, Criteria::JOIN);
        return parent::doSelect($crit);
      
    /*  $connection = Propel::getConnection();
    $query = 'SELECT '.self::ID.','.MagasinPeer::NOM.','.MagasinPeer::IMG.' FROM '.self::TABLE_NAME.','.MagasinPeer::TABLE_NAME.' where '.self::ID_UTILISATEUR.'='.$isu.' AND '.self::ID_MAGASIN.'='.MagasinPeer::ID;
    //$query = sprintf($query, ArticlePeer::CREATED_AT, ArticlePeer::TABLE_NAME);
    $statement = $connection->prepareStatement($query);
    return $statement->executeQuery();*/
        
    }
    
    public static function deleteFavQuitterListe($idFav) {
        $crit = new Criteria();
        $crit->add(self::ID,$idFav);
        return parent::doDelete($crit);
    }
    
    public static function retriveFavMagasinDejaPresent($iduser,$idMagasin) {
        $crit = new Criteria();
        $crit->add(self::ID_UTILISATEUR,$iduser);
        $crit->add(self::ID_MAGASIN,$idMagasin);
        return parent::doSelect($crit);
    }
}
