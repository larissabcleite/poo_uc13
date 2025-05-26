<?php
require_once "src/classes/curso.php";
 
// Inicializa as variáveis
$titulo = $horas = $dias = $aluno = "";
$cursoCriado = false;
 
//Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $horas = $_POST["horas"];
    $dias = $_POST["dias"];
    $aluno = $_POST["aluno"];
   
    $Curso = new Curso($titulo, $horas, $dias, $aluno);
    $cursoCriado = $Curso ->cadastrar();
 
    if ($cursoCriado) {
        echo "<div class='alert alert-success'>Cadastro efetuado com sucesso</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar o Curso</div>";
    }
}
?>
 
<h2>Cadastro de Curso</h2>
 
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" name="titulo" id="titulo" class="form-control"
            value="<?= htmlspecialchars($titulo) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="horas" class="form-label">Horas:</label>
        <input type="text" name="horas" id="horas" class="form-control"
            value="<?= htmlspecialchars($horas) ?>">
    </div>
 
    <div class="col-md-4">
        <label for="dias" class="form-label">Dias:</label>
        <input type="text" name="dias" id="dias" class="form-control"
            value="<?= htmlspecialchars($dias) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="aluno" class="form-label">Aluno:</label>
        <input type="text" name="aluno" id="aluno" class="form-control"
            value="<?= htmlspecialchars($aluno) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>