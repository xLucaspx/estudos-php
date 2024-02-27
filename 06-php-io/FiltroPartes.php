<?php

// criar um filtro é uma tarefa complexa e que não é tão bem documentada;
// para este filtro, queremos algo que leia uma steam linha a linha e, se encontrar
// a palavra 'parte' retorne esta linha.
// para criar um filtro temos que extender a classe php_user_filter
class FiltroPartes extends php_user_filter
{
	public $stream;
	private $previousData;
	// os métodos onCreate e onClose são como o construtor e o destrutor
	// neste caso estaremos utilizando apenas o onCreate
	public function onCreate(): bool
	{
		// quando o filtro for criado, precisamos criar uma stream que será enviada para os dados de saída
		// podemos criar uma stream temporária, que só manipula os dados em memória e depois ignora; podemos obter
		// esse resultado utilizando 'php://temp' no modo leitura e escrita ('w+'):
		$this->stream = fopen('php://temp', 'w+');

		return $this->stream !== false; // se der algum erro a stream será falsa
	}

	// a função filter recebe dois resources ($in e $out), o número de bytes consumidos ($consumed) na
	// stream que está passando pelo filtro e se a stream está ou não sendo fechada ($closing)
	public function filter($in, $out, &$consumed, $closing): int
	{
		$saida = '';
		// o recurso $in contém buckets, como se fossem pequenos pedaços do arquivo, porém sem tamanho pré-definido;
		// em arquivos pequenos, pode ser o arquivo inteiro e, em arquivos maiores, pode ser dividido. O while abaixo
		// basicamente quer dizer "enquanto for possível transformar o bucket em algo manipulável"/"enquanto houver conteúdo de entrada"
		while ($bucket = stream_bucket_make_writeable($in)) {
			// $bucket->data; // stream recebida
			// $bucket->datalen // tamanho da stream recebida

			if ($closing && !$bucket->datalen) {
				return PSFS_FEED_ME;
			}
			$consumed += $bucket->datalen;

			$stringFromBucket = $bucket->data;

			if (!empty($this->previousData)) {
				$stringFromBucket = $this->previousData . $bucket->data;
				$this->previousData = null;
			}

			if ($stringFromBucket[-1] !== "\n") {
				$this->previousData = $stringFromBucket;
				return PSFS_FEED_ME;
			}

			$linhas = explode(PHP_EOL, $stringFromBucket);

			foreach ($linhas as $linha) {
				if (stripos($linha, 'parte') !== false) { // stripos, o i no meio quer dizer insensitive
					$saida .= "$linha\n";
				}
			}
		}
		// criando um bucket de saída utilizando a stream criada no onCreate para cuidar dos dados e com o conteúdo da variável saída,
		// que possui o conteúdo filtrado; após, adicionando o bucket criado ao recurso de saída ($out)
		$bucketSaida = stream_bucket_new($this->stream, $saida);
		stream_bucket_append($out, $bucketSaida);

		// ao final, é necessário retornar um dado que informa que tudo correu bem e o filtro pode seguir sendo executado; este dado é p PSFS_PASS_ON:
		return PSFS_PASS_ON;
	}
}
