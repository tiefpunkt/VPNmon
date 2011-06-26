<?php
/*
*
*/

class Formatter {
	public static function secondsFormat($seconds) {
		$days = floor($seconds / 3600 / 24);
		$seconds -= $days * 3600 * 24;
		
		$hours = floor($seconds / 3600);
		$seconds -= $hours * 3600;
		
		$minutes = floor($seconds / 60);
		$seconds -= $minutes * 60;
		
		if ($days > 0) {
			$out = sprintf("%ddays, %02d:%02d:%02d", $days, $hours, $minutes, $seconds);
			//"$days days, $hours:$minutes:$seconds";
		} else {
			$out = $out = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);//"$hours:$minutes:$seconds";
		}
		
		return($out);
	}
	
	public static function bytesFormat($bytesize){
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