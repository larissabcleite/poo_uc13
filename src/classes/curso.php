<?php
 
require_once "db/db.php";
 
class Curso {
    public $titulo;
    public $horas;
    public $dias;
    private $aluno;
 
    // Construtor com validação
    public function __construct($titulo, $horas, $dias, $aluno) {
        if (empty($titulo)) {
            throw new Exception("O campo Titulo é obrigatório.");
        }
        if (empty($horas)) {
            throw new Exception("O campo Horas é obrigatório.");
        }
        if (empty($dias)) {
            throw new Exception("O campo Dias é obrigatório.");
        }
        if (empty($aluno)) {
            throw new Exception("O campo Aluno é obrigatório.");
        }
        $this->titulo = $titulo;
        $this->horas = $horas;
        $this->dias = $dias;
        $this->aluno = $aluno;
    }
 
    // Getter do CPF (encapsulamento)
    public function getaluno() {
        return $this->aluno;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Horas:<strong>$this->horas</strong><br>";
        echo "Dias: <strong>$this->dias</strong><br>";
        echo "Aluno: <strong>" . $this->getaluno() . "</strong></p>";
       
    }
 
    // Método para cadastrar a escola no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO Curso (titulo, horas, dias, aluno) VALUES (:titulo, :horas, :dias, :aluno)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':horas', $this->horas);
        $stmt->bindParam(':dias', $this->dias);
        $stmt->bindParam(':aluno', $this->aluno);
 
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}