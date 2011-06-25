# VPNmon
VPNmon is a monitoring solution for OpenVPN VPN tunnels. It is build using the symfony framework.

## Install
* Get VPNmon
  ´git clone ...´
* Fetch submodules
  `git submodule update --init`
* Configure Database
  `php symfony configure:database "mysql:host=localhost;dbname=<databasename>" <user> <password>
  This assumes, that you have setup your database before installation.
* Initialize database
  ´php symfony doctrine:insert-sql´
* Configure OpenVPN
** Enable status file
   In Debian, this is done automatically, if it's not, add the following line to your OpenVPN config file
   ´status <path>´
** Client disconnect script
   VPNmon gets notifications and data about tunnel usage, certificates etc. from the client disconnect script. Add the following lines to your configuration:
   ´script-security 2
    client-disconnect <path to VPNmon>/bin/client-disconnect.sh
	`
* Point your webservers root directory to VPNmon's web directory