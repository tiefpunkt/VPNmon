<?php

/**
 * BaseCertificate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $cname
 * @property string $email
 * @property Doctrine_Collection $VPNSessions
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getCname()       Returns the current record's "cname" value
 * @method string              getEmail()       Returns the current record's "email" value
 * @method Doctrine_Collection getVPNSessions() Returns the current record's "VPNSessions" collection
 * @method Certificate         setId()          Sets the current record's "id" value
 * @method Certificate         setCname()       Sets the current record's "cname" value
 * @method Certificate         setEmail()       Sets the current record's "email" value
 * @method Certificate         setVPNSessions() Sets the current record's "VPNSessions" collection
 * 
 * @package    VPNmon
 * @subpackage model
 * @author     Severin Schols <severin@schols.de>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCertificate extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('certificate');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('cname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('VPNSession as VPNSessions', array(
             'local' => 'id',
             'foreign' => 'certificate_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}