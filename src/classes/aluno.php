<?php
 
require_once "db/db.php";
 
class Aluno {
    public $nome;
    public $idade;
    private $cpf;
    public $curso;
 
    // Construtor com validação
    public function __construct($nome, $idade, $cpf, $curso) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (empty($idade)) {
            throw new Exception("O campo Idade é obrigatório.");
        }
        if (empty($cpf)) {
            throw new Exception("O campo CPF é obrigatório.");
        }
        if (empty($curso)) {
            throw new Exception("O campo Curso é obrigatório.");
        }
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->curso = $curso;
    }
 
    // Getter do CPF (encapsulamento)
    public function getCpf() {
        return $this->cpf;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "Idade <strong>$this->idade</strong><br>";
        echo "CPF: <strong>" . $this->getCpf() . "</strong></p>";
        echo "Curso: <strong>$this->curso</strong><br>";
       
    }
 
    // Método para cadastrar a escola no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO Aluno (nome, idade, cpf, curso) VALUES (:nome, :idade, :cpf, :curso)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':curso', $this->curso);
 
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
     public function listar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "SELECT * FROM aluno";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}


 
