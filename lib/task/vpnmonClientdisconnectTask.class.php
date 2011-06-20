<?php

class vpnmonClientdisconnectTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'vpnmon';
    $this->name             = 'client-disconnect';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [vpnmon:client-disconnect|INFO] task does things.
Call it with:

  [php symfony vpnmon:client-disconnect|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
	
	//Get environment variables
	$cname = getenv("common_name");
	$ip = getenv("trusted_ip");
	$port = getenv("trusted_port");
	$date = date("Y-m-d H:i:s", getenv("time_unix"));
	$duration = getenv("time_duration");
	$bytes_received = getenv("bytes_received");
	$bytes_sent = getenv("bytes_sent");
	$instance = getenv("config");
	$email = getenv("X509_0_emailAddress");
	
	$session = new VPNSession();
	$session->setIp($ip);
	$session->setPort($port);
	$session->setDuration($duration);
	$session->setBytesReceived($bytes_received);
	$session->setBytesSent($bytes_sent);
	$session->setTimeStart($date);
	$session->SetInstamce($instance);
	
	$query = Doctrine_Core::getTable('Certificate')->createQuery('c')->where('c.cname = ?', $cname)->limit(1);
	$certificate = $query->fetchOne();
	if (!$certificate) {
	  $certificate = new Certificate();
	  $certificate->setCname($cname);
	  $certificate->setEmail($email);
	  $certificate->save();
	}
	
	$session->setCertificate($certificate);
	$session->save();
  }
}
