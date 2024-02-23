<?php

// imagine que queremos criar o nome de um campo baseado no input de um usuário ou em um dado externo
$campo1 = 'nome';
// é possível que haja injeção de código malicioso:
$campo2 = 'codigo-malicioso"/><script>alert("Código malicioso do usuário!");</script>';

// existem algumas funções para tratar este problema, por exemplo addslashes
echo addslashes($campo2) . PHP_EOL;

// a função htmlentities transforma tudo o que pode ser interpretado pelo html em entidades que serão exibidas ao invés de interpretadas:
echo htmlentities($campo2) . PHP_EOL;

// o funcionamento é muito semelhante a htmlspecialchars
echo htmlspecialchars($campo2) . PHP_EOL;
?>

<input type="text" name="<?= $campo1; ?>">
<input type="text" name="<?= htmlspecialchars($campo2); ?>">
