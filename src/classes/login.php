<?php
include 'db/db.php';
 
class login {
    private $conn;
 
    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }
        

    
 
    public function autenticar($email, $senha) {
        $sql = "SELECT * FROm login WHERE email = :email and senha = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        return  $stmt->execute();
    }
}