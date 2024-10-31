<?php
session_start();
include 'db.php'; // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta o banco de dados para verificar o usuário
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verifica se o usuário existe e a senha está correta
    if ($user && password_verify($password, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id']; // Define o ID do usuário na sessão
        header('Location: home.php'); // Redireciona para a página inicial após o login
        exit;
    } else {
        echo '<div class="error-message">Email ou senha incorretos.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>LUMI: Login</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contato.php">Contato</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <h2>Entre com seu Login:</h2>
    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <button type="submit">Login</button>
        <p>Você ainda não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </form>

    <div class="logo">
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </div>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
