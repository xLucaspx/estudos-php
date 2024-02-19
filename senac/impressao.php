<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Impressão de textos</title>
</head>

<body style="
    padding: 2rem 3rem;
    font-size: 1.25rem;
  ">

  <?php
  print "print não é uma função, é uma construção de linguagem. Seu argumento é a expressão logo após da palavra-chave print, e não é delimitada por parênteses.<br><br>";
  print "As principais diferenças para echo são que print aceita apenas um único argumento e sempre retorna 1.<br><br>";

  $n = 15;

  printf("printf mostra uma string formatada:<br>");
  printf("<br>Formatando como decimal com sinal (%%d): %d", $n);
  printf("<br><br>Formatando decimal com %%05d: %05d", $n);
  printf("<br><br>Formatando como float com %%f: %f", $n);
  printf("<br><br>Formatando como float com %%.2f: %.2f", $n);

  echo "<br><br>var_dump() em $n: ";
  var_dump($n);
  ?>

</body>

</html>