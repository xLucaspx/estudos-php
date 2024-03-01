<?php

echo "Olá, mundo!" . PHP_EOL;
print "Olá, mas com print!" . PHP_EOL;

// assim como o stdout, existe o stdin:
$out = fopen('php://stdout', 'w');
// lembrando que não é necessário fechar resources que começam com php://

fwrite($out, 'Agora estamos escrevendo com stdout' . PHP_EOL);

fwrite(STDOUT, 'Também é possível utilizar a constante STDOUT!' . PHP_EOL);

// também existe a saída de erro, php://stderr ou STDERR
fwrite(STDERR,'Saída de erro com STDERR');

//  Em alguns outros casos pode acontecer do output buffer (ob_start()) estar ativado, ou seja, acontecer do script estar salvand
// os dados em buffer antes de exibir. Se você utiliza o STDOUT, isso não passa pelo buffer; já o echo vai passar pelo buffer, mas
// isso é um detalhe mínimo.

// Outra coisa interessante: podemos transferir o conteúdo de uma stream para outra sem precisar ler de um para depois escrever; por exemplo,
// podemos copiar a stream de um arquivo zip para STDOUT sem passar por uma variável, eocnomizando um pouco de memória
$cursos = fopen('zip://txt/cursos.zip#lista-cursos.txt', 'r');
stream_copy_to_stream($cursos, STDOUT);
