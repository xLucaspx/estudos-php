<?php

namespace Curso\Banco\Model;

interface Autenticavel
{
	function podeAutenticar($senha): bool;
}
