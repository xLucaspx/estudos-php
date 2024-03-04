<?php

echo <<<END
No PHP, a hierarquia das classes de exceção e erro funciona basicamente assim: existe uma interface, chamada `Throwable`,
que só é utilizada pelo próprio PHP, e tudo que implementa essa interface pode ser lançado por meio da palavra-chave `throw`.

Não é possível criarmos uma classe própria que implemente diretamente a interface `Throwable`, ainda que seja possível
criarmos classes de exceção.

Hoje existem duas classes que implementam tal interface: `Exception`, a classe base de todas as exceções que podem ser
criadas no PHP; e `Error`, a classe base de qualquer erro que o PHP pode emitir.

Imagine que você é um desenvolvedor do PHP em si e cria funções para a linguagem; existem funções, como a `intdiv()`, que
precisam informar um erro caso o segundo argumento seja 0. Nesse caso, é possível lançar um erro do PHP, ou seja, o PHP
já possui alguns erros definidos, e os desenvolvedores que trabalham usando PHP não podem criar erros, pois estes são
restritos ao desenvolvimento interno da linguagem.

A classe `Error` pode ser lançada em algumas situações, como quando tentamos instanciar uma classe abstrata. um `ArithmeticError`
acontece quando existe algum problema relacionado à matemática, e existe uma classe mais específica que a extende: `DivisionByZeroError`.

O `AssertionError` é lançado quando a função `assert()` do PHP falha na verificação. A `TypeError` é lançada quando
trabalhamos de maneira incorreta com os tipos, por exemplo quando passamos uma string para uma função que espera um inteiro.
Também existem os erros de compilação (`ComplieError`), por exemplo quando tentamos executar a função `eval()` passando uma
string cujo código é inválido; nesse caso, receberíamos um `ParseError`, que extende de `CompileError`.

São muitos erros e não é necessário decorá-los rapidamente, afinal a documentação do PHP lista toda essa hierarquia detalhadamente.
É importante citar que esse mecanismo de erros foi introduzido na versão 7 do PHP; nela, os erros que o PHP pode reportar passaram
a ser realizados por meio dessas classes. Antigamente o PHP trabalhava com um sistema diferente de tratamento de erros, que
conheceremos futuramente nesse curso, já que ainda existem funções que reportam erros da maneira antiga. Funções novas ou que foram
reescritas utilizam uma dessas classes.

A interface base `Throwable`, como comentado anteriormente, não pode ser implementada diretamente por nenhuma classe do PHP. Se
quisermos criar uma exceção personalizada, teremos que estender a classe `Exception`, que também comentaremos mais a fundo no futuro.

A ideia básica é que o PHP já possui vários erros que foram criados pelos desenvolvedores da linguagem e que podem ser lançados.
Também existem várias exceções, que podem ser lançadas ou utilizadas para criar outras utilizando-as como base. A linguagem PHP
essencialmente não define nenhuma exceção. Entretanto, existe uma extensão do PHP, habilitada por padrão em qualquer instalação,
chamada SPL (Standard PHP Library) que fornece diversas funcionalidades. Uma delas, e a principal, é o autoloader que utilizamos
nos treinamentos de orientação a objetos. A segunda principal funcionalidade são as exceções.

Na documentação do PHP é possível encontrar a hierarquia das exceções do SPL, que é divida em duas principais classes: exceções
lógicas e exceções de tempo de execução. As exceções lógicas (`LogicException`) devem ser lançadas quando existe um mau uso da
linguagem: ao chamar uma função ou método de forma incorreta (por exemplo utilizando menos ou mais parâmetros do que o necessário).
Tais exceções devem nos levar diretamente a um erro no código.

Já as exceções em tempo de execução (`RuntimeException`) só são encontradas quando rodamos o programa, ou seja, não necessariamente é
possível vê-las no código; por exemplo, um array fixo do PHP, embora tenha esse nome, pode ter seus valores alterados em tempo de execução,
fazendo com que não saibamos se ocorrerá um erro sem rodarmos o código. Também existem exceções que ocorrem quando sobrecarregamos o
processamento de uma aplicação, exceções por alcance (semelhantes às que ocorrem quando tentamos acessar algo fora do alcance), quando
usamos menos recursos do que o necessário ou por valores inesperados.

Como nenhuma dessas exceções pré-definidas é uma classe abstrata, elas podem ser utilizadas livremente pelos programadores que desenvolvem
em PHP. Conhecendo e utilizando a hierarquia das exceções é possível evitar multi-catches desnecessários, unindo nosso tratamento de modo a
pegar vários tipos de exceção de uma só vez.
END;
