<?php

/**
 * Certificate filter form base class.
 *
 * @package    VPNmon
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCertificateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cname' => new sfWidgetFormFilterInput(),
      'email' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cname' => new sfValidatorPass(array('required' => false)),
      'email' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('certificate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Certificate';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'cname' => 'Text',
      'email' => 'Text',
    );
  }
}
