<?php

echo <<<END
Para trabalhar com strings no PHP é altamente recomendado utilizar a extensão `mbstring`.

O nome vem de multi byte string, pois pode trabalhar com strings que ocupam mais de 1b, como caracteres acentuados.

A maioria das funções de strings no PHP possui uma equivalente da extensão mbstring, precedida de `mb_`.

Para habilitar a extensão mbstring basta acessar o arquivo `php.ini` e descomentar a linha
`extension=mbstring`

Se estiver utilizando Windows, também é necessário descomentar a linha
`extension_dir = "ext"`

Podemos verificar os módulos instalados do php com o comando
`php -m`

Podemos listar os arquivos de configuração carregados com o comando
`php --ini`
END;
