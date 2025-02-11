<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="icon" type="image/png" href="..img/logo.png">
    <title>Cadastro - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <div class="lumi">
                <h3>Lumi</h3>
            </div>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <h2>Crie seu cadastro:</h2>
    <form action="cadastro.php" method="post" onsubmit="return validateForm()">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <button type="submit">Cadastrar</button>
        <p>Você já possui uma conta?</p><a href="login.php">Login</a>
    </form>

    <script src="js/validation.js"></script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Captura os dados enviados pelo formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha

        // Query de inserção
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // Verifica se a inserção foi bem-sucedida
        if ($stmt->execute([$nome, $email, $senha])) {
            echo '<div class="accuracy-message">Usuário cadastrado com sucesso!</div>';
        } else {
            echo '<div class="error-message">Erro ao cadastrar o usuário. Tente novamente.</div>';
        }
    }
    ?>

    <div class="logo">
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </div>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
