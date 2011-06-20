<?
/*
 * A parser for the openvpn 2 status log file.
 * 
 * Typical openvpn 2 status log file looks more or less like this:
 *
 *
 *	OpenVPN CLIENT LIST
 *	Updated,Thu Mar  3 17:24:54 2005
 *	Common Name,Real Address,Bytes Received,Bytes Sent,Connected Since
 *	common.name,1.2.3.4:21370,86559,87369,Thu Mar  3 13:39:10 2005
 *	other.common.name,7.8.9.1:54836,159509,167386,Thu Mar  3 13:39:10 2005
 *	ROUTING TABLE
 *	Virtual Address,Common Name,Real Address,Last Ref
 *	192.168.57.14,other.common.name,7.8.9.1:54836,Thu Mar  3 17:23:10 2005
 *	192.168.57.10,common.name,1.2.3.4:21370,Thu Mar  3 13:39:11 2005
 *	GLOBAL STATS
 *	Max bcast/mcast queue length,0
 *	END
 *
 * The parseLog function expects a path to a log file and a protocol.  The
 * protocol string is simply there to support an environment where you run
 * multiple openvpn daemons to listen on different ports or protocols, it is
 * a plain text field, suggested values are 'UDP', 'TCP', 'UDP/1234' etc.
 * 
 * Returned entries are indexed based on client host:port since that is 
 * guaranteed to be unique, common name wouldn't be unique since you can 
 * connect multiple times with the same cert.
 *
 * The parser will return a multi dimentional array given the status log above
 * that looks like this:
 *
 * Array
 * (
 *    [updated] => Thu Mar  3 17:30:55 2005
 *    [users] => Array
 *      (
 *            [0] => Array
 *              (
 *                 [CommonName] => common.name
 *                 [RealAddress] => 1.2.3.4:21370
 *                 [BytesReceived] => 86.39 KB
 *                 [BytesSent] => 87.18 KB
 *                 [Since] => Thu Mar  3 13:39:10 2005
 *                 [Proto] => UDP
 *                 [VirtualAddress] => 192.168.57.10
 *                 [LastRef] => Thu Mar  3 13:39:11 2005
 *              )
 *            [1] => Array
 *              (
 *                 [CommonName] => another.common.name
 *                 [RealAddress] => 7.8.9.1:54836
 *                 [BytesReceived] => 158.04 KB
 *                 [BytesSent] => 166.02 KB
 *                 [Since] => Thu Mar  3 13:39:10 2005
 *                 [Proto] => UDP
 *                 [VirtualAddress] => 192.168.57.14
 *                 [LastRef] => Thu Mar  3 17:27:14 2005
 *              )
 *      )
 * )
 *
 * I use a Smarty template to print out the data like this:
 *
 * <table>
 * {section name=u loop=$tcpusers}
 *   <tr bgcolor="{cycle values="#eeeeee,#dddddd"}">
 *      <td>{$tcpusers[u].CommonName}</td>
 *      <td>{$tcpusers[u].RealAddress}</td>
 *      <td>{$tcpusers[u].VirtualAddress}</td>
 *      <td>{$tcpusers[u].Since}</td>
 *      <td>{$tcpusers[u].BytesSent}</td>
 *      <td>{$tcpusers[u].BytesReceived}</td>
 *      <td>{$tcpusers[u].LastRef}</td>
 *      <td>{$tcpusers[u].Proto}</td>
 *   </tr>
 * {/section}
 * </table>
 *
 *
 * R.I.Pienaar <rip@devco.net>
 * 03/03/2005
 * http://www.devco.net/
 *
 */ 
class openVpnStatusParser {

	public static function parseLog ($log, $proto) {
		$handle = fopen($log, "r");

		$uid = 0;

			while (!feof($handle)) {
				$buffer = fgets($handle, 4096);

				unset($match);

				if (preg_match("/^Updated,(.+)/", $buffer, $match)) {
					$status['updated'] = $match[1];
				}

				if (preg_match("/^(.+),(\d+\.\d+\.\d+\.\d+\:\d+),(\d+),(\d+),(.+)$/", $buffer, $match)) {
					if ($match[1] <> "Common Name") {
						$cn = $match[1];

						// associative array to store a numeric id
						// for each remote ip:port because smarty doesnt
						// like looping on strings in a section
						$userlookup[$match[2]] = $uid;

						$status['users'][$uid]['CommonName'] = $match[1];
						$status['users'][$uid]['RealAddress'] = $match[2];
						$status['users'][$uid]['BytesReceived'] = openVpnStatusParser::sizeformat($match[3]);
						$status['users'][$uid]['BytesSent'] = openVpnStatusParser::sizeformat($match[4]);
						$status['users'][$uid]['Since'] = $match[5];
						$status['users'][$uid]['Proto'] = $proto;

						$uid++;
					}
				}


				if (preg_match("/^(\d+\.\d+\.\d+\.\d+),(.+),(\d+\.\d+\.\d+\.\d+\:\d+),(.+)$/", $buffer, $match)) {
					if ($match[1] <> "Virtual Address") {
						$address = $match[3];

						// find the uid in the lookup table
						$uid = $userlookup[$address];

						$status['users'][$uid]['VirtualAddress'] = $match[1];
						$status['users'][$uid]['LastRef'] = $match[4];
					}
				}

			}

			fclose($handle);

			return($status);
	}

	private static function sizeformat($bytesize){
		$i=0;
		while(abs($bytesize) >= 1024){
			$bytesize=$bytesize/1024;
			$i++;
			if($i==4) break;
		}

		$units = array("Bytes","KB","MB","GB","TB");
		$newsize=round($bytesize,2);
		return("$newsize $units[$i]");
	}

}
?>

