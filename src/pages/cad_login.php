<?php
 
include 'src/classes/login.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
 
    $loginObj = new login();
    $login = $loginObj->autenticar($email, $senha);
 
    if ($login) {
        $_SESSION['login_id'] = $login['id'];
        $_SESSION['login_nome'] = $login['email'];
        header("Location: /poo");
        exit();
    } else {
        echo "Login inválido!";
    }
}
?>


<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h3 class="text-center mb-4">Acesso ao Sistema</h3>
 
                <form method="post" action="index.php?page=login">
                    <div class="mb-3">
                        <label for="login" class="form-label">Usuário (e-mail):</label>
                        <input type="email" name="usuario" id="usuario" class="form-control" required>
                    </div>
 
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" required>
                    </div>
 
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
 
            </div>
        </div>
    </div>
</div>