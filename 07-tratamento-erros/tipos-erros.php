<?php

echo <<<END
Agora conversaremos um pouco sobre as peculiaridades do tratamento de erros no PHP, principalmente em suas versões anteriores.
A linguagem nasceu em 1994 e passou por diversas evoluções, e até hoje nos deparamos com lógicas e funcionalidades que são legado
de decisões tomadas há muito tempo. A versão 7.0 foi um exemplo de correção de muitos desses cenários, implementando, por exemplo,
um novo tipo de throwable que nos permite trabalhar os erros da maneira que abordamos no curso.

Infelizmente muitas das funções do PHP ainda emitem ou tratam erros da forma antiga, que chamaremos de legado, e justamente por isso
é importante conhecermos suas características. Na documentação do PHP conseguimos encontrar explicações detalhadas a respeito desses erros.

O PHP reporta diversos tipos de erros em resposta a várias condições internas de erro. Cada problema gerado tem um tipo, e é possível
consultar na documentação quais tipos são esses; comentaremos três dos principais:

O `E_ERROR` é o conhecido erro fatal; quando temos um problema (exceção ou erro) que implementa Throwable e não fazemos o catch, o
problema é convertido em um erro fatal desse tipo, interrompendo a execução do programa e exibindo o erro na tela ou registrando-o
(dependendo das configurações). O mais importante de se notar é que quando esse tipo de erro ocorre, a execução do programa é encerrada.

Outro tipo muito comum é o `E_WARNING`, um aviso que é emitido quando algo "funciona" atualmente, mas deixará de funcionar no futuro. Na
verdade recebemos esse tipo de erro quando encontramos algo que não faz o programa parar, mas cujo trecho de código não deveria estar ali.

Por fim, temos o `E_NOTICE`, emitido em situações nas quais temos um trecho de código que não deveria estar daquela forma, mas que também
não encerra a execução do programa.

Podemos utilizar funções do PHP como ini_set('error_reporting', E_ALL) ou, neste caso, error_reporting(E_ALL) para modificar a forma
como o PHP reporta os erros. Também é possível alterar diretamente no php.ini.

Já para exibir erros, definimos a configuração display_errors como true (ini_set('display_errors', 1)), que é o padrão. Se, por algum motivo,
queremos que não seja exibido nenhum tipo de erro, definimos como false (0). Ou seja, os erros serão reportados ou não com base em error_reporting
e exibidos ou não com base em  display_errors.

A partir da versão 8 do PHP, todos os erros são exibidos por padrão, o que evita os casos de erros passarem despercebidos por problemas de configuração.

Geralmente, em um sistema de produção, deixaremos display_errors desabilitado mas iremos configurar "log_errors" para manter um log dos erros;
podemos, também, configurar qual será o arquivo de log com "error_log". Já em desenvolvimento, devemos sempre habilitar display_errors, mas o
log é opcional, pois já que estamos vendo os erros o log pode ser desnecessário.

No PHP, existe o operador `@` para supressão de erros; pode ser utilizado antes de um erro para que este não seja exibido. É uma péssima
prática e deve ser removido do código.

Frameworks fullstack, como Symphony, Laravel, Laminas ou Falcon, definem um gerenciador de erro no ponto de inicialização e geram novas
exceções para cada erro. Tais exceções são tratadas pelo próprio framework para que seja exibida uma tela de erro, quando em ambiente
de desenvolvimento, ou para que seja feito um registro/log, quando em ambiente de produção. O PHPUnit, uma ferramenta para realização de
testes automatizados, também utiliza o set_error_handler() para verificar se o código testado gerou algum desses problemas. Em caso positivo,
o código não passará nos testes. Portanto, o set_error_handler() pode ser utilizado em casos extremos, mas normalmente é utilizado por bibliotecas
de mais alto nível. Isso significa que é mais ideal ou interessante utilizarmos bibliotecas que tratam erros, ou um framework que cuide dessa
responsabilidade automaticamente. Transformando os erros em exceções, podemos, por exemplo, executar algum try/catch para corrigi-los.
END. PHP_EOL;

// exemplo de uso de um error handler no PHP para pegar erros "antigos":
$handler = function ($errno, $errstr, $errfile, $errline) {
	$msg = match ($errno) {
		E_WARNING => 'Warning',
		E_NOTICE => 'Notice',
		E_ERROR => 'Erro fatal',
		default => 'Deu ruim...'
	};

	echo "$msg: $errstr em $errfile:$errline" . PHP_EOL;
	return true; // ao retornar true em um error handler, o handler padrão do PHP não será chamado

//	throw new RuntimeException("$msg - $errstr em $errfile:$errline");
};
set_error_handler($handler);

// exemplo de supressão de erro:
echo @$variavel; // se utilizamos um handler pode ser pego
echo $array[15];
