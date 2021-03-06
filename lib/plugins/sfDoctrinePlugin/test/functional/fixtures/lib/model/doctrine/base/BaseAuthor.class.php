<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseAuthor extends myDoctrineRecord
{
  public function setTableDefinition()
  {
    $this->setTableName('author');
    $this->hasColumn('name', 'string', 255, array('type' => 'string', 'length' => '255'));
  }

  public function setUp()
  {
    $this->hasMany('Article as Articles', array('local' => 'id',
                                                'foreign' => 'author_id'));
  }
}