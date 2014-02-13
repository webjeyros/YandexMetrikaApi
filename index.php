<?php
require_once (dirname(__FILE__) . '/lib/Unirest.php');
require_once (dirname(__FILE__) . '/lib/YandexMetrikaApi.php');
$YandexMetrika = new YandexMetrikaApi("YOU_TOKEN_HERE");
$countersList = $YandexMetrika -> ListCounters();
foreach ($countersList->counters as $counter) {
	echo $counter -> site . "\n";
}
?>