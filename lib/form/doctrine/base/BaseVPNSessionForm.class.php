<?php

/**
 * VPNSession form base class.
 *
 * @method VPNSession getObject() Returns the current form's model object
 *
 * @package    VPNmon
 * @subpackage form
 * @author     Severin Schols <severin@schols.de>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVPNSessionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'certificate_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Certificate'), 'add_empty' => true)),
      'ip'             => new sfWidgetFormInputText(),
      'port'           => new sfWidgetFormInputText(),
      'time_start'     => new sfWidgetFormDateTime(),
      'duration'       => new sfWidgetFormInputText(),
      'bytes_received' => new sfWidgetFormInputText(),
      'bytes_sent'     => new sfWidgetFormInputText(),
      'instance_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Instance'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'certificate_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Certificate'), 'required' => false)),
      'ip'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'port'           => new sfValidatorInteger(array('required' => false)),
      'time_start'     => new sfValidatorDateTime(array('required' => false)),
      'duration'       => new sfValidatorInteger(array('required' => false)),
      'bytes_received' => new sfValidatorInteger(array('required' => false)),
      'bytes_sent'     => new sfValidatorInteger(array('required' => false)),
      'instance_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Instance'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vpn_session[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VPNSession';
  }

}
