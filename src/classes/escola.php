<?php

class escola {
    public $nome;
    private $cnpj;
    public $endereco;
    public $cidade;

    public function __construct($nome, $cnpj, $endereco, $cidade) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (!filter_var($cnpj, FILTER_VALIDATE_INT) || $cnpj < 0) {
            throw new Exception("O Cnpj deve ser um número inteiro positivo.");
        }
        if (empty($endereco)) {
            throw new Exception("O campo Endereço é obrigatório.");
        }
        if (empty($cidade)) {
            throw new Exception("O campo Cidade é obrigatório.");


        }
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
    }
 
    
    public function getcnpj() {
        return $this->cnpj;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "Cnpj: <strong>" . $this->getcnpj(). "</strong><br>";
        echo "Endereço: <strong> $this->endereco</strong><br>";
        echo "Cidade: <strong> $this->cidade </strong></p>"; 
        
    }
}