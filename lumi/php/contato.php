<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/contato.css">
    <title>Contato - LUMI</title>
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

    <h2>Entre em contato conosco:</h2>
    <form action="contato.php" method="post">
        <input type="text" name="nome" placeholder="Seu nome" required><br>
        <input type="email" name="email" placeholder="Seu email" required><br>
        <textarea name="mensagem" placeholder="Sua mensagem" required></textarea><br>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Captura os dados enviados pelo formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        // Query de inserção
        $sql = "INSERT INTO contato (nome, email, mensagem) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // Verifica se a inserção foi bem-sucedida
        if ($stmt->execute([$nome, $email, $mensagem])) {
            echo '<div class="accuracy-message">Mensagem enviada com sucesso. Obrigado pelo seu feedback!</div>';
        } else {
            echo '<div class="error-message">Erro ao enviar mensagem. Tente novamente.</div>';
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
