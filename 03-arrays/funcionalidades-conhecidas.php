<?php

$array = ['zero', 'um', 'dois'];

// as funções sizeof e count são sinônimos, ambas chamam a mesma função por baixo dos panos,
// mas count é mais utilizada. Como o PHP utiliza Hash Table, ele já sabe quantos elementos o array contém
echo "count: " . count($array) . PHP_EOL;
echo "sizeof: " . sizeof($array) . PHP_EOL;
echo PHP_EOL;

// com o seguinte código, a cada nova iteração a função count será chamada. Se o array tiver 100 elementos,
// a função será chamada 100 vezes, e isso pode acabar prejudicando a performance; o ideal é chamar a função
// count antes do for e ter seu resultado armazenado em uma variável!
for ($i = 0; $i < count($array); $i++) {
	echo "$i -> {$array[$i]}" . PHP_EOL;
}

echo PHP_EOL;

$size = count($array);
for ($i = 0; $i < $size; $i++) {
	echo "$i -> {$array[$i]}" . PHP_EOL;
}

echo PHP_EOL;

foreach ($array as $value) {
	echo "$value" . PHP_EOL;
}

echo PHP_EOL;

foreach ($array as $key => $value) {
	echo "$key -> $value" . PHP_EOL;
}
