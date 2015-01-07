<?php

function contains($needle, $haystack) {
	return strpos($haystack, $needle) !== false;
}

$info = null;

function fetch_info(){
	$data = file_get_contents('http://www.gocards.com/event-toolbar-rss.xml');
	$data = simplexml_load_string($data);
	
	foreach($data->channel->item as $item) {
		if(contains("Men's Basketball", $item->title)) {
			if(contains(date('m/d'), $item->title)) {
				$info = $item->description;
			}
		}
	}
	
	return($info);
}

date_default_timezone_set('America/Louisville');
print_r(date('m/d'));
$todayIsGameDay = false;

function fetch_news(){
	$data = file_get_contents('http://www.gocards.com/event-toolbar-rss.xml');
	$data = simplexml_load_string($data);
	
	foreach($data->channel->item as $item) {
		
		if(contains("Men's Basketball", $item->title)) {
			if(contains(date('m/d'), $item->title)) {
				echo "\n";
				echo "Men's Basketball Game Today\n";
				echo $item->description;
				echo "\n";
				$todayIsGameDay = true;
			}
			else {
			//echo "No Game Today\n\n";	
			}
		}
		else {
			//echo 'No Upcoming Games\n';	
		}
	}
	return($todayIsGameDay);
}

?>