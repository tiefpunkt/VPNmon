<?php

/**
 * monitor actions.
 *
 * @package    VPNmon
 * @subpackage monitor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
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
