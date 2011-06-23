<?php

/**
 * Instance form.
 *
 * @package    VPNmon
 * @subpackage form
 * @author     Severin Schols <severin@schols.de>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InstanceForm extends BaseInstanceForm
{
  public function configure()
  {
	  parent::setUp();
	  unset($this['created_at'],$this['updated_at']);
          // rest of your form logic
  }
}
