<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Bem Vindo ao LUMI</h1>
    </header>

    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="filmes.php">Filmes</a></li>
            <li><a href="series.php">Series</a></li>
            <li><a href="logout.php">Sair</a></li>
            <?php if (isset($_SESSION['user_id'])): ?> 
                <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php endif; ?>        
        </ul>
    </nav>
    <div>
        <!-- AQUI VAI A INTROduÇÂO -->
    </div>

    <div class="container">
        <div class="logo">
            <h2>Avaliações Recentes</h2>
        </div>
    </div>
    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
