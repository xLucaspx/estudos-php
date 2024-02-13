<?php

$pares = [];
$impares = [];

for ($i = 0; $i < 100; $i++) {
  if ($i % 2== 0) array_push($pares, $i);
  else array_push($impares, $i);
}

echo "Pares:".PHP_EOL;
foreach ($pares as $i) echo "$i ";

echo "\nÍmpares:".PHP_EOL;
foreach ($impares as $i) echo "$i ";
