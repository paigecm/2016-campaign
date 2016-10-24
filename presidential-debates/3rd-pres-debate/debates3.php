<?php
#Thanks to the VoyantTools Twitter (@VoyantTools) for the original php script!)
$dirname = dirname(__FILE__);
$filename = "debate3.txt"; #assumes you have https://gist.github.com/paigecm/52ce175a98a3f0baa76dc0847c445b5e
$speaker = ""; $speeches = array();
foreach(file("$dirname/$filename") as $line) {
	$withoutname = preg_replace("/^(WALLACE|CLINTON|TRUMP):/","", $line);
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
