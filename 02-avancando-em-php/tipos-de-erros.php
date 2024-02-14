<?php

// o PHP trabalha com níveis de erros; os principais são notice, warning e error:

$errors = [E_NOTICE, E_WARNING, E_ERROR];

/* Notice é quando o PHP notifica que existe algo de errado, mas não atrapalha a execução do programa
por exemplo ao tentar acessar um índice inexistente em um array; neste caso, o PHP avisa e devolve nulo */

// echo $errors[10];

/* Warning é quando o PHP avisa que não consegue entender determinado trecho de código, mas continua executando
por exemplo ao tentar converter um array para string */

// echo $errors;

/* Error é quando o PHP informa que não consegue mais executar o programa
por exemplo ao tentar realizar uma divisão por 0 */

// echo $errors[0] / 0;
