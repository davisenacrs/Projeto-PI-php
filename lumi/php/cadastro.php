<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>LUMI: Cadastro</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contato.php">Contato</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <h2>Crie seu cadastro:</h2>
    <form action="cadastro.php" method="post" onsubmit="return validateForm()">
        <input type="text" name="username" placeholder="Nome de Usuário" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <button type="submit">Cadastrar</button>
        <p>Você já possui uma conta?</p><a href="login.php">Login</a>
    </form>

    <script src="js/validation.js"></script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$username, $email, $password])) {
            echo '<div class="accuracy-message">Usuário cadastrado com sucesso!</div>';
        } else {
            echo '<div class="error-message">Email ou senha incorretos.</div>';
        }
    }
    ?>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
