<?php

/**
 * BaseVPNSession
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $certificate_id
 * @property string $ip
 * @property integer $port
 * @property timestamp $time_start
 * @property integer $duration
 * @property integer $bytes_received
 * @property integer $bytes_sent
 * @property integer $instance_id
 * @property Certificate $Certificate
 * @property Instance $Instance
 * 
 * @method integer     getId()             Returns the current record's "id" value
 * @method integer     getCertificateId()  Returns the current record's "certificate_id" value
 * @method string      getIp()             Returns the current record's "ip" value
 * @method integer     getPort()           Returns the current record's "port" value
 * @method timestamp   getTimeStart()      Returns the current record's "time_start" value
 * @method integer     getDuration()       Returns the current record's "duration" value
 * @method integer     getBytesReceived()  Returns the current record's "bytes_received" value
 * @method integer     getBytesSent()      Returns the current record's "bytes_sent" value
 * @method integer     getInstanceId()     Returns the current record's "instance_id" value
 * @method Certificate getCertificate()    Returns the current record's "Certificate" value
 * @method Instance    getInstance()       Returns the current record's "Instance" value
 * @method VPNSession  setId()             Sets the current record's "id" value
 * @method VPNSession  setCertificateId()  Sets the current record's "certificate_id" value
 * @method VPNSession  setIp()             Sets the current record's "ip" value
 * @method VPNSession  setPort()           Sets the current record's "port" value
 * @method VPNSession  setTimeStart()      Sets the current record's "time_start" value
 * @method VPNSession  setDuration()       Sets the current record's "duration" value
 * @method VPNSession  setBytesReceived()  Sets the current record's "bytes_received" value
 * @method VPNSession  setBytesSent()      Sets the current record's "bytes_sent" value
 * @method VPNSession  setInstanceId()     Sets the current record's "instance_id" value
 * @method VPNSession  setCertificate()    Sets the current record's "Certificate" value
 * @method VPNSession  setInstance()       Sets the current record's "Instance" value
 * 
 * @package    VPNmon
 * @subpackage model
 * @author     Severin Schols <severin@schols.de>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVPNSession extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('vpn_session');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('certificate_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('ip', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
        $this->hasColumn('port', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('time_start', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('duration', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('bytes_received', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('bytes_sent', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('instance_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Certificate', array(
             'local' => 'certificate_id',
             'foreign' => 'id'));

        $this->hasOne('Instance', array(
             'local' => 'instance_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}