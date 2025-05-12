<?php

class curso {
    public $titulo;
    public $horas;
    public $dias;
    private $aluno;

    public function __construct($titulo, $horas, $dias, $aluno) {
        if (empty($titulo)) {
            throw new Exception("O campo Titulo é obrigatório.");
        }
        if (!filter_var($horas, FILTER_VALIDATE_INT) || $horas < 0) {
            throw new Exception("A horas deve ser um número inteiro positivo.");
        }
        if (empty($dias)) {
            throw new Exception("O campo dias é obrigatório.");
        }
        if (empty($aluno)) {
            throw new Exception("O campo Aluno é obrigatório.");


        }
        $this->titulo = $titulo;
        $this->horas = $horas;
        $this->dias = $dias;
        $this->aluno = $aluno;
    }
 
    
    public function getaluno() {
        return $this->aluno;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Horas: <strong>$this->horas</strong><br>";
        echo "Dias: <strong> $this->dias</strong><br>";
        echo "Aluno: <strong>" . $this->getaluno(). "</strong></p>"; 
        
    }
}