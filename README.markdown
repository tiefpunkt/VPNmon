# VPNmon
VPNmon is a monitoring solution for OpenVPN VPN tunnels. It is build using the symfony framework.

## Install
1.  Get VPNmon  
    `git clone https://github.com/tiefpunkt/VPNmon.git`
2.  Fetch submodules  
    `git submodule update --init`
3.  Configure Database  
    `php symfony configure:database "mysql:host=localhost;dbname=<databasename>" <user> <password>`  
    This assumes, that you have setup your database before installation.
4.  Initialize database  
    `php symfony doctrine:insert-sql`
5.  Configure OpenVPN
    * Enable status file  
      In Debian, this is done automatically, if it's not, add the following line to your OpenVPN config file  
     `status <path>`
    * Client disconnect script  
      VPNmon gets notifications and data about tunnel usage, certificates etc. from the client disconnect script. Add the following lines to your configuration:  
      `script-security 2   
	  
      client-disconnect <path to VPNmon>/bin/client-disconnect.sh  	  `
6.  Point your webservers root directory to VPNmon's web directory