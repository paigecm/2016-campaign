<?php

$dirname = dirname(__FILE__);
$filename = "2nd-pres-debate.txt"; #assumes you have https://gist.github.com/paigecm/c97f5cf12da37ae43e0895fb767c4d88
$speaker = ""; $speeches = array();
foreach(file("$dirname/$filename") as $line) {
	$withoutname = preg_replace("/^(RADDATZ|COOPER|CLINTON|TRUMP):/","", $line);
	if ($line!=$withoutname) {
		$speaker = substr($line, 0, strpos($line, ":"));
	}
	if (trim($withoutname) && trim($withoutname)!="(APPLAUSE)") {
		$speeches[$speaker] .= $withoutname;
	}
}
foreach($speeches as $speaker => $speech) {
	file_put_contents("$dirname/$speaker.txt", $speech);
}
