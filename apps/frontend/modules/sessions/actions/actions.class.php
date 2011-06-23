<?php

/**
 * monitor actions.
 *
 * @package    VPNmon
 * @subpackage sessions
 * @author     Severin Schols <severin@schols.de>
 */
class sessionsActions extends sfActions
{

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $connections = array();
    $instances = Doctrine_Core::getTable('Instance')->createQuery()->execute();;
    
	foreach($instances as $instance) {
	  $temp = openVpnStatusParser::parseLog($instance->getStatusFile(), $instance->getName());
	  if (isset($temp["users"])) {
        $temp2 = $connections;
        $connections = array_merge($temp2, $temp["users"]);
      }
	}
	
	$this->connections = $connections;
  }
}
