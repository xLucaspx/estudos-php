<?php
require_once '../autoload.php';

use Senac\Crud\Controller\AlunoController;
use Senac\Crud\Model\Aluno\Aluno;

$controller = new AlunoController();

$alunos = $controller->buscaTodos();
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Listagem de alunos</title>

	<link rel="stylesheet" href="../style/style.css">
</head>
<body>

<header>
<h1>Listagem de alunos</h1>

	<a href="../index.html" class="a btn btn-secondary">Menu principal</a>
</header>

<table>
	<thead>
	<tr>
		<th><strong>Nome</strong></th>
		<th><strong>CPF</strong></th>
		<th><strong>E-mail</strong></th>
		<th><strong>Matrícula</strong></th>
		<th><strong>Data nascimento</strong></th>
		<th><strong>Opções</strong></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($alunos as $detalhesAluno) {
		$aluno = new Aluno($detalhesAluno);
		?>
		<tr>
			<td><?= $aluno->getNome() ?></td>
			<td><?= $aluno->getCpf() ?></td>
			<td><?= $aluno->getEmail() ?></td>
			<td><?= $aluno->matricula ?></td>
			<td><?= $aluno->dataNascimento->format('d/m/Y') ?></td>
			<td class="td-options">
				<ul class="td-options-list">
					<li class="td-options-list-item"><a href="form-aluno.php?id=<?= $aluno->id ?>" class="a btn btn-primary list-a">Editar</a></li>
					<li class="td-options-list-item">
						<button type="button"
							onclick="deletaAluno(<?= "$aluno->id, '{$aluno->getNome()}', '$aluno->matricula'" ?>)"
							class="btn btn-cancel list-btn">Excluir
						</button>
					</li>
				</ul>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</body>

<script>
	async function deletaAluno(id, nome, matricula) {
		const deletar = confirm(`Tem certeza que deseja excluir o aluno ${nome}, sob matrícula ${matricula}?`);

		if (!deletar) return;

		const res = await fetch(`http://localhost:8080/deleta-aluno.php/${id}`, {
			method: "DELETE",
			// body: {
			// 	id
			// },
			headers: {
				"Content-Type": "application/json"
			}
		});

		if (res.status != 200) alert("Erro ao excluir o aluno!");

		location.reload();
	}
</script>
</html>
