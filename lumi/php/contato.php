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
        <h1>LUMI: Contato</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contato.php">Contato</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <h2>Entre em contato conosco:</h2>
    <form action="contato.php" method="post">
        <input type="text" name="nome" placeholder="Seu nome" required><br>
        <input type="email" name="email" placeholder="Seu email" required><br>
        <textarea name="mensagem" placeholder="Sua mensagem" required></textarea><br>
        <button type="submit">Enviar</button>
    </form>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
