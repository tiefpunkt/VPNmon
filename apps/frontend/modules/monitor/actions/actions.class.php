<?php

/**
 * monitor actions.
 *
 * @package    VPNmon
 * @subpackage monitor
 * @author     Severin Schols <severin@schols.de>
 */
class monitorActions extends sfActions
{

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $connections = array();
    $instances = sfConfig::get('app_instances');
    
	foreach($instances as $instance) {
	  $temp = openVpnStatusParser::parseLog($instance["status"], $instance["name"]);
	  if (isset($temp["users"])) {
        $temp2 = $connections;
        $connections = array_merge($temp2, $temp["users"]);
      }
	}
	
	$this->connections = $connections;
  }
  
  public function executeCertificates(sfWebRequest $request)
  {
    $this->certificates = Doctrine_Core::getTable('Certificate')->createQuery()->execute();	
  }
}