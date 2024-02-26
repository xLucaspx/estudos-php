<?php

echo <<<END
Quando passamos para uma função que recebe o nome de um arquivo uma string, mesmo que seja um caminho completo de um 
arquivo local, por baixo dos panos é como se o PHP adicionasse o protocolo `file://`.

Existem diversos protocolos (wrappers) suportados para trabalhar com arquivos no PHP; ou seja, conseguimos trabalhar com dados
de várias fontes diferentes utilizando protocolos diferentes!

Na verdade, as funções vistas até este ponto trabalham com streams em geral, nos permitindo fazer requisições http, enviar arquivos por ftp, etc.
Também é possível criar wrappers específicos, como por exemplo `git://` e `s3://`.

Por exemplo, podemos ler a resposta de uma API como se fosse um arquivo:

* Pode ser necessário ativar a `extension=openssl`.
END;

$api = file_get_contents('http://swapi.dev/api/films/4/');
echo $api;
