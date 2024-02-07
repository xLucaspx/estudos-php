<?php

echo "for" . PHP_EOL;

for ($i = 1; $i <= 15; $i ++) {
	echo "#$i ";
}

echo "\nwhile" . PHP_EOL;

$cont = 0;

while ($cont < 15) {
	$cont ++;
	echo "#$cont ";
}

echo "\ndo while" . PHP_EOL;

$cont = 1;

do {
	echo "#$cont ";
	$cont ++;
} while ($cont <= 15);

echo "\ncontinue e break" . PHP_EOL;

for ($i = 1; $i <= 50; $i ++) {
	if ($i > 15) break;
	
	if ($i % 2 == 0) {

		echo "#" . $i * 2 . " ";
		continue;
	}

	echo "#$i ";
}
