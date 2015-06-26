<?php


/**
 * This class adds structure of 'produit' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 06/26/15 10:56:57
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ProduitMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProduitMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(ProduitPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ProduitPeer::TABLE_NAME);
		$tMap->setPhpName('Produit');
		$tMap->setClassname('Produit');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'BIGINT', true, 20);

		$tMap->addColumn('NOM', 'Nom', 'VARCHAR', true, 128);

		$tMap->addColumn('IMG', 'Img', 'LONGVARCHAR', false, null);

		$tMap->addForeignKey('ID_UTILISATEUR', 'IdUtilisateur', 'BIGINT', 'utilisateur', 'ID', false, 20);

		$tMap->addForeignKey('ID_CATEGORIE', 'IdCategorie', 'INTEGER', 'categorie', 'ID', false, 11);

		$tMap->addForeignKey('ID_ETAT', 'IdEtat', 'TINYINT', 'etat', 'ID', true, 4);

		$tMap->addForeignKey('ID_VISIBILITE', 'IdVisibilite', 'TINYINT', 'visibilite', 'ID', true, 4);

	} // doBuild()

} // ProduitMapBuilder
