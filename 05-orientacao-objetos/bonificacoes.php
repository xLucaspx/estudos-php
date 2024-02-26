<?php

use Curso\Banco\Model\Funcionario\{Desenvolvedor, Diretor, Gerente};
use Curso\Banco\Service\ControladorBonificacao;

require_once 'autoload.php';

$dev = new Desenvolvedor('12345678909', 'João da Silva', 3500);
$gerente = new Gerente('33455678068', 'Andreia da Rocha', 3750);
$diretor = new Diretor('32108058060', 'Eduardo Martins', 4125.90);

$controle = new ControladorBonificacao();

$controle->adicionaBonificacao($dev);
echo "Total de bonificações: {$controle->getTotalBonificacoes()}" . PHP_EOL;

$controle->adicionaBonificacao($gerente);
echo "Total de bonificações: {$controle->getTotalBonificacoes()}" . PHP_EOL;

$controle->adicionaBonificacao($diretor);
echo "Total de bonificações: {$controle->getTotalBonificacoes()}" . PHP_EOL;

echo sprintf("Dev júnior: Salário R$ %.2f - Bonificação R$ %.2f", $dev->getSalario(), $dev->calculaBonificacao()) . PHP_EOL;
$dev->promove();
echo sprintf("Dev pleno: Salário R$ %.2f - Bonificação R$ %.2f", $dev->getSalario(), $dev->calculaBonificacao()) . PHP_EOL;
$dev->promove();
echo sprintf("Dev sênior: Salário R$ %.2f - Bonificação R$ %.2f", $dev->getSalario(), $dev->calculaBonificacao()) . PHP_EOL;
