<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/filmes.css">
    <link rel="stylesheet" href="../css/logout.css">
    <title>Filmes - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Light Up My Imagination</h1>
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </header>

    <nav>
        <ul>
        <li class="home"><a href="home.php">Home</a></li>
        <li class="filmes"><a href="filmes.php">Filmes</a></li>
        <li class="series"><a href="series.php">Séries</a></li>
        <li class="avaliacao"><a href="avaliacoes.php">Avaliações</a></li>
        <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php if (isset($_SESSION['user_id'])): ?> 
                <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php endif; ?>        
        </ul>
    </nav>

    <h2>Filmes em destaque:</h2>
    
    <div class="filmes-container">
    <?php
    include 'db.php'; // Inclui a conexão com o banco

    // Consulta para obter os filmes com o campo `id` incluído
    $sql = "SELECT id, titulo, descricao, data_lancamento, poster FROM filmes";
    $stmt = $pdo->query($sql);

    // Verifica se há resultados e os exibe
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='filme-item'>";
            
            // Exibe o pôster do filme
            echo "<img src='../img/" . $row["poster"] . "' alt='Poster de " . $row["titulo"] . "' class='poster'>";
            
            echo "<h3>" . $row["titulo"] . "</h3>";
            echo "<p>" . $row["descricao"] . "</p>";
            echo "<p><strong>Data de Lançamento:</strong> " . date("d/m/Y", strtotime($row["data_lancamento"])) . "</p>";
            
            // Adiciona um link para a página de avaliação, passando o ID do filme
            echo "<a href='avaliarFilmes.php?id=" . $row["id"] . "'>Adicione uma avaliação</a>";
            
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum filme encontrado.</p>";
    }
?>

</div>

<br></br>
    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
