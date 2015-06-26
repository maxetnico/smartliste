<?php


/**
 * This class adds structure of 'liste_produit_link' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 06/26/15 09:43:54
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ListeProduitLinkMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ListeProduitLinkMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ListeProduitLinkPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ListeProduitLinkPeer::TABLE_NAME);
		$tMap->setPhpName('ListeProduitLink');
		$tMap->setClassname('ListeProduitLink');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'BIGINT', true, 20);

		$tMap->addForeignKey('ID_LISTE', 'IdListe', 'BIGINT', 'liste', 'ID', true, 20);

		$tMap->addForeignKey('ID_PRODUIT', 'IdProduit', 'BIGINT', 'produit', 'ID', true, 20);

		$tMap->addColumn('QUANTITE', 'Quantite', 'INTEGER', false, 11);

		$tMap->addForeignKey('ID_MAGAZIN', 'IdMagazin', 'BIGINT', 'magasin', 'ID', false, 20);

		$tMap->addColumn('COCHE', 'Coche', 'TINYINT', true, 1);

		$tMap->addColumn('COCHE_DATE', 'CocheDate', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('COCHE_ID_UTILISTEUR', 'CocheIdUtilisteur', 'BIGINT', 'utilisateur', 'ID', true, 20);

	} // doBuild()

} // ListeProduitLinkMapBuilder
