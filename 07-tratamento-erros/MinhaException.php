<?php

// no PHP, para criar uma exception basta externder de Exception ou de uma classe derivada mais específica;
// neste caso, pensando que exceptions criadas para ter algum significado no sistema  são relayivas ao domínio,
// podemos extender de DomainException
class MinhaException extends DomainException
{
	// como exceptions são classes, podemos criar métodos e atributos
	public function getFormattedMessage(): string
	{
		$msg = "{$this->message} em {$this->file}:{$this->line}";

		if (($prev = $this->getPrevious())) {
			$msg .= PHP_EOL . "Exception anterior: {$prev->getMessage()} em {$prev->getFile()}:{$prev->getLine()}";
		}

		return $msg;
	}
}

try {
	throw new MinhaException("MinhaException lançada");
} catch (MinhaException $e) {
	echo $e->getFormattedMessage();
}
