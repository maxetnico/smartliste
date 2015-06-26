<?php


/**
 * This class adds structure of 'liste' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 06/26/15 11:33:06
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ListeMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ListeMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ListePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ListePeer::TABLE_NAME);
		$tMap->setPhpName('Liste');
		$tMap->setClassname('Liste');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'BIGINT', true, 20);

		$tMap->addColumn('ICONE', 'Icone', 'VARCHAR', false, 100);

		$tMap->addColumn('NOM', 'Nom', 'VARCHAR', true, 255);

		$tMap->addColumn('COULEUR', 'Couleur', 'VARCHAR', false, 10);

		$tMap->addForeignKey('ID_UTILISATEUR', 'IdUtilisateur', 'BIGINT', 'utilisateur', 'ID', true, 20);

		$tMap->addColumn('ID_PARTAGE', 'IdPartage', 'VARCHAR', false, 15);

		$tMap->addColumn('DATE_CREATION', 'DateCreation', 'TIMESTAMP', true, null);

		$tMap->addColumn('DATE_MODIFICATION', 'DateModification', 'TIMESTAMP', false, null);

	} // doBuild()

} // ListeMapBuilder
