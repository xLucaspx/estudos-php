<?php

// lendo um arquivo zipado: `zip://caminho-arquivo.zip#nome-arquivo`
// também é possível escrever/modificar este arquivo
$zip = file_get_contents('zip://txt/cursos.zip#lista-cursos.txt'); // necessário habilitar `extension=zip`
echo $zip;
