<?php

/**
 * certificates actions.
 *
 * @package    VPNmon
 * @subpackage certificates
 * @author     Severin Schols <severin@schols.de>
 */
class certificatesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->certificates = Doctrine_Core::getTable('Certificate')->createQuery()->execute();	
  }
}
