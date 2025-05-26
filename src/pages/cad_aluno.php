<?php
require_once "src/classes/aluno.php";
 
// Inicializa as variáveis
$nome = $idade = $cpf = $curso = "";
$alunoCriado = false;
 
//Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $cpf = $_POST["cpf"];
    $curso = $_POST["curso"];
   
    $Aluno = new Aluno($nome, $idade, $cpf, $curso);
    $alunoCriado = $Aluno ->cadastrar();
 
    if ($alunoCriado) {
        echo "<div class='alert alert-success'>Cadastro efetuado com sucesso</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar o Aluno</div>";
    }
}
?>
 
<h2>Cadastro de Aluno</h2>
 
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"
            value="<?= htmlspecialchars($nome) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="idade" class="form-label">Idade:</label>
        <input type="text" name="idade" id="idade" class="form-control"
            value="<?= htmlspecialchars($idade) ?>">
    </div>
 
    <div class="col-md-4">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" name="cpf" id="cpf" class="form-control"
            value="<?= htmlspecialchars($cpf) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="curso" class="form-label">Curso:</label>
        <input type="text" name="curso" id="curso" class="form-control"
            value="<?= htmlspecialchars($curso) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>

<h3> Lista de Alunos </h3>
<table class= "table table-striped">
    <thead>
        <tr>
            <th> Nome </th>
            <th> CPF </th>
            <th> Data de Nascimento </th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>