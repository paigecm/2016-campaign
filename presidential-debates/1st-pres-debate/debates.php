<?php

$dirname = dirname(__FILE__);
$filename = "debates.txt"; #assumes you have https://gist.github.com/anonymous/5d7f8d11e297e5b5549a520d1471dc46
$speaker = ""; $speeches = array();
foreach(file("$dirname/$filename") as $line) {
	$withoutname = preg_replace("/^(HOLT|CLINTON|TRUMP):/","", $line);
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
