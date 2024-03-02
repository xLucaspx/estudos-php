<?php

// o arquivo recebido é armazenado pelo PHP em algum lugar; podemos verificar isso com $_FILES
//var_dump($_FILES);
var_dump($_FILES['arquivo']);

// lembrando que devemos sempre verificar se o tipo do arquivo é válido e se encaixa no que esperamos receber;
// por exemplo, não devemos receber executáveis por upload. Além disso, pdoemos verificar se o arquivo existe
// com a função is_uploaded_file e passando o tmp_name (nome do arquivo temporário):
$tmpName = $_FILES['arquivo']['tmp_name'];

if (!is_uploaded_file($tmpName)) {
	echo "<hr><p style='font-size: 20px; color: red; font-weight: 700;'>Arquivo inválido!</p>";
	exit();
}

$extension = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
// podemos mover o arquivo com a função move_uploaded_file pegando o nome temporári0 (tmp_name) do arquivo
// de $_FILES e colocando o caminho de destino, neste caso esta mesma pasta. Retorna boolean (resultado da ação)
$upload = move_uploaded_file($tmpName, __DIR__ . "/img.$extension");

var_dump($upload);
