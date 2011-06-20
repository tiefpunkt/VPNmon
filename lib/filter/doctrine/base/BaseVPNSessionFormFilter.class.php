<?php

/**
 * VPNSession filter form base class.
 *
 * @package    VPNmon
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVPNSessionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'certificate_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Certificate'), 'add_empty' => true)),
      'ip'             => new sfWidgetFormFilterInput(),
      'port'           => new sfWidgetFormFilterInput(),
      'time_start'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'duration'       => new sfWidgetFormFilterInput(),
      'bytes_received' => new sfWidgetFormFilterInput(),
      'bytes_sent'     => new sfWidgetFormFilterInput(),
      'instance'       => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'certificate_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Certificate'), 'column' => 'id')),
      'ip'             => new sfValidatorPass(array('required' => false)),
      'port'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time_start'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'duration'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bytes_received' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bytes_sent'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'instance'       => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('vpn_session_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VPNSession';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'certificate_id' => 'ForeignKey',
      'ip'             => 'Text',
      'port'           => 'Number',
      'time_start'     => 'Date',
      'duration'       => 'Number',
      'bytes_received' => 'Number',
      'bytes_sent'     => 'Number',
      'instance'       => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
