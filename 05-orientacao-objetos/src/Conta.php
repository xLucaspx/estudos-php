<?php

class Conta
{
	// a partir do PHP 7.4 podemos tipar os atributos de uma classe; quando isso é feito, eles serão criados em um
	// estado não inicializado (uninitialized); se não definimos tipos, eles são criados como NULL

	// A partir do PHP 8 podemos utilizar `readonly` para informar um atributo que não pode ser modificado após sua inicialização;
	// ou seja, é um atributo imutável. Além disso, só pode ser inicializado dentro do escopo onde foi definido, ou seja, dentro da classe.
	// Apenas propriedades tipadas podem ser readonly, e elas não podem ter um valor padrão (senão seriam constantes), a não ser dentro do
	// construtor (property promotion). Sendo uma propriedade public e readonly, não precisa de getter para ser lida
	public readonly Titular $titular;
	private float $saldo;

	// criando atributo estático
	private static int $totalDeContas = 0;

	public function __construct(Titular $titular)
	{
		$this->titular = $titular;
		$this->saldo = 0; // utiliza-se o operador `->` para acessar atributos e métodos de uma classe no PHP

		self::$totalDeContas++;  // para acessar atributos e métodos estáticos usamos self ou NomeDaClasse com o operador `::`
	}
	// Existem métodos no PHP que são executados em momentos específicos, e estes métodos são conhecidos como métodos mágicos;
	// Ao criar uma instância, o método mágico construtor (__construct) é executado; quando uma instância deixa de existir,
	// seu método mágico destrutor (__destruct) é executado
	public function __destruct()
	{
		// echo "Nenhuma referência encontrada para a conta do titular $this->nomeTitular; conta excluída da memória" . PHP_EOL;
		self::$totalDeContas--;
	}

	// para funções, se não colocarmos modificador de acesso o PHP interpreta como public
	public function saca(float $valor): void
	{
		if ($valor <= 0)
			throw new Exception("O valor inserido para o saque é inválido!");
		if ($valor > $this->saldo)
			throw new Exception("Saldo insuficiente para realizar a operação!");

		$this->saldo -= $valor;
	}

	public function deposita(float $valor): void
	{
		if ($valor <= 0)
			throw new Exception("O valor inserido para o depósito é inválido!");

		$this->saldo += $valor;
	}

	public function transfere(float $valor, Conta $destino): void
	{
		if ($valor <= 0)
			throw new Exception("O valor inserido para a transferência é inválido!");
		if ($valor > $this->saldo)
			throw new Exception("Saldo insuficiente para realizar a operação!");

		$this->saldo -= $valor;
		$destino->deposita($valor);
	}

	public function saldo(): float
	{
		return $this->saldo;
	}

	public static function totalDeContas(): int
	{
		return self::$totalDeContas;
	}
}
